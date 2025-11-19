<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Post;
use Livewire\Attributes\Layout;
use Illuminate\Support\Str;


#[Layout('components.layouts.admin')]
class Create extends Component
{
    use WithFileUploads;

    public $title, $author, $slug, $body, $image;

    public function store()
    {
        $this->validate([
            'title' => 'required',
            'author' => 'required',
            'body' => 'required',
            'image' => 'nullable|image|max:2048',
        ]);

        $slug = Str::slug($this->title);
        $imageName = null;

        if ($this->image) {
            $imageName = $this->image->store('images', 'public');
        }

        Post::create([
            'title' => $this->title,
            'author' => $this->author,
            'slug' => $slug,
            'body' => $this->body,
            'image' => basename($imageName),
        ]);

        session()->flash('message', 'Blog berhasil ditambahkan.');
        return redirect()->route('admin.blogs');
    }

    public function render()
    {
        return view('livewire.blogs-create')
            ->layout('components.layouts.admin', [
            'title' => 'Buat Artikel | Dashboard',
        ]);
        
    }
}
