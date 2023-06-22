<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use App\Http\Resources\AreaCollection;
use App\Http\Resources\AreaResource;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    public function getProvince(Request $request)
    {
        $get_provinces = \Indonesia::allProvinces();

        $provinces = AreaResource::collection($get_provinces);

        return response()->json($provinces);
    }

    public function getCity(Request $request)
    {
        $id = $request->id;

        $get_cities = \Indonesia::findProvince($id, ['cities']);

        $cities = AreaResource::collection($get_cities->cities);

        return response()->json($cities);
    }

    public function getDistrict(Request $request)
    {
        $id = $request->id;

        $get_distircts = \Indonesia::findCity($id, ['districts']);

        $distircts = AreaResource::collection($get_distircts->districts);

        return response()->json($distircts);
    }
}
