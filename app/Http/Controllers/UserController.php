<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // Halaman dashboard user
    public function dashboard()
    {
        $user = Auth::user();

        $total_orders = Order::where('user_id', $user->id)->count();

        $orders_process = Order::where('user_id', $user->id)->where('status', 'process')->count();

        $orders_done = Order::where('user_id', $user->id)->where('status', 'done')->count();

        $latest_orders = Order::where('user_id', $user->id)
                          ->orderBy('created_at', 'desc')
                          ->limit(5)
                          ->get();

        return view('user.dashboard', [
            'user' => $user,
            'total_orders' => $total_orders,
            'orders_process' => $orders_process,
            'orders_done' => $orders_done,
            'latest_orders' => $latest_orders,
            'title' => 'Dashboard',
            
        ]);
    }

    // Halaman edit profil
    public function updateProfile(Request $request)
{
    $user = Auth::user();

    // Validasi input
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email',
    ]);

    if ($user instanceof User) // Update data user
    $user->update([
        'name' => $request->name,
        'email' => $request->email,
    ]);

    return redirect()->route('user.dashboard')->with('success', 'Profil berhasil diperbarui!');
}

public function pesanan(Request $request)
{
    $user = Auth::user();

    // Ambil sort_by & sort_order
    $sortBy = $request->get('sort_by', 'created_at');
    $sortOrder = $request->get('sort_order', 'desc');

    // Validasi arah sort
    if (!in_array($sortOrder, ['asc', 'desc'])) {
        $sortOrder = 'desc';
    }

    // Validasi kolom yang boleh disort
    $allowedSortBy = ['created_at', 'status'];
    if (!in_array($sortBy, $allowedSortBy)) {
        $sortBy = 'created_at';
    }

    $status = $request->get('status', 'all');

    $query = Order::where('user_id', $user->id);

    if ($status !== 'all') {
        $query->where('status', $status);
    }

    // Query setelah validasi
    $orders = $query
        ->orderBy($sortBy, $sortOrder)
        ->paginate(10);

    return view('user.pesanan',[
        'orders' => $orders,
        'sortBy' => $sortBy,
        'sortOrder' => $sortOrder,
        'status' => $status,
        'title' => 'Pesanan Saya',]);
}

public function editProfile()
{
    $user = Auth::user();
    return view('user.edit-profile', [
        'user' => $user,
        'title' => 'Edit Profile',
    ]);
}

    public function detail ($id)
    {
        $order = Order::with('items.product')->where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        return view('user.detail-pesanan', compact('order'));
    }
    // Logout user
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('success', 'Berhasil logout!');
    }
}
