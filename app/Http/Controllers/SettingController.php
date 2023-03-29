<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        return view('admin.setting.edit');
    }
    public function update(Request $request)
    {
        $data = Setting::find(1);
        if ($data) {
            $setting = Setting::find(1);
            $setting->sitename = $request->name;
            $setting->twitter = $request->twitter;
            $setting->facebook = $request->facebook;
            $setting->instagram = $request->instagram;
            $setting->email = $request->email;
            $setting->address = $request->address;
            $setting->phone = $request->phone;
            $setting->copyright = $request->copyright;
            $setting->reddit = $request->reddit;
            $setting->about = $request->about;

            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $filname = time() . '.' . $file->getClientOriginalExtension();
                $file->move('public/storage/site', $filname);
                $setting->image = $filname;
            }
            $setting->update();
            session()->flash('success', 'added successful');
            return redirect()->back();
        } else {
            $setting = new Setting();
            $setting->sitename = $request->name;
            $setting->twitter = $request->twitter;
            $setting->facebook = $request->facebook;
            $setting->instagram = $request->instagram;
            $setting->email = $request->email;
            $setting->address = $request->address;
            $setting->phone = $request->phone;
            $setting->copyright = $request->copyright;
            $setting->reddit = $request->reddit;
            $setting->about = $request->about;

            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $filname = time() . '.' . $file->getClientOriginalExtension();
                $file->move('public/storage/site', $filname);
                $setting->image = $filname;
            }
            $setting->save();
            session()->flash('success', 'added successful');
            return redirect()->back();
        }
    }
}
