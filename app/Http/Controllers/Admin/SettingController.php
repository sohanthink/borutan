<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\GeneralSettings;
use App\Models\Setting;
use App\Http\Requests\SmtpUpdate;
use App\Models\Page;
use Illuminate\Support\Env;
use App\Models\Question;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;
use Brian2694\Toastr\Facades\Toastr;

class SettingController extends Controller
{
    public function index()
    {
        $data['timezones'] = \DateTimeZone::listIdentifiers(\DateTimeZone::ALL);
        return view('admin.pages.settings.general.index')->with($data);
    }
    public function update(Request $request)
    {
        Setting::updateOrCreate(['name' => 'site_title'], ['value' => $request->site_title]);


        // Artisan::call("env:set", ['key' => 'APP_NAME', 'value' => $request->get('site_title')]);


        Setting::updateOrCreate(['name' => 'site_description'], ['value' => $request->site_description]);
        Setting::updateOrCreate(['name' => 'footer_text'], ['value' => $request->footer_text]);
        Setting::updateOrCreate(['name' => 'time_zone'], ['value' => $request->time_zone]);

        // Artisan::call("env:set", ['key' => 'APP_TIMEZONE', 'value' => $request->get('time_zone')]);


        Setting::updateOrCreate(['name' => 'user_register'], ['value' => $request->user_register]);
        Setting::updateOrCreate(['name' => 'tracking_domain'], ['value' => $request->tracking_domain]);
        Setting::updateOrCreate(['name' => 'site_currency'], ['value' => $request->site_currency]);
        Setting::updateOrCreate(['name' => 'refer_commission'], ['value' => $request->refer_commission]);

        return back()->with('success','Allmänna inställningar har uppdaterats');
    }

    public function appearance()
    {
        return view('admin.pages.settings.appearance');
    }
    public function appearanceUpdate(Request $request)
    {
        $this->validate($request, [
            'site_logo' => 'mimes:jpeg,jpg,png,gif,svg|max:10000',
            'site_favicon' => 'mimes:jpeg,jpg,png,gif,svg|max:10000',
            'site_mobile_logo' => 'mimes:jpeg,jpg,png,gif,svg|max:10000',
        ]);
        //Upload Logo
        if ($request->hasFile('site_logo')) {
            $this->deleteOldLogo(setting('site_logo'));
            Setting::updateOrCreate(
                ['name' => 'site_logo'],
                [
                    'value' => Storage::disk('public')->putFile('logos', $request->file('site_logo')),
                ]
            );
        }
        if ($request->hasFile('site_mobile_logo')) {
            $this->deleteOldLogo(setting('site_mobile_logo'));
            Setting::updateOrCreate(
                ['name' => 'site_mobile_logo'],
                [
                    'value' => Storage::disk('public')->putFile('logos', $request->file('site_mobile_logo')),
                ]
            );
        }
        if ($request->hasFile('site_logo_small')) {
            $this->deleteOldLogo(setting('site_logo_small'));
            Setting::updateOrCreate(
                ['name' => 'site_logo_small'],
                [
                    'value' => Storage::disk('public')->putFile('logos', $request->file('site_logo_small')),
                ]
            );
        }
        if ($request->hasFile('site_favicon')) {
            $this->deleteOldLogo(setting('site_favicon'));
            Setting::updateOrCreate(
                ['name' => 'site_favicon'],
                [
                    'value' => Storage::disk('public')->putFile('logos', $request->file('site_favicon')),
                ]
            );
        }
        // Update Theme
        Setting::updateOrCreate(['name' => 'site_theme'], ['value' => $request->site_theme]);


        return back()->with('success', 'Utseendeinställningar har uppdaterats');
    }

    private function deleteOldLogo($path)
    {
        // Storage::disk('public')->delete($path);
    }
    public function smtp()
    {
        return view('admin.pages.settings.smtp');
    }
    public function smtpUpdate(SmtpUpdate $request)
    {
        Setting::updateOrCreate(['name' => 'smtp_driver'], ['value' => $request->smtp_driver]);

        // Artisan::call("env:set", ['key' => 'MAIL_MAILER', 'value' => $request->get('smtp_driver')]);

        Setting::updateOrCreate(['name' => 'smtp_host'], ['value' => $request->smtp_host]);

        // Artisan::call("env:set", ['key' => 'MAIL_HOST', 'value' => $request->get('smtp_host')]);

        Setting::updateOrCreate(['name' => 'smtp_port'], ['value' => $request->smtp_port]);

        // Artisan::call("env:set", ['key' => 'MAIL_PORT', 'value' => $request->get('smtp_port')]);

        Setting::updateOrCreate(['name' => 'smtp_username'], ['value' => $request->smtp_username]);

        // Artisan::call("env:set", ['key' => 'MAIL_USERNAME', 'value' => $request->get('smtp_username')]);


        Setting::updateOrCreate(['name' => 'smtp_password'], ['value' => $request->smtp_username]);

        // Artisan::call("env:set", ['key' => 'MAIL_PASSWORD', 'value' => $request->get('smtp_password')]);

        Setting::updateOrCreate(['name' => 'smtp_encryption'], ['value' => $request->smtp_encryption]);

        // Artisan::call("env:set", ['key' => 'MAIL_ENCRYPTION', 'value' => $request->get('smtp_encryption')]);


        Setting::updateOrCreate(['name' => 'mail_from'], ['value' => $request->mail_from]);

        // Artisan::call("env:set", ['key' => 'MAIL_FROM_ADDRESS', 'value' => $request->get('mail_from')]);


        return back()->with('success', 'SMTP Settings Updated Successfully');
    }

    public function question()
    {
        $questions = Question::orderBy('id', 'desc')->get();
        return view('admin.pages.settings.question', compact('questions'));
    }
    public function questionStore(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255|unique:questions',
            'placeholder' => 'required|string|max:255',
        ]);
        $question = Question::create([
            'name' => $request->name,
            'placeholder' => $request->placeholder,
        ]);
        return back()->with('success', 'Fråga har lagts till');
    }
    public function questionDelete($id)
    {
        $question = Question::findOrFail($id);
        $question->delete();
        return back()->with('warning', 'Frågan har raderats');
    }

    public function page()
    {
        $pages = Page::all();
        return view('admin.pages.settings.page',compact('pages'));
    }

    public function pageEdit($slug)
    {
        $page = Page::where('slug',$slug)->firstOrFail();
        return view('admin.pages.settings.edit',compact('page'));
    }
    public function pageupdate(Request $request,$slug)
    {
        $page = Page::where('slug',$slug)->firstOrFail();
        $page->update([
            'description'=>$request->description
        ]);
        return back()->with('success', 'Uppdateringen lyckades');
    }
}
