<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Carbon\Carbon;

class ResetPassword extends Component
{
    public $token;
    public $email;
    public $password;
    public $password_confirmation;
    public $expiresAt;

    public function mount($token)
    {
        $this->token = $token;

        $record = DB::table('password_resets')->where('token', $this->token)->first();

        if (!$record) {
            session()->flash('error', 'Token tidak valid atau sudah digunakan.');
            return redirect()->route('forgot-password');
        }

        $this->email = $record->email;
        $this->expiresAt = Carbon::parse($record->expires_at)->toIso8601String();
    }

    public function resetPassword()
    {
        $this->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        $record = DB::table('password_resets')->where('email', $this->email)
            ->where('token', $this->token)->first();

        if (!$record) {
            $this->addError('email', 'Token tidak valid.');
            return;
        }

        if (Carbon::now()->isAfter($record->expires_at)) {
            $this->addError('email', 'Token sudah kedaluwarsa.');
            return;
        }

        User::where('email', $this->email)->update([
            'password' => Hash::make($this->password),
        ]);

        DB::table('password_resets')->where('email', $this->email)->delete();

        // 🔔 Kirim event ke frontend untuk popup
        $this->dispatch('passwordResetSuccess');
    }

    public function render()
    {
        return view('livewire.auth.reset-password')
            ->layout('components.layouts.app', [
                'title' => 'Reset Password - Seduhin',
            ]);
    }
}
