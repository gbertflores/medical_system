<?php

namespace App\Livewire;

use App\Models\StudentInformation;
use App\Models\User;
use Livewire\Component;

class StudentList extends Component
{
    public $selectedUser = null;

    public function showDetails($userId)
    {
        // Set the selected appointment and hide the list
        $this->selectedUser = User::find($userId);

        return redirect('/student-list/new-medical-result')->with('selectedUser', $this->selectedUser);
    }

    public function render()
    {
        $users = User::where('role', 'student')->get();

        return view('livewire.student-list', ['users' => $users]);
    }
}
