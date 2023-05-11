<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function getCategory()
    {
        $data = $this->product_list('categories');

        $resources = ProductResource::collection($data);

        return $resources;

    }

    public function getProducts(Request $request)
    {
        $id = $request->id;
        if ($id) {
            $data = $this->product_list($id);
            if ($data) {
                $resources = ProductResource::collection($data);

                return $resources;
            }
        }

        abort(404);
    }

    private function product_list($slug){
        // load from public path
        $file = public_path('dummy/products/'.$slug.'.json');
        $content = file_get_contents($file);
        return collect(json_decode($content));
    }
}
