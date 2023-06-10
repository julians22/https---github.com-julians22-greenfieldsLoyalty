<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Faqs\StoreFaqRequest;
use App\Http\Requests\Backend\Faqs\UpdateFaqRequest;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        return view('backend.faqs.index');
    }

    public function create()
    {
        return view('backend.faqs.create');
    }

    public function edit(Faq $faq)
    {
        return view('backend.faqs.edit', compact('faq'));
    }

    public function show(Faq $faq)
    {
        return view('backend.faqs.show', compact('faq'));
    }


    public function store(StoreFaqRequest $request)
    {
        $faq = Faq::create($request->only('title', 'question', 'answer'));

        return redirect()->route('admin.faq.index')->withFlashSuccess(__('The faq was successfully created.'));
    }

    public function update(UpdateFaqRequest $request, Faq $faq)
    {
        $faq->update($request->only('title', 'question', 'answer'));

        return redirect()->route('admin.faq.index')->withFlashSuccess(__('The faq was successfully updated.'));
    }

    public function destroy(Faq $faq)
    {
        $faq->delete();

        return redirect()->route('admin.faq.index')->withFlashSuccess(__('The faq was successfully deleted.'));
    }
}
