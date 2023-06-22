<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Setting;

/**
 * Class TermsController.
 */
class TermsController
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $term = Setting::where('key', 'terms-and-condition')->first();
        return view('frontend.pages.terms', compact('term'));
    }
}
