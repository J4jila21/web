<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class Register extends Component
{
    public $name, $email, $password, $password_confirmation;

    public function register()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|same:password_confirmation',
        ]);

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        session()->flash('success', 'Registrasi berhasil! Silakan login.');
        
        $this->reset(['name', 'email', 'password', 'password_confirmation']);
    }

    public function render()
    {
        return view('livewire.auth.register')
            ->layout('components.layouts.app');
    }
}
