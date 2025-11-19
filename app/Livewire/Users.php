<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;
use Livewire\Attributes\Layout;

#[Layout('components.layouts.admin')]
class Users extends Component
{
    use WithPagination;

    public $sortOrder = 'desc'; 
    protected $queryString = ['sortOrder']; 
    public $showDeleteModal = false;

    public $userId;
    public $name;
    public $email;

    // reset pagination saat sorting berubah
    public function updatingSortOrder()
    {
        $this->resetPage();
    }

    public function openDeleteModal($id)
    {
        $this->userId = $id;
        $this->showDeleteModal = true;
    }

    public function deleteuser()
    {
        $user = User::find($this->userId);
        $user->delete();
        $this->showDeleteModal = false;
        session()->flash('success', 'Pengguna berhasil dihapus');
    }
    public function render()
    {
        $users = User::orderBy('created_at', $this->sortOrder)->paginate(8);

        return view('livewire.users', [
            'users' => $users,
        ])
            ->layout('components.layouts.admin', [
                'title' => 'Pengguna | Seduhin',
            ]);
        
    }
}
