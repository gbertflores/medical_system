<?php

namespace App\Livewire;

use App\Models\Appointment;
use Livewire\Attributes\On;
use Livewire\Component;

class BookAppointment extends Component
{
    #[On('save-appointment')]
    public function store($date, $schedule)
    {
        // Get the currently authenticated user
        $user = auth()->user();

        // Check if the user has already booked an appointment in the current semester and school year
        $existingAppointment = Appointment::where('user_id', $user->id)
            ->where('school_year', now()->format('Y') . '-' . (now()->format('Y') + 1))
            ->where('semester', '1st Semester')
            ->where('status', '!=', 'Missed') // Ensure the previous appointment is not missed
            ->first();

        // If an existing appointment exists, don't allow booking
        if ($existingAppointment) {
            $this->js("alert('You can only book one appointment per semester unless you missed your previous appointment.')");
            return;
        }

        // Create the new appointment if no existing appointment is found or if the previous one was missed
        $appointment = Appointment::create([
            'user_id' => $user->id,
            'appointment_date' => $date,
            'appointment_schedule' => $schedule,
            'school_year' => now()->format('Y') . '-' . (now()->format('Y') + 1),
            'semester' => '1st Semester',
            'status' => 'Pending', // You can set this to 'Pending' or whatever default status you want
        ]);

        // Notify the user of a successful booking
        $this->js("alert('Appointment Booked!')");

        // Redirect to the appointment page
        return redirect('/book-appointment'); 
    }

    public function render()
    {
        return view('livewire.book-appointment');
    }
}
