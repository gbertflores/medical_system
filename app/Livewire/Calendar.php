<?php

namespace App\Livewire;

use Carbon\Carbon;
use Livewire\Component;

class Calendar extends Component
{
    public $currentMonth;
    public $currentYear;
    public $calendar = [];
    public $slots = [
        '2024-12-01' => ['am' => 10, 'pm' => 10],
        '2024-12-02' => ['am' => 8, 'pm' => 5],
    ];

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
        $events = [];
        foreach ($this->slots as $date => $slot) {
            $events[$date] = [
                [
                    'title' => "AM - {$slot['am']} slots<br>PM - {$slot['pm']} slots",
                    'type' => 'primary',
                ]
            ];
        }

        return $events[$specific_date->toDateString()] ?? [];
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