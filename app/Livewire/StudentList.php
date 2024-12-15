<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class StudentList extends Component
{
    public function render()
    {
        $users = User::where('role', 'student')->get();

        return view('livewire.student-list', ['users' => $users]);
    }
}
