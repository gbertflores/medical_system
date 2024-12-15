<?php

namespace App\Livewire;

use App\Models\Campus;
use App\Models\MedicalProfile;
use App\Models\Profile;
use App\Models\StudentInformation;
use Livewire\Component;

class SetupAccount extends Component
{
    public $step = 1; // Initial step
    public $campuses;

    public $last_name;
    public $first_name;
    public $middle_name;
    public $extension_name;
    public $street;
    public $barangay;
    public $city;
    public $province;
    public $contact_number;
    public $campus_id;
    public $college;
    public $course;
    public $major;
    public $student_number;
    public $year_level;
    public $status;
    public $birthdate;
    public $gender;
    public $blood_type;
    public $allergies;
    public $medical_history;

    protected $rules = [
        'last_name' => 'required|string|max:255',
        'first_name' => 'required|string|max:255',
        'middle_name' => 'nullable|string|max:255',
        'extension_name' => 'nullable|string|max:255',
        'street' => 'required|string|max:255',
        'barangay' => 'required|string|max:255',
        'city' => 'required|string|max:255',
        'province' => 'required|string|max:255',
        'contact_number' => 'required|numeric|min:10',
        'campus_id' => 'required|int',
        'college' => 'required|string|max:255',
        'course' => 'required|string|max:255',
        'student_number' => 'required|string|max:255',
        'major' => 'nullable|string|max:255',
        'year_level' => 'required|string|max:50',
        'status' => 'required|string|max:50',
        'birthdate' => 'required|date',
        'gender' => 'required|string|max:50',
        'blood_type' => 'required|string|max:10',
        'allergies' => 'required|string|max:1000',
        'medical_history' => 'required|string|max:1000',
    ];
    
    public function mount()
    {
        $this->campuses = Campus::select('id', 'name')->get();
    }

    public function store()
    {
        $user = auth()->user();
        // Validate the input data
        $validatedData = $this->validate();

        $user->update([
            'name' => trim($this->last_name . ' ' . $this->first_name . ' ' . ($this->middle_name ? $this->middle_name . ' ' : '') . ($this->extension_name ? $this->extension_name : '')),
        ]);

        // Save data in the PersonalInformation table
        $profile = Profile::create([
            'user_id' => $user->id,
            'last_name' => $this->last_name,
            'first_name' => $this->first_name,
            'middle_name' => $this->middle_name??'',
            'extension_name' => $this->extension_name??'',
            'contact_number' => $this->contact_number,
            'address' => $this->street.', '.$this->barangay.', '.$this->city.', '.$this->province,
        ]);

        // Save data in the StudentInformation table
        $studentInfo = StudentInformation::create([
            'user_id' => $user->id,
            'campus_id' => $this->campus_id,
            'college' => $this->college,
            'course' => $this->course,
            'major' => $this->major,
            'year_level' => $this->year_level,
            'status' => $this->status,
            'zppsu_number' => $this->student_number,
        ]);

        // Save data in the MedicalProfile table
        $medicalProfile = MedicalProfile::create([
            'profile_id' => $profile->id,
            'birthdate' => $this->birthdate,
            'gender' => $this->gender,
            'blood_type' => $this->blood_type,
            'allergies' => $this->allergies,
            'medical_history' => $this->medical_history,
        ]);

        // Optionally, you can associate these records with a user or another entity

        // Redirect to dashboard
        $this->js("alert('Done setting up!')");

        return redirect('/dashboard')->with('first_access', true);
    }

    public function render()
    {
        return view('livewire.setup-account');
    }
}
