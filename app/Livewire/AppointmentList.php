<?php

namespace App\Livewire;

use App\Models\Appointment;
use Livewire\Component;

class AppointmentList extends Component
{
    public $selectedAppointment = null;
    public $appointmentId;
    public $status;

    public function openStatusUpdateModal($appointmentId)
    {
        $this->appointmentId = $appointmentId;
        $this->dispatch('showModal');
    }

    public function updateStatus()
    {
        $appointment = Appointment::find($this->appointmentId);
        $appointment->update([
            'status' => $this->status
        ]);


        $this->js("alert('Successfully updated!')");
        return redirect('/appointment-list');
    }

    public function showDetails($appointmentId)
    {
        // Set the selected appointment and hide the list
        $this->selectedAppointment = Appointment::find($appointmentId);

        return redirect('/appointment-list/result')->with('selectedAppointment', $this->selectedAppointment);
    }

    public function goBackToList()
    {
        // Reset to show the list again
        $this->selectedAppointment = null;
    }

    public function render()
    {
        $appointments = Appointment::with('user.profile', 'studentInformation')->get();
        foreach($appointments as $appointment){
            $appointment->student_number = $appointment->user->profile->zppsu_number;
            // $appointment->studentInformation;
        }

        return view('livewire.appointment-list', ['appointments'=>$appointments]);
    }
}
