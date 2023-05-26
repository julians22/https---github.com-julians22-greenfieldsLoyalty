<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Rewards\CreateRewardRequest;
use App\Http\Requests\Backend\Rewards\UpdateRewardRequest;
use App\Models\Reward;
use Illuminate\Http\Request;

class RewardController extends Controller
{
    public function index()
    {
        return view('backend.rewards.index');
    }

    public function create()
    {
        return view('backend.rewards.create');
    }

    public function store(CreateRewardRequest $request)
    {
        $data = [
            'name' => $request->name,
            'description' => $request->description,
            'point' => $request->point,
            'image' => $request->image,
            'status' => $request->has('status') ? 1 : 0
        ];

        $reward = Reward::create($data);

        return redirect()->route('admin.reward.index')->withFlashSuccess('Reward data successfully created');
    }

    public function edit(Request $request, Reward $reward)
    {
        return view('backend.rewards.edit')
            ->withReward($reward);
    }

    public function update(UpdateRewardRequest $request, Reward $reward)
    {

        $data = [
            'name' => $request->name,
            'description' => $request->description,
            'point' => $request->point,
            'image' => $request->image,
            'status' => $request->has('status') ? 1 : 0
        ];

        $reward->update($data);

        return redirect()->route('admin.reward.index')->withFlashSuccess('Reward data successfully updated');
    }

    public function destroy(Request $request, Reward $reward)
    {
        $reward->delete();

        return redirect()->route('admin.reward.index')->withFlashSuccess('Reward data successfully deleted');
    }

    public function show(Request $request, Reward $reward)
    {
        return view('backend.rewards.show')
            ->withReward($reward);
    }
}
