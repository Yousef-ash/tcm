<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SettingRequest;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index()
    {
        return view('admin.settings.edit')->with('setting', Setting::find(1));
    }




    public function update(Request $request, Setting $setting)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'bio' => 'required',
            'about' => 'required',
            'social' => 'required|url',
            'logo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'aname' => 'required|string',
            'abio' => 'required',
            'moh' => 'required',
            'aphoto' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->only(['name', 'address','social' ,'bio', 'abio', 'about', 'moh', 'aname']);

        // Handle the logo upload if it exists
        if ($request->hasFile('logo') && $request->file('logo')->isValid()) {
            $path = $request->file('logo')->store('logos', 'public');
            $data['logo'] = $path;
        }
        if ($request->hasFile('aphoto') && $request->file('aphoto')->isValid()) {
            $path = $request->file('aphoto')->store('logos', 'public');
            $data['aphoto'] = $path;
        }

        $setting->update($data);

        return redirect()->route('setting');
    }



}
