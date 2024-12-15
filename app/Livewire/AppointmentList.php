<?php

namespace App\Livewire;

use App\Models\Appointment;
use Livewire\Component;

class AppointmentList extends Component
{
    public $appointmentId;
    public $status;

    public function openStatusUpdateModal($appointmentId)
    {
        $this->appointmentId = $appointmentId;
        $this->dispatch('showModal');
    }

    public function updateStatus()
    {
        // $this->validate();

        // Find and update the appointment
        $appointment = Appointment::find($this->appointmentId);
        $appointment->status = $this->status;
        $appointment->save();

        // Emit event to close the modal
        $this->dispatch('closeModal');

        // Optionally, show a success message
        session()->flash('message', 'Status updated successfully.');
    }

    public function render()
    {
        $appointments = Appointment::where('appointment_date', now()->format('Y-m-d'))->with('user.profile', 'studentInformation')->get();
        foreach($appointments as $appointment){
            $appointment->student_number = $appointment->user->profile->zppsu_number;
            // $appointment->studentInformation;
        }

        return view('livewire.appointment-list', ['appointments'=>$appointments]);
    }
}
