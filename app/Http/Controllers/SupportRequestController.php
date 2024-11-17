<?php

namespace App\Http\Controllers;

use App\Models\Manager;
use App\Models\SupportRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SupportRequestController extends Controller
{
    // Display all support requests for the admin
    public function index()
    {
        $requests = SupportRequest::with('sender')
            ->where('receiver_id', Auth::id())
            ->orWhere('is_reply', false)
            ->get();

        return view('admin.supports', compact('requests'));
    }

    // Show a single request with replies
    public function show($id)
    {
        $request = SupportRequest::with(['sender', 'receiver'])
            ->where('id', $id)
            ->firstOrFail();

        return view('admin.supportdetails', compact('request'));
    }

    // Store a new support request
    public function store(Request $request)
    {
        $validated = $request->validate([
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        if (auth()->guard('auth')->check()) {
            $id =  auth()->guard('auth')->id();
        }
        
        if (auth()->guard('manager')->check()) {
            $id =  auth()->guard('manager')->id();
        }

        SupportRequest::create([
            'sender_id' => $id,
            'subject' => $validated['subject'],
            'message' => $validated['message'],
        ]);

        return redirect()->back()->with('message', 'Support request submitted successfully.');
    }

    // Admin replies to a support request
    public function reply(Request $request, $id)
    {
        $validated = $request->validate([
            'message' => 'required|string',
        ]);

        $supportRequest = SupportRequest::findOrFail($id);

        
        $user = User::findOrFail($supportRequest->sender_id);
      
        $user->notification = $request->message;
        $user->save();

        $supportRequest->update(['status' => 'in-progress']);

        return redirect()->route('support.show', $id)->with('message', 'Reply sent successfully.');
    }

    public function create(){
      
        $id =  auth()->guard('manager')->id();
       
        $user = User::findorfail($id);
        return view('manager.support', compact('user'));
    }

    public function destroy($id){
        $request = SupportRequest::findOrFail($id);
        $request->delete();
        return redirect()->route('support.index')->with('success', 'Support request deleted successfully.');
   
    }
}