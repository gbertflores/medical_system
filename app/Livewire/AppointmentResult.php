<?php

namespace App\Livewire;

use Livewire\Component;

class AppointmentResult extends Component
{
    public $appointment;
    public $hematology;
    public $hematology_file;
    public $urinalysis;
    public $xray;
    public $drugtest;

    public function mount()
    {
        // Check if selectedAppointment exists in the session
        $this->appointment = session('selectedAppointment');

        // If no appointment is selected, redirect back to the appointment list page
        if (!$this->appointment) {
            return redirect()->route('appointment-list')->with('error', 'No appointment selected.');
        }
    }

    public function render()
    {
        return view('livewire.appointment-list.result');
    }
}
