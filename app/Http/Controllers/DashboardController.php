<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function user(): View|RedirectResponse
    {
        if (auth()->user()->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }

        return view('dashboard.user');
    }

    public function admin(): View
    {
        return view('dashboard.admin', [
            'totalUsers' => User::where('role', 'user')->count(),
            'totalAdmins' => User::where('role', 'admin')->count(),
            'latestUsers' => User::where('role', 'user')->latest()->take(6)->get(),
        ]);
    }
}
