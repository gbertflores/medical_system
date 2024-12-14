<?php

namespace App\Livewire;

use Livewire\Component;

class SetupAccount extends Component
{
    public $step = 1; // Initial step

    public function save()
    {
        return redirect('/dashboard')->with('first_access', true);
    }

    public function render()
    {
        return view('livewire.setup-account');
    }
}
