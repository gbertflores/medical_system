<?php

namespace App\Livewire;

use Carbon\Carbon;
use App\Models\Appointment; // Import the Appointment model
use Livewire\Component;

class Calendar extends Component
{
    public $currentMonth;
    public $currentYear;
    public $calendar = [];
    public $eventSchedule = '';
    public $eventDate = '';

    public function mount()
    {
        $this->currentMonth = now()->month;
        $this->currentYear = now()->year;
        $this->generateCalendar();
    }

    public function generateCalendar()
    {
        $startOfMonth = Carbon::createFromDate($this->currentYear, $this->currentMonth, 1);
        $endOfMonth = $startOfMonth->copy()->endOfMonth();

        $startDate = $startOfMonth->startOfWeek(Carbon::SUNDAY);
        $endDate = $endOfMonth->endOfWeek(Carbon::SATURDAY);

        $currentDate = $startDate->copy();

        $weeks = [];
        while ($currentDate->lte($endDate)) {
            $week = [];
            for ($i = 0; $i < 7; $i++) {
                $week[] = [
                    'date' => $currentDate->toDateString(),
                    'day' => $currentDate->day,
                    'is_today' => $currentDate->isToday(),
                    'is_current_month' => $currentDate->month === $this->currentMonth,
                    'events' => $this->getEventsForDay($currentDate),
                ];
                $currentDate->addDay();
            }
            $weeks[] = $week;
        }

        $this->calendar = $weeks;
    }

    public function getEventsForDay(Carbon $specific_date)
    {
        if ($specific_date->lt(today())) {
            return []; // No events for past dates
        }

        $events = [];
        $totalSlotsPerDay = 250; // Default total slots (am + pm)

        // Check booked slots for each schedule (AM and PM)
        foreach (['am', 'pm'] as $schedule) {
            // Get the count of booked appointments for this schedule
            $bookedAppointments = Appointment::where('appointment_date', $specific_date->toDateString())
                ->where('appointment_schedule', strtoupper($schedule)) // Assuming schedule is stored as 'AM' or 'PM'
                // ->where('status', 'pending') // Assuming 'booked' is the status of confirmed appointments
                ->count();

            $remainingSlots = $totalSlotsPerDay - $bookedAppointments;

            // Add event if there are remaining slots
            if ($remainingSlots > 0) {
                $events[$specific_date->toDateString()][] = [
                    'title' => ucfirst($schedule) . " - {$remainingSlots} slots left",
                    'type' => 'primary',
                    'schedule' => strtoupper($schedule),
                    'date' => $specific_date->toDateString(),
                ];
            }
        }

        return $events[$specific_date->toDateString()] ?? [];
    }

    public function triggerModal($eventSchedule, $eventDate)
    {
        $this->eventSchedule = $eventSchedule;
        $this->eventDate = $eventDate;

        $this->dispatch('showModal');
    }

    public function goToPreviousMonth()
    {
        $this->currentMonth--;
        if ($this->currentMonth < 1) {
            $this->currentMonth = 12;
            $this->currentYear--;
        }
        $this->generateCalendar();
    }

    public function goToNextMonth()
    {
        $this->currentMonth++;
        if ($this->currentMonth > 12) {
            $this->currentMonth = 1;
            $this->currentYear++;
        }
        $this->generateCalendar();
    }

    public function render()
    {
        return view('livewire.calendar');
    }
}
