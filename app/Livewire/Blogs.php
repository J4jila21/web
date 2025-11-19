<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;
use Livewire\Attributes\Layout;
use Livewire\WithPagination;


#[Layout('components.layouts.admin')]
class Blogs extends Component
{
    use WithPagination;

    public $search = '';
    public $showDeleteModal = false;

    public $postId;
    public $title;
    public $author;
    public $body;
    public $image;

    public function render()
    {
        $posts = Post::where('title', 'like', "%{$this->search}%")
            ->latest()
            ->paginate(10);

        return view('livewire.blogs', [
            'posts' => $posts,
            
        ])->layout('components.layouts.admin', [
            'title' => 'Artikel | Dashboard',
        ]);
    }

    public function openDeleteModal($id)
    {
        $this->postId = $id;
        $this->showDeleteModal = true;
    }

    public function delete()
    {
        $Post = Post::findOrFail($this->postId);
        $Post->delete();
        $this->showDeleteModal = false;
        session()->flash('message', 'Blogs berhasil dihapus.');
    }
}

