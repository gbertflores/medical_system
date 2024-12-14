<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Livewire\Component;

class Register extends Component
{

    public $name ='';
    public $username = '';
    public $email = '';
    public $password = '';

    protected $rules=[
    'username' => 'required|min:6',
    'email' => 'required|email|unique:users,email',
    'password' => 'required|min:6',];


    public function store(){

        $attributes = $this->validate();

        $user = User::create($attributes);

        auth()->login($user);
        
        return redirect('/setup-account');
    } 

    public function render()
    {
        return view('livewire.auth.register');
    }
}
