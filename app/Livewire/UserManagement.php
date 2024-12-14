<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class UserManagement extends Component
{
    public function render()
    {
        $users = User::all();

        return view('livewire.user-management', ['users' => $users]);
    }
}
