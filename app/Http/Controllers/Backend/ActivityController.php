<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Activities\StoreActivityRequest;
use App\Http\Requests\Backend\Activities\UpdateActivityRequest;
use App\Models\Activity;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function index()
    {
        return view('backend.activities.index');
    }

    public function create()
    {
        return view('backend.activities.create');
    }

    public function edit(Activity $activity)
    {
        return view('backend.activities.edit', compact('activity'));
    }

    public function show(Activity $activity)
    {
        return view('backend.activities.show', compact('activity'));
    }

    public function store(StoreActivityRequest $request)
    {
        $activity = Activity::create($request->validated());

        return redirect()->route('admin.activity.index')->withFlashSuccess(__('The activity was successfully created.'));
    }

    public function update(UpdateActivityRequest $request, Activity $activity)
    {
        $activity->update($request->validated());

        return redirect()->route('admin.activity.index')->withFlashSuccess(__('The activity was successfully updated.'));
    }
}
