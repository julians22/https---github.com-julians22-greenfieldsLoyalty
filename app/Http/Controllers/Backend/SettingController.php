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

        foreach ($settings as $key => $value) {
            $valueUpdate = $request->{$value->key};
            if ($valueUpdate) {
                switch ($value->type) {
                    case Setting::TYPE_LONGTEXT:
                        $value->long_text_value = $valueUpdate;
                        $value->save();
                        break;
                    case Setting::TYPE_TEXT:
                        $value->text_value = $valueUpdate;
                        $value->save();
                        break;
                    case Setting::TYPE_IMAGE:
                        $value->image_value = $valueUpdate;
                        $value->save();
                        break;
                    default:
                        break;
                }
            }
        }

        return redirect()->back()->withFlashSuccess('Data successfully updated');
    }

}
