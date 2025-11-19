<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Layout;

#[Layout('components.layouts.admin')]
class UsersEdit extends Component
{
    public $userId;
    public $name;
    public $email;
    public $password;

    public function mount($id)
    {
        $user = User::findOrFail($id);

        $this->userId = $user->id;
        $this->name = $user->name;
        $this->email = $user->email;
    }

    public function updateUser()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $this->userId,
            'password' => 'nullable|min:6',
        ]);

        $user = User::findOrFail($this->userId);

        $updateData = [
            'name' => $this->name,
            'email' => $this->email,
        ];

        if (!empty($this->password)) {
            $updateData['password'] = Hash::make($this->password);
        }

        $user->update($updateData);

        session()->flash('success', 'Data berhasil diperbarui');
        return redirect()->route('admin.users');
    }

    public function render()
    {
        return view('livewire.users-edit'
        )->layout('components.layouts.admin', [
            'title' => 'Edit Pengguna | Dashboard',
        ]);
    }
}
