<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ServiceModel;
use CodeIgniter\HTTP\ResponseInterface;

class ServicesController extends BaseController
{
    public function index()
    {
        $servM = new ServiceModel;
        $serD = $servM->findAll();


        echo '<pre>';
        print_r($serD);
        exit;


        return view('admin/services/index', ['serD' => $serD]);
    }
}
