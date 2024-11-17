<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\Manager;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
   
        return view('manager.dashboard');
    }

    public function announcement()
    {
        $notification = Notification::first();
        return view('manager.notification', compact('notification'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function login()
    {
        if (Auth::guard('manager')->check()) {
            return redirect()->route('manager.dashboard');
        }

        return view('manager.auth.login');
    }

    public function loginManager(Request $request)
    {

        $credentials = $request->only('email', 'password', 'role');

        // First check if credentials are valid and status is active
        if (Auth::guard('manager')->attempt(array_merge($credentials, ['status' => 'active']))) {
            return redirect()->route('manager.dashboard');
        }

        // If authentication failed, check if it's due to inactive status
        $manager = Manager::where('email', $request->email)->first();
        if ($manager && $manager->status !== 'active') {
            return back()->with(['message' => 'Account is inactive. Please contact administrator.']);
        }

        return back()->with(['message' => 'Invalid credentials']);
    }

    public function logout()
    {
        Auth::guard('manager')->logout();
        return redirect()->route('manager.login.form');
    }

    public function dashboard()
    {
        return view('manager.dashboard');
    }
}
