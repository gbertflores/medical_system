<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class NewMedicalResult extends Component
{
    use WithFileUploads;
    
    public $user;

    public $hematology;
    public $abnormality_hematology;
    public $remarks_hematology;
    public $urinalysis;
    public $abnormality_urinalysis;
    public $remarks_urinalysis;
    public $xray;
    public $abnormality_xray;
    public $remarks_xray;
    public $drugtest;
    public $abnormality_drugtest;
    public $remarks_drugtest;
    public $condition;
    public $additional_comments;
    public $hematology_file;

    protected $rules = [
        'hematology' => 'required|string',
        'abnormality_hematology' => 'required_if:hematology,abnormal|string|nullable',
        'remarks_hematology' => 'nullable|string',
        'urinalysis' => 'required|string',
        'abnormality_urinalysis' => 'required_if:urinalysis,abnormal|string|nullable',
        'remarks_urinalysis' => 'nullable|string',
        'xray' => 'required|string',
        'abnormality_xray' => 'required_if:xray,abnormal|string|nullable',
        'remarks_xray' => 'nullable|string',
        'drugtest' => 'required|string',
        'abnormality_drugtest' => 'required_if:drugtest,positive|string|nullable',
        'remarks_drugtest' => 'nullable|string',
        'condition' => 'nullable|string',
        'additional_comments' => 'nullable|string',
        'hematology_file' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
    ];

    public function store()
    {
        $this->validate();

        // Save the file if uploaded
        if ($this->hematology_file) {
            $filePath = $this->hematology_file->store('documents', 'public');
        }

        // Example of storing data (adjust to your database structure)
        AppointmentResult::create([
            'hematology' => $this->hematology,
            'abnormality_hematology' => $this->abnormality_hematology,
            'remarks_hematology' => $this->remarks_hematology,
            'urinalysis' => $this->urinalysis,
            'abnormality_urinalysis' => $this->abnormality_urinalysis,
            'remarks_urinalysis' => $this->remarks_urinalysis,
            'xray' => $this->xray,
            'abnormality_xray' => $this->abnormality_xray,
            'remarks_xray' => $this->remarks_xray,
            'drugtest' => $this->drugtest,
            'abnormality_drugtest' => $this->abnormality_drugtest,
            'remarks_drugtest' => $this->remarks_drugtest,
            'condition' => $this->condition,
            'additional_comments' => $this->additional_comments,
            'file_path' => $filePath ?? null,
        ]);

        session()->flash('success', 'Appointment results saved successfully!');
    }

    public function mount()
    {
        // Check if selectedUser exists in the session
        $this->user = session('selectedUser');

        // If no user is selected, redirect back to the user list page
        if (!$this->user) {
            return redirect()->route('student-list')->with('error', 'No student selected.');
        }
    }

    public function render()
    {
        return view('livewire.student-list.new-medical-result');
    }
}
