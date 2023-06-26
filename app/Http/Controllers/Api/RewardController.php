<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Http\Resources\RewardCollection;
use App\Models\Reward;
use Illuminate\Http\Request;

class RewardController extends Controller
{

    public function index() {
        $rewards = Reward::active()->get();

        return response()->json([
            'status' => true,
            'rewards' => ProductResource::collection($rewards)
        ]);
    }
}
