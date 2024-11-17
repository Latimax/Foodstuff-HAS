<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }


    public function announcement()
    {
        $notification = Notification::first();
        return view('user.notification', compact('notification'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function login()
    {
        if (Auth::guard('auth')->check()) {
            return redirect()->route('user.dashboard');
        }

        return view('user.auth.login');
    }

    public function register()
    {

        return view('user.auth.register');
    }

    public function createUser(Request $request)
    {

        // Validate the incoming request data
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'phone' => 'required|string|max:15',
            'city' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'gender' => 'required|string|in:male,female',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Create a new user with inactive status
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'city' => $request->city,
            'state' => $request->state,
            'country' => $request->country,
            'gender' => $request->gender,
            'status' => 'inactive', // Set status to inactive
        ]);

        // Redirect to login with a success message
        return redirect()->route('login')->with('message', 'Your account has been registered. An administrator will activate it soon.');
    }
    public function loginUser(Request $request)
    {

        $credentials = $request->only('email', 'password', 'role');

        // First check if credentials are valid and status is active
        if (Auth::guard('auth')->attempt(array_merge($credentials, ['status' => 'active']))) {
            return redirect()->route('user.dashboard');
        }

        // If authentication failed, check if it's due to inactive status
        $user = User::where('email', $request->email)->first();
        if ($user && $user->status !== 'active') {
            return back()->with(['message' => 'Account is inactive. Please contact administrator.']);
        }

        return back()->with(['message' => 'Invalid credentials']);
    }

    public function logout()
    {
        Auth::guard('auth')->logout();
        return redirect()->route('login');
    }

    public function dashboard()
    {
        return view('user.dashboard');
    }


    public function settings() {}

    public function updateSettings() {}

    public function createSupport()
    {

        $id =  auth()->guard('auth')->id();

        $user = User::findorfail($id);
        return view('user.support', compact('user'));
    }
}
