<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\BrandsModel;
use App\Models\ModelsModel;
use CodeIgniter\Commands\Generators\ModelGenerator;
use CodeIgniter\HTTP\ResponseInterface;

class BrandsController extends BaseController
{
    public function index()
    {
        $brandModel = new BrandsModel();
        $brands = $brandModel->findAll();

        return view('admin/brands/index', ['brands' => $brands]);
    }

    public function create()
    {

        helper('form');
        $session = session();

        if ($this->request->getMethod() === 'POST') {
            $image = \Config\Services::image();

            if ($this->validate(
                [
                    'logo' => 'uploaded[logo]|is_image[logo]|mime_in[logo,image/jpg,image/jpeg,image/png,image/webp]|max_size[logo, 2048]',
                    'name' => 'required|max_length[124]',
                ],
                [
                    'logo' => [
                        // 'required'=>'Please upload a image',
                        'uploaded' => 'Please upload an Logo image',
                        'is_image' => 'Please upload a valid Image type of Logo Image',
                        'mime_in' => 'Please upload a valid image type of Logo Image',
                        'max_size' => 'Maximum Size exceeded, Please upload with in 2MB of Logo Image'
                    ],

                    'name' => [
                        'required' => 'Please fill Brand Name',
                        'max_length' => 'Brand Name is too long',
                    ],

                ]
            )) {


                $slug = $this->create_slug($this->request->getPost('name'));


                $brandModel = new BrandsModel;
                $checkSlug = $brandModel->checkSlug($slug);



                $logoFile = $this->request->getFile("logo");
                if (trim($logoFile) !== '') {
                    // $file = $this->request->getFile("slider_image");
                    $thumbnail = $logoFile->getName();
                    // Renaming file before upload
                    $temp = explode(".", $thumbnail);

                    $tourFileName = round(microtime(true)) . '.' . end($temp);
                    $tourFileName = "Brand-" . $tourFileName;
                }
                $image->withFile($logoFile)->save('uploads/brands/' . $tourFileName, 70);

                $result = $brandModel->save([
                    'logo' => $tourFileName,
                    'name' => $this->request->getPost('name'),
                    'slug' => $checkSlug,
                ]);


                if ($result) {
                    $session->setFlashdata('msg', ["msg" => 'You have successfully Add a Brand', "type" => "success"]);
                    return redirect()->to(site_url("admin/brands"));
                } else {
                    $session->setFlashdata('invalid_creds',  ["errors" => ['value_err' => $result['msg']], "type" => "warning"]);
                    return redirect()->to(site_url("admin/brands/create"));
                }
            } else {
                $session->setFlashdata('invalid_creds', ["errors" => $this->validator->getErrors(), "type" => "danger"]);
                return redirect()->back()->withInput();
            }
        } else {
            return view('admin/brands/create');
        }
    }



    public function edit($id)
    {

        $image = \Config\Services::image();

        $brandModel = new BrandsModel();
        $brand = $brandModel->where('brand_id', $id)->first();

        if ($this->request->getMethod() === 'GET') {

            if (!$brand) {
                return redirect()->to('admin/brands')->with('error', 'Brand not found');
            } else {
                return view('admin/brands/edit', ['brand' => $brand]);
            }
        } elseif ($this->request->getMethod() === 'POST') {



            if ($this->validate(
                [
                    'logo' => 'is_image[logo]|mime_in[logo,image/jpg,image/jpeg,image/png,image/webp]|max_size[logo, 2048]',
                    'name' => 'required|max_length[124]',
                    'slug' => "required|max_length[124]|is_unique[brands.slug,brand_id,{$id}]",
                ],
                [
                    'logo' => [
                        'uploaded' => 'Please upload an Logo image',
                        'is_image' => 'Please upload a valid Image type of Logo Image',
                        'mime_in' => 'Please upload a valid image type of Logo Image',
                        'max_size' => 'Maximum Size exceeded, Please upload with in 2MB of Logo Image'
                    ],

                    'name' => [
                        'required' => 'Please fill Brand Name',
                        'max_length' => 'Brand Name is too long',
                    ],

                    'slug' => [
                        'required' => 'Please fill Slug',
                        'max_length' => 'Slug is too long',
                        'is_unique' => 'Slug is already exist'
                    ],

                ]
            )) {
                // ⭐ UPDATE DATA
                $updateData = [
                    'name' => $this->request->getPost('name'),
                    'slug' => $this->request->getPost('slug')
                ];



                // echo $brand['logo'];exit;


                $file = $this->request->getFile("logo");
                if ($file && $file->isValid() && !$file->hasMoved()) {
                    // $file = $this->request->getFile("tour_image");
                    $thumbnail = $file->getName();
                    // Renaming file before upload
                    $temp = explode(".", $thumbnail);

                    $newfilename = round(microtime(true)) . '.' . end($temp);
                    $newfilename = "Brand-" . $newfilename;

                    $image->withFile($file)->save('uploads/brands/' . $newfilename, 70);

                    $oldPath = "uploads/brands/" . $brand['logo'];
                    if ($brand['logo'] && file_exists($oldPath)) {
                        unlink($oldPath);
                    }



                    $updateData['logo'] = $newfilename;
                }

                $brandModel->update($id, $updateData);
                return redirect()->to('/admin/brands')->with('success', 'Brand Updated Successfully');
            } else {
                echo 'Not validate';

                echo '<br>';
                print_r($this->validator->getErrors());
                exit;
            }
        } else {
            return redirect()->to('admin/brands')->with('error', 'Something went wrong');
        }
    }




