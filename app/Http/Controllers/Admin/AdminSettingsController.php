<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class AdminSettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $settings = Setting::first(); // Assuming there's only one settings row
        return view('admin.settings', compact('settings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */

    /**
     * Update the specified resource in storage.
     */


    public function update(Request $request)
    {
        $request->validate([
            'smtp_user' => 'required|string',
            'smtp_host' => 'required|string',
            'smtp_password' => 'required|string',
            'currency' => 'required|string',
            'site_name' => 'required|string',
            'site_short_name' => 'required|string',
            'site_email' => 'required|email',
            'phone' => 'required|string',
            'website' => 'required|url',
            'address' => 'required|string',
            'charges' => 'required|numeric',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'favicon' => 'nullable|image|mimes:jpeg,png,jpg,ico|max:1024',
            'welcome_message' => 'required|string',
        ]);

        $settings = Setting::first();
        $settings->update($request->all());

        // Handle Logo Upload
        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->storeAs('home/assets/img', 'logo.png', 'public');
            $settings->logo = '/' . $logoPath; // Updated path
        }

        // Handle Favicon Upload
        if ($request->hasFile('favicon')) {
            $faviconPath = $request->file('favicon')->storeAs('home/assets/img', 'favicon.png', 'public');
            $settings->favicon = '/' . $faviconPath; // Updated path
        }

        Artisan::call('cache:clear');

        return redirect()->route('admin.settings.index')->with('message', 'Settings updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
