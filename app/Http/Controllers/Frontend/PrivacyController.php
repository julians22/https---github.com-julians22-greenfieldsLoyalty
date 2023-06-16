<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

/**
 * Class PrivacyController
 */
class PrivacyController
{
     /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $privacy = Setting::where('key', 'privacy-policy')->first();
        return view('frontend.pages.privacy', compact('privacy'));
    }
}
