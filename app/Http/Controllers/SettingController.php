<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;


class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::first(); // Assuming you have a settings table
        return view('settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'company_name' => 'nullable|string|max:255',
            'contact_email' => 'nullable|email|max:255',
        ]);

        $settings = Setting::first() ?? new Setting();
        $settings->company_name = $request->company_name;
        $settings->contact_email = $request->contact_email;
        $settings->save();

        return redirect()->route('settings.index')->with('success', 'Settings updated successfully.');
    }

}
