<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index() {
        $settings = Setting::where('key', 'terms-and-condition')
            ->orWhere('key', 'privacy-policy')
            ->get();
        return view('backend.settings.index', compact('settings'));
    }

    public function update(Request $request) {
        $settings = Setting::all();

        foreach ($settings as $key => $setting) {
            $valueUpdate = $request->{$setting->key};
            if ($valueUpdate) {
                switch ($setting->type) {
                    case Setting::TYPE_LONGTEXT:
                        $setting->long_text_value = $valueUpdate;
                        $setting->save();
                        break;
                    case Setting::TYPE_TEXT:
                        $setting->text_value = $valueUpdate;
                        $setting->save();
                        break;
                    case Setting::TYPE_IMAGE:
                        $setting->image_value = $valueUpdate;
                        $setting->save();
                        break;
                    default:
                        break;
                }
            }
        }

        return redirect()->back()->withFlashSuccess('Data successfully updated');
    }

}
