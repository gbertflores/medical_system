<?php

namespace App\Livewire;

use Livewire\Component;

class Dashboard extends Component
{
    public $first_access = false;

    public function mount()
    {
        $this->first_access = session('first_access')??false;
    }

    public function render()
    {
        return view('livewire.dashboard');
    }
}