    public function delete($id)
    {
        $brandModel = new BrandsModel();
        $brand = $brandModel->find($id);

        if (!$brand) {
            return redirect()->to('admin/brands')->with('error', 'Brand not found');
        }

        // delete logo
        if (!empty($brand['logo']) && file_exists("uploads/brands/" . $brand['logo'])) {
            unlink("uploads/brands/" . $brand['logo']);
        }

        $brandModel->delete($id);

        return redirect()->to('admin/brands')->with('success', 'Brand Deleted Successfully');
    }





    // Models 
    public function modelIndex()
    {
        $modelM = new ModelsModel();
        $modelData = $modelM->select('models.*, brands.brand_id as brand_id ,brands.name as brand_name')->join('brands', 'brands.brand_id = models.brand_id', 'left')->findAll();

        return view('admin/models/index', ['modelData' => $modelData]);
    }

    public function modelCreate()
    {

        helper('form');
        $session = session();

        if ($this->request->getMethod() === 'POST') {

            $image = \Config\Services::image();

            if ($this->validate(
                [
                    'image' => 'uploaded[image]|is_image[image]|mime_in[image,image/jpg,image/jpeg,image/png,image/webp]|max_size[image, 2048]',
                    'name' => 'required|max_length[124]',
                    'brand' => 'required'
                ],
                [
                    'image' => [
                        // 'required'=>'Please upload a image',
                        'uploaded' => 'Please upload an image',
                        'is_image' => 'Please upload a valid Image type of Image',
                        'mime_in' => 'Please upload a valid image type of Image',
                        'max_size' => 'Maximum Size exceeded, Please upload with in 2MB of Image'
                    ],

                    'name' => [
                        'required' => 'Please fill Model Name',
                        'max_length' => 'Model Name is too long',
                    ],

                    'brand' => [
                        'required' => 'Please select Brand',
                    ]
                ]
            )) {


                $slug = $this->create_slug($this->request->getPost('name'));


                $modelM = new ModelsModel;
                $checkSlug = $modelM->checkSlug($slug);


                // echo $checkSlug;
                // exit;


                $logoFile = $this->request->getFile("image");
                if (trim($logoFile) !== '') {
                    // $file = $this->request->getFile("slider_image");
                    $thumbnail = $logoFile->getName();
                    // Renaming file before upload
                    $temp = explode(".", $thumbnail);

                    $tourFileName = round(microtime(true)) . '.' . end($temp);
                    $tourFileName = "Model-" . $tourFileName;
                }
                $image->withFile($logoFile)->save('uploads/models/' . $tourFileName, 70);

                $result = $modelM->save([
                    'image' => $tourFileName,
                    'name' => $this->request->getPost('name'),
                    'brand_id' => $this->request->getPost('brand'),
                    'slug' => $checkSlug,
                ]);


                if ($result) {
                    $session->setFlashdata('msg', ["msg" => 'You have successfully Add a Model', "type" => "success"]);
                    return redirect()->to(site_url("admin/models"));
                } else {
                    $session->setFlashdata('invalid_creds',  ["errors" => ['value_err' => $result['msg']], "type" => "warning"]);
                    return redirect()->to(site_url("admin/models/create"));
                }
            } else {
                $session->setFlashdata('invalid_creds', ["errors" => $this->validator->getErrors(), "type" => "danger"]);
                return redirect()->back()->withInput();
            }
        } else {
            $brandM = new BrandsModel;
            $brandD = $brandM->select('brand_id,name')->findAll();
            return view('admin/models/create', ['brandD' => $brandD]);
        }
    }



