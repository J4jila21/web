<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Post;
use Livewire\Attributes\Layout;
use Illuminate\Support\Str;


#[Layout('components.layouts.admin')]
class Edit extends Component
{
    use WithFileUploads;

    public $post;
    public $title, $author, $slug, $body, $image, $newImage;

    public function mount(Post $post)
    {
        $this->post = $post;
        $this->title = $post->title;
        $this->author = $post->author;
        $this->body = $post->body;
        $this->image = $post->image;
    }

    public function update()
    {
        $this->validate([
            'title' => 'required',
            'author' => 'required',
            'body' => 'required',
            'newImage' => 'nullable|image|max:2048',
        ]);

        $imageName = $this->image;
        if ($this->newImage) {
            $imageName = $this->newImage->store('images', 'public');
            $imageName = basename($imageName);
        }

        $this->post->update([
            'title' => $this->title,
            'author' => $this->author,
            'slug' => Str::slug($this->title),
            'body' => $this->body,
            'image' => $imageName,
        ]);

        session()->flash('message', 'Blog berhasil diperbarui.');
        return redirect()->route('admin.blogs');
    }

    public function render()
    {
        return view('livewire.blogs-edit')
            ->layout('components.layouts.admin', [
                'title' => 'Edit Artikel | Dashboard',
            ]);
    }
}

