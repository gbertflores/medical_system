<?php

namespace App\Livewire;

use App\Models\MedicalResults;
use Livewire\Component;
use Livewire\WithFileUploads;
use Barryvdh\DomPDF\Facade\Pdf;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;
use Illuminate\Support\Facades\Crypt;

class NewMedicalResult extends Component
{
    use WithFileUploads;
    
    public $selectedUser;

    public $hematology = 'normal';
    public $hematology_abnormality;
    public $remarks_hematology;
    public $urinalysis = 'normal';
    public $urinalysis_abnormality;
    public $remarks_urinalysis;
    public $xray = 'normal';
    public $xray_abnormality;
    public $remarks_xray;
    public $drugtest = 'negative';
    public $drugtest_abnormality;
    public $remarks_drugtest;
    public $condition;
    public $additional_comments;
    public $result_file;

    protected $rules = [
        'hematology' => 'required|string',
        'hematology_abnormality' => 'required_if:hematology,abnormal|string|nullable',
        'remarks_hematology' => 'nullable|string',
        'urinalysis' => 'required|string',
        'urinalysis_abnormality' => 'required_if:urinalysis,abnormal|string|nullable',
        'remarks_urinalysis' => 'nullable|string',
        'xray' => 'required|string',
        'xray_abnormality' => 'required_if:xray,abnormal|string|nullable',
        'remarks_xray' => 'nullable|string',
        'drugtest' => 'required|string',
        'drugtest_abnormality' => 'required_if:drugtest,positive|string|nullable',
        'remarks_drugtest' => 'nullable|string',
        'condition' => 'nullable|string',
        'additional_comments' => 'nullable|string',
        'result_file' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
    ];

    public function store()
    {
        $this->validate();

        // Save the file if uploaded
        if ($this->result_file) {
            $filePath = $this->result_file->store('documents', 'public');
        }

        // Example of storing data (adjust to your database structure)
        $medical_result = $this->selectedUser->student_information->medical_results()->create([
            'hematology' => $this->hematology,
            'hematology_abnormality' => $this->hematology_abnormality,
            'remarks_hematology' => $this->remarks_hematology,
            'urinalysis' => $this->urinalysis,
            'urinalysis_abnormality' => $this->urinalysis_abnormality,
            'remarks_urinalysis' => $this->remarks_urinalysis,
            'xray' => $this->xray,
            'xray_abnormality' => $this->xray_abnormality,
            'remarks_xray' => $this->remarks_xray,
            'drugtest' => $this->drugtest,
            'drugtest_abnormality' => $this->drugtest_abnormality,
            'remarks_drugtest' => $this->remarks_drugtest,
            'condition' => $this->condition,
            'additional_comments' => $this->additional_comments,
            'result_file_path' => $filePath ?? null,
            'semester' => now()->month <= 6 ? '2nd sem' : '1st sem',
            'school_year' => now()->month <= 6 ? (now()->year - 1) . '-' . now()->year : now()->year . '-' . (now()->year + 1),
            'upload_date' => now(),
            'reviewed_by' => 1,
            'uploaded_by' => 1
        ]);

        session()->flash('success', 'Medical results saved successfully!');
        $this->js("alert('Done setting up!')");
        return $this->generateCertificate($medical_result->id);
        return redirect('/student-list')->with(true);
    }

    public function mount()
    {
        // Check if selectedUser exists in the session
        $this->selectedUser = session('selectedUser');

        // If no user is selected, redirect back to the user list page
        if (!$this->selectedUser) {
            return redirect()->route('student-list')->with('error', 'No student selected.');
        }
    }

    public function generateCertificate($medicalResultId)
    {
        $encryptedId = Crypt::encryptString($medicalResultId);
        $medicalResult = MedicalResults::find($medicalResultId)->first();

        $url = route('medical-status', ['encryptedId' => $encryptedId]);

        // Generate the QR code
        $qrCode = new QrCode($url);
        $writer = new PngWriter();
        $qrCodeBinary = $writer->write($qrCode);
        
        // Save the QR code as an image or generate a data URL
        $qrCodeUrl = base64_encode($qrCodeBinary->getString());

        $pdf = PDF::loadView('pdf.medical-certificate', [
            'studentName' => $medicalResult->student_information->user->name,
            'yearLevel' => $medicalResult->student_information->year_level,
            'course' => $medicalResult->student_information->program->name,
            'dateReleased' => now()->toFormattedDateString(),
            'qrCodeUrl' => $qrCodeUrl,
        ]);
    
        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->stream();
        }, 'medical-certificate.pdf');

        // // Option 2: Download the PDF directly
        // // return $pdf->download('medical-certificate.pdf');
    }

    public function render()
    {
        return view('livewire.student-list.new-medical-result');
    }
}
