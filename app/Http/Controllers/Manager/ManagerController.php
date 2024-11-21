<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\Manager;
use App\Models\Notification;
use App\Models\Orders;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
        $manager = Manager::findorfail(auth()->guard('manager')->id());
        return view('manager.dashboard', compact('manager'));
    }
    public function settings() {
        return view('manager.settings');
    }

    public function updateSettings(Request $request) {
           // Validate the request data
           $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);

        $manager = Manager::findorfail(auth()->guard('manager')->id());

        // Check if the current password matches
        if (!Hash::check($request->current_password, $manager->password)) {
            return back()->withErrors(['current_password' => 'Current password is incorrect']);
        }

        // Update the user's password
        $manager->password = Hash::make($request->new_password);
        $manager->save();

        // Redirect back with a success message
        return back()->with('message', 'Password successfully updated');
    
    }

    public function orders() {
        $orders = Orders::all(); // Fetch all orders
        $settings = Setting::first(); // Example settings object for currency
        return view('manager.orders-list', compact('orders', 'settings'));
    
    }

    public function viewOrder($id) {
        $order = Orders::findorfail($id);
        
        return view('manager.order-show', compact('order'));
    }

    public function updateOrder(Request $request, $id){
        $request->validate([
            'status' => 'required|in:pending,approved,cancelled,completed',
            'order_id' => 'required',
        ]);

        $order = Orders::findOrFail($request->order_id);
        $order->status = $request->status;
        $order->save();

        return redirect()->route('manager.orders.index', $order->id)->with('message', 'Order status updated successfully.');
   
    }
}