    public function modelEdit($id)
    {
        $image = \Config\Services::image();
        $modelM = new ModelsModel();
        $brandM = new BrandsModel;

        $modelData = $modelM->select('models.*, brands.brand_id as brand_id ,brands.name as brand_name')->where('models.id', $id)->join('brands', 'brands.brand_id = models.brand_id', 'left')->first();


        $brandD = $brandM->findAll();


        // echo '<pre>';
        // print_r($modelData);
        // exit;





        if ($this->request->getMethod() === 'GET') {

            if (!$modelData) {
                return redirect()->to('admin/models')->with('error', 'Brand not found');
            } else {
                return view('admin/models/edit', ['modelData' => $modelData, 'brandD' => $brandD]);
            }
        } elseif ($this->request->getMethod() === 'POST') {
            if ($this->validate(
                [
                    'image' => 'is_image[image]|mime_in[image,image/jpg,image/jpeg,image/png,image/webp]|max_size[image, 2048]',
                    'name' => 'required|max_length[124]',
                    'slug' => "required|max_length[124]|is_unique[brands.slug,brand_id,{$id}]",
                    'brand' => 'required'
                ],
                [
                    'image' => [
                        'uploaded' => 'Please upload an Model image',
                        'is_image' => 'Please upload a valid Image type of Model Image',
                        'mime_in' => 'Please upload a valid image type of Model Image',
                        'max_size' => 'Maximum Size exceeded, Please upload with in 2MB of Model Image'
                    ],

                    'name' => [
                        'required' => 'Please fill Model Name',
                        'max_length' => 'Model Name is too long',
                    ],

                    'slug' => [
                        'required' => 'Please fill Slug',
                        'max_length' => 'Slug is too long',
                        'is_unique' => 'Slug is already exist'
                    ],
                    'brand' => [
                        'required' => 'Please select Brand',
                    ]
                ]
            )) {

                $updateData = [
                    'name' => $this->request->getPost('name'),
                    'slug' => $this->request->getPost('slug'),
                    'brand_id' => $this->request->getPost('brand')
                ];



                // echo $brand['logo'];exit;


                $file = $this->request->getFile("image");
                if ($file && $file->isValid() && !$file->hasMoved()) {
                    // $file = $this->request->getFile("tour_image");
                    $thumbnail = $file->getName();
                    // Renaming file before upload
                    $temp = explode(".", $thumbnail);

                    $newfilename = round(microtime(true)) . '.' . end($temp);
                    $newfilename = "Model-" . $newfilename;

                    $image->withFile($file)->save('uploads/models/' . $newfilename, 70);

                    $oldPath = "uploads/models/" . $modelData['image'];
                    if ($modelData['image'] && file_exists($oldPath)) {
                        unlink($oldPath);
                    }



                    $updateData['image'] = $newfilename;
                }

                $modelM->update($id, $updateData);
                return redirect()->to('/admin/models')->with('success', 'Models Updated Successfully');
            } else {
                echo 'Not validate';

                echo '<br>';
                print_r($this->validator->getErrors());
                exit;
            }
        } else {
            return redirect()->to('admin/models')->with('error', 'Something went wrong');
        }
    }





    public function modelDelete($id)
    {
        $modelM = new ModelsModel();
        $modelData = $modelM->find($id);



        if (!$modelData) {
            return redirect()->to('admin/models')->with('error', 'Models not found');
        }

        // delete logo
        if (!empty($brand['logo']) && file_exists("uploads/models/" . $brand['logo'])) {
            unlink("uploads/models/" . $brand['logo']);
        }

        $modelM->delete($id);

        return redirect()->to('admin/models')->with('success', 'Brand Deleted Successfully');
    }
}
