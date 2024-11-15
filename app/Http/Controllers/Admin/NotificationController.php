<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index()
    {
        $notification = Notification::latest()->first();
        return view('admin.notification', compact('notification'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        $notification = Notification::latest()->first();
        if (!$notification) {
            $notification = new Notification();
        }

        $notification->title = $request->input('title');
        $notification->message = $request->input('message');
        $notification->status = $request->has('status') ? true : false;
        $notification->updated_at = now();
        $notification->save();

        return redirect()->back()->with('message', 'Notification updated successfully.');
    }
}
