<?php

namespace App\Livewire;

use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\Attributes\Layout;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

#[Layout('components.layouts.admin')]
class ProductIndex extends Component
{
    use WithFileUploads, WithPagination;

    protected $paginationTheme = 'tailwind';

    public $product;
    public $name, $price, $description, $quantity, $image, $imageName, $productId;
    public $previewImage;
    #[Url]
    public $search = '';
    #[Url]
    public $shortBy = 'latest';
    public $isEdit = false;
    public $showModal = false;
    public $showDeleteModal = false;
    public $showOptions = false;
    public $showViewModal = false;
    public $loading = false;
    public $selectedProduct;

    public function openModalView($id)
    {
        $this->selectedProduct = Product::find($id);
        $this->showViewModal = true;
    }

    public function openModalEdit($id)
    {
        $this->isEdit = true;
        $product = Product::find($id);

        $this->productId = $id;
        $this->name = $product->name;
        $this->price = $product->price;
        $this->quantity = $product->quantity;
        $this->description = $product->description;
        $this->previewImage = asset('storage/images/' . $product->image);

        $this->showModal = true;
    }

    public function openDeleteModal($id)
    {
        $this->productId = $id;
        $this->showDeleteModal = true;
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingShortBy()
    {
        $this->resetPage();
    }

    public function render()
    {
        $query = Product::where('name', 'like', '%' . $this->search . '%');

        switch ($this->shortBy) {
            case 'oldest':
                $query->orderBy('created_at', 'ASC');
                break;
            case 'expensive':
                $query->orderBy('price', 'DESC');
                break;
            case 'quantity':
                $query->orderBy('quantity', 'DESC');
                break;
            default:
                $query->orderBy('created_at', 'DESC'); // latest
                break;
        }

        return view('livewire.product-index', [
            'products' => $query->paginate(8),
        ]);
    }

    public function updatedImage()
    {
        if ($this->image) {
            $this->previewImage = $this->image->temporaryUrl();
        }
    }

    public function removeImage()
    {
        $this->image = null;
        $this->previewImage = null;
    }

    // Toggle dropdown options
    public function toggleOptions()
    {
        $this->showOptions = !$this->showOptions;
    }

    public function openModal($edit = false, $id = null)
    {
        $this->resetInput();
        $this->isEdit = $edit;

        if ($edit && $id) {
            $this->edit($id);
        }

        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->resetInput();
    }

    public function store()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gi,webp|max:2048',
        ]);

        if ($this->image) {
            $this->imageName = str::uuid() . '.' . $this->image->getClientOriginalExtension();
            $this->image->storeAs('images', $this->imageName, 'public');
        } else {
            $this->imageName = 'default.png';
        }

        Product::create([
            'name' => $this->name,
            'price' => $this->price,
            'quantity' => $this->quantity,
            'description' => $this->description,
            'image' => $this->imageName,
        ]);

        $this->closeModal();
        session()->flash('message', 'Produk berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $this->productId = $product->id;
        $this->name = $product->name;
        $this->price = $product->price;
        $this->quantity = $product->quantity;
        $this->description = $product->description;
        $this->imageName = $product->image;
        $this->previewImage = $product->image ? asset('storage/images/' . $product->image) : null;
    }

    public function update()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $product = Product::findOrFail($this->productId);

        // ✅ Jika gambar tidak diubah → pakai gambar lama
        if (!$this->image) {
            $this->imageName = $product->image;
        }

        // ✅ Jika gambar diubah → simpan baru
        if ($this->image) {
            if ($product->image && $product->image != 'default.png') {
                Storage::disk('public')->delete('images/' . $product->image);
            }

            $this->imageName = Str::uuid() . '.' . $this->image->getClientOriginalExtension();
            $this->image->storeAs('images', $this->imageName, 'public');
        }

        $product->update([
            'name' => $this->name,
            'price' => $this->price,
            'quantity' => $this->quantity,
            'description' => $this->description,
            'image' => $this->imageName,
        ]);

        $this->closeModal();
        session()->flash('message', 'Produk berhasil diperbarui.');
    }

    public function confirmDelete($id)
    {
        $this->productId = $id;
        $this->showDeleteModal = true;
    }

    public function delete()
    {
        $product = Product::findOrFail($this->productId);
        if ($product->image && $product->image != 'default.png') {
            Storage::disk('public')->delete('images/' . $product->image);
        }
        $product->delete();

        $this->showDeleteModal = false;
        session()->flash('message', 'Produk berhasil dihapus.');
    }

    private function resetInput()
    {
        $this->name = '';
        $this->price = '';
        $this->quantity = '';
        $this->description = '';
        $this->image = null;
        $this->imageName = '';
        $this->productId = null;
        $this->previewImage = null;
    }
}
