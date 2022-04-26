<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;

class Register extends Component
{
    public $email;

    public $password;

    public $passwordConfirmation;

    protected $rules   = [
        "email" => "required|email|unique:users",
        "password" => "required|min:6|same:passwordConfirmation",
    ];

    public function register()
    {

        $data = $this->validate();

        User::create([
            "name" => $this->email,
            "email" => $this->email,
            'password' => Hash::make($this->password),
        ]);

        return redirect("/");
    }


    public function updatedEmail()
    {

        $this->validate([
            "email" => "required|email|unique:users",

        ]);
    }
    public function render()
    {
        return view('livewire.register');
    }
}
