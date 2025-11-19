<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserLogin extends Component
{
    public $email, $password;
    public $isLogin = true;

    public function login()
{
    $this->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    $credentials = [
        'email' => $this->email,
        'password' => $this->password,
    ];

    if (Auth::guard('web')->attempt($credentials, true)) {
        session()->regenerate();
        return redirect()->to('/'); // full reload supaya Auth terdeteksi di Blade
    }

    $this->addError('password', 'Email atau password salah.');
}

    public function render()
    {
        return view('livewire.auth.login')
            ->layout('components.layouts.app', [
                'title' => ($this->isLogin ? 'Masuk' : 'Daftar') . ' - Seduhin',
                'hideNavbar' => true,
                'hideFooter' => true,
            ]);
    }
}
