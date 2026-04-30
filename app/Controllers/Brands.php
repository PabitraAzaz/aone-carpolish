<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BrandsModel;
use App\Models\ModelsModel;
use CodeIgniter\HTTP\ResponseInterface;

class Brands extends BaseController
{
    public function index($brand_slug)
    {
        $brandM = new BrandsModel;
        $modelM = new ModelsModel();

        // Get brand using slug
        $brand = $brandM->where('slug', $brand_slug)->first();

        if (!$brand) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        // Get models of that brand using brand_id
        $modelData = $modelM->where('brand_id', $brand['brand_id'])->findAll();

        return view('web/brand_wise_service', [
            'brand'      => $brand,
            'modelData'  => $modelData
        ]);
    }


    public function book_online($brand_slug, $model_slug)
    {
        $brandM = new BrandsModel;
        $modelM = new ModelsModel;

        $brand = $brandM->where('slug', $brand_slug)->first();
        $model = $modelM
            ->where('slug', $model_slug)
            ->where('brand_id', $brand['brand_id'])
            ->first();

        return view('web/book_online', [
            'brand' => $brand,
            'model' => $model
        ]);
    }
}
