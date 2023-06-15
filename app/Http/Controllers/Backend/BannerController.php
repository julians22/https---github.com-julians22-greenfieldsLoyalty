<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function index() {
        return view('backend.banners.index');
    }

    public function create()
    {
        return view('backend.banners.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'desktopBanner' => 'required',
            'mobileBanner' => 'required',
        ]);

        $data = [
            'image' => $request->only('desktopBanner','mobileBanner'),
            'publish' => 1
        ];

        Banner::create($data);

        return redirect()->route('admin.banner.index')->withFlashSuccess(__('The banner was successfully created.'));
    }

    public function edit(Banner $banner) {
        return view('backend.banners.edit', compact('banner'));
    }

    public function update(Request $request, Banner $banner) {
        $request->validate([
            'desktopBanner' => 'required',
            'mobileBanner' => 'required',
        ]);

        $data = [
            'image' => $request->only('desktopBanner','mobileBanner'),
            'publish' => 1
        ];

        $banner->update($data);

        return redirect()->route('admin.banner.index')->withFlashSuccess(__('The banner was successfully update.'));
    }

    public function show(Banner $banner) {
        return view('backend.banners.show', compact('banner'));
    }

    public function destory(Banner $banner) {
        $banner->delete();
        return redirect()->route('admin.banner.index')->withFlashSuccess(__('The banner was successfully deleted.'));
    }
}
