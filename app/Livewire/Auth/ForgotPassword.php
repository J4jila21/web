<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class ForgotPassword extends Component
{
    public $email;

    public function submit()
    {
        $this->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        // Buat token unik & expired 2 menit
        $token = Str::random(64);
        $expiresAt = Carbon::now()->addMinutes(2);

        // Simpan ke tabel password_resets
        DB::table('password_resets')->updateOrInsert(
            ['email' => $this->email],
            [
                'token' => $token,
                'expires_at' => $expiresAt,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );

        // Redirect otomatis ke halaman reset password
        return redirect()->route('reset-password', ['token' => $token]);
    }

    public function render()
    {
        return view('livewire.auth.forgot-password')
            ->layout('components.layouts.app', ['title' => 'Lupa Password - Seduhin']);
    }
}
