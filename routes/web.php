 <?php
use App\Models\post;
use App\Models\Product;
use App\Livewire\ProductIndex;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Livewire\Auth\UserLogin;
use App\Livewire\Auth\Register;
use App\Livewire\Auth\ForgotPassword;
use App\Livewire\Auth\ResetPassword;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\CheckoutController;
use App\Livewire\Users;
use App\Livewire\UsersEdit;
use App\Livewire\Create;
use App\Livewire\Edit;
use App\Livewire\Blogs;
use App\Livewire\Admin\Orders;
use App\Livewire\Admin\Dashboard;


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
        'title' => 'Blog - seduhin kopi bareng',
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

Route::middleware('web')->group(function () {
Route::resource('product', ProductController::class);
Route::get('/product', [ProductController::class, 'index'])->name('product.index');
Route::post('/order/store', [ProductController::class, 'store'])->name('order.store');

Route::get('/', [HomeController::class, 'index'])->name('home.index');

Route::get('/login', UserLogin::class)->name('login'); 
Route::get('/register', Register::class)->name('register');
Route::get('/user/dashboard', [UserController::class, 'dashboard'])->name('user.dashboard');
    Route::get('/user/pesanan', [UserController::class, 'pesanan'])->name('user.pesanan');
    Route::post('/user/pesanan', [UserController::class, 'pesanan'])->name('user.pesanan');
    Route::get('user/pesanan/detail/{id}', [UserController::class, 'detail'])->name('user.detail.pesanan');
    Route::get('/user/profile/edit', [UserController::class, 'editProfile'])->name('user.profile.edit');
    Route::put('/user/profile/update', [UserController::class, 'updateProfile'])->name('user.profile.update');
Route::post('/checkout/store', [CheckoutController::class, 'store'])
    ->middleware('auth')
    ->name('checkout.store');

Route::get('/checkout', function () {
    return view('checkout', [
        'title' => 'Checkout',
    ]);
})->middleware('auth')->name('checkout');


Route::post('/logout', function () {
    Auth::guard('web')->logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/login');
})->name('logout');
});


Route::get('/forgot-password', ForgotPassword::class)->name('forgot-password');
Route::get('/reset-password/{token}', ResetPassword::class)->name('reset-password');

Route::prefix('dashboard')->group(function () {
    Route::middleware('admin.guest')->group(function () {
        Route::get('/login', [AdminLoginController::class, 'showLoginForm'])->name('admin.login');
        Route::post('/login', [AdminLoginController::class, 'login'])->name('admin.login.submit');
    });

    Route::post('/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');



Route::middleware('auth:admin')->group(function () {
    
    Route::get('/', Dashboard::class)->name('admin.dashboard');
    Route::get('/products', ProductIndex::class)->name('admin.products.index');
    Route::get('/users', Users::class)->name('admin.users');
    Route::get('/users/{id}/edit', UsersEdit::class)->name('admin.users.edit');
    Route::get('/blogs', Blogs::class)->name('admin.blogs');
    Route::get('/create', Create::class)->name('admin.blogs.create');
    Route::get('/edit/{post}',Edit::class)->name('admin.blogs.edit');

    Route::get('/orders', Orders::class)->name('admin.orders');


    Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');
    Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
    Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');
});


});