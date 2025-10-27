 <?php
use App\Models\post;
use App\Models\Product;
use App\Livewire\Admin\Login;
use App\Livewire\ProductIndex;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;

Route::get('/buku', function () {
    return view('buku.index', [
        'title' => 'Buku',
    ]);
});

Route::get('/about', function () {
    return view('about.index', [
        'title' => 'Tentang Kami',
    ]);
});

Route::get('/blog', function () {
    $posts = post::latest();

    if (request('search')) {
        $posts->where('title', 'like', '%' . request('search') . '%')->orwhere('body', 'like', '%' . request('search') . '%');
    }

    return view('blog.index', [
        'title' => 'Blog - Kopi Terbaik dari Nusantara',
        'posts' => $posts->paginate(5),
    ]);
});

Route::get('/blog/{post:slug}', function (post $post) {
    return view('post', ['title' => 'single post', 'post' => $post]);
});

Route::get('contact', function () {
    return view('contact.index', [
        'title' => 'Contact',
    ]);
});

Route::get('/buku', [BukuController::class, 'index'])->name('buku.index');
Route::post('/buku', [BukuController::class, 'store'])->name('buku.store');
Route::get('/buku/{id}/edit', [BukuController::class, 'edit'])->name('buku.edit');
Route::put('/buku/{id}', [BukuController::class, 'update'])->name('buku.update');
Route::delete('/buku/{id}/delete', [BukuController::class, 'destroy'])->name('buku.delete');
Route::resource('buku', BukuController::class);
Route::resource('product', ProductController::class);
Route::get('/product', [ProductController::class, 'index'])->name('product.index');
Route::get('/', [HomeController::class, 'index'])->name('home.index');


Route::get('/dashboard/login', [LoginController::class, 'showLoginForm'])->name('login.form');
Route::post('/dashboard/login', [LoginController::class, 'login'])->name('login.submit');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');



Route::prefix('dashboard')->name('admin.')->middleware('auth')->group(function () {
    
    // Dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // Admin Products (Livewire)
    Route::get('/products', ProductIndex::class)->name('products.index');

    // Admin CRUD Produk (Controller, optional)
    Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');
    Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
    Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');
});


Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();

    return redirect('/dashboard/login');
})->name('logout');


