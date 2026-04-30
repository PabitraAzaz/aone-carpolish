<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ModelsModel;
use App\Models\SliderModel;
use CodeIgniter\Commands\Generators\ModelGenerator;
use CodeIgniter\HTTP\ResponseInterface;

class SliderController extends BaseController
{
    public function index()
    {
        $sliderModel = new SliderModel();
        $sliders = $sliderModel->findAll();

        return view('admin/sliders/index', ['slider' => $sliders]);
    }

    public function create()
    {

        helper('form');
        $session = session();

        if ($this->request->getMethod() === 'POST') {
            $image = \Config\Services::image();

            if ($this->validate(
                [
                    'banner_image' => 'uploaded[banner_image]|is_image[banner_image]|mime_in[banner_image,image/jpg,image/jpeg,image/png,image/webp]|max_size[banner_image, 2048]',
                    'title' => 'required|max_length[124]',
                ],
                [
                    'banner_image' => [
                        // 'required'=>'Please upload a image',
                        'uploaded' => 'Please upload an Logo image',
                        'is_image' => 'Please upload a valid Image type of Logo Image',
                        'mime_in' => 'Please upload a valid image type of Logo Image',
                        'max_size' => 'Maximum Size exceeded, Please upload with in 2MB of Logo Image'
                    ],

                    'title' => [
                        'required' => 'Please fill Title',
                        'max_length' => 'Title is too long',
                    ],

                ]
            )) {

                $sliderModel = new SliderModel;

                $logoFile = $this->request->getFile("banner_image");
                if (trim($logoFile) !== '') {
                    // $file = $this->request->getFile("slider_image");
                    $thumbnail = $logoFile->getName();
                    // Renaming file before upload
                    $temp = explode(".", $thumbnail);

                    $tourFileName = round(microtime(true)) . '.' . end($temp);
                    $tourFileName = "Sliders-" . $tourFileName;
                }
                $image->withFile($logoFile)->save('uploads/sliders/' . $tourFileName, 70);

                $result = $sliderModel->save([
                    'banner_image' => $tourFileName,
                    'title' => $this->request->getPost('title')
                ]);


                if ($result) {
                    $session->setFlashdata('msg', ["msg" => 'You have successfully Add a Brand', "type" => "success"]);
                    return redirect()->to(site_url("admin/sliders"));
                } else {
                    $session->setFlashdata('invalid_creds',  ["errors" => ['value_err' => $result['msg']], "type" => "warning"]);
                    return redirect()->to(site_url("admin/sliders/create"));
                }
            } else {
                $session->setFlashdata('invalid_creds', ["errors" => $this->validator->getErrors(), "type" => "danger"]);
                return redirect()->back()->withInput();
            }
        } else {
            return view('admin/sliders/create');
        }
    }



    public function edit($id)
    {

        $image = \Config\Services::image();

        $sliderModel = new SliderModel();
        $slider = $sliderModel->where('id', $id)->first();

        if ($this->request->getMethod() === 'GET') {

            if (!$slider) {
                return redirect()->to('admin/sliders')->with('error', 'Slider not found');
            } else {
                return view('admin/sliders/edit', ['slider' => $slider]);
            }
        } elseif ($this->request->getMethod() === 'POST') {



            if ($this->validate(
                [
                    'banner_image' => 'is_image[banner_image]|mime_in[banner_image,image/jpg,image/jpeg,image/png,image/webp]|max_size[banner_image, 2048]',
                    'title' => 'required|max_length[124]',
                ],
                [
                    'banner_image' => [
                        'uploaded' => 'Please upload an Slider image',
                        'is_image' => 'Please upload a valid Image type of Slider Image',
                        'mime_in' => 'Please upload a valid image type of Slider Image',
                        'max_size' => 'Maximum Size exceeded, Please upload with in 2MB of Slider Image'
                    ],

                    'title' => [
                        'required' => 'Please fill Title',
                        'max_length' => 'Title  is too long',
                    ],

                ]
            )) {
                // ⭐ UPDATE DATA
                $updateData = [
                    'title' => $this->request->getPost('title'),
                ];



                // echo $slider['banner_image'];exit;


                $file = $this->request->getFile("banner_image");
                if ($file && $file->isValid() && !$file->hasMoved()) {
                    // $file = $this->request->getFile("tour_image");
                    $thumbnail = $file->getName();
                    // Renaming file before upload
                    $temp = explode(".", $thumbnail);

                    $newfilename = round(microtime(true)) . '.' . end($temp);
                    $newfilename = "Sliders-" . $newfilename;

                    $image->withFile($file)->save('uploads/sliders/' . $newfilename, 70);

                    $oldPath = "uploads/sliders/" . $slider['banner_image'];
                    if ($slider['banner_image'] && file_exists($oldPath)) {
                        unlink($oldPath);
                    }



                    $updateData['banner_image'] = $newfilename;
                }

                $sliderModel->update($id, $updateData);
                return redirect()->to('/admin/sliders')->with('success', 'Slider Updated Successfully');
            } else {
                echo 'Not validate';

                echo '<br>';
                print_r($this->validator->getErrors());
                exit;
            }
        } 
    }




    public function delete($id)
    {
        $sliderModel = new SliderModel();
        $slider = $sliderModel->find($id);

        if (!$slider) {
            return redirect()->to('admin/sliders')->with('error', 'Title not found');
        }

        // delete banner_image
        if (!empty($slider['banner_image']) && file_exists("uploads/sliders/" . $slider['banner_image'])) {
            unlink("uploads/sliders/" . $slider['banner_image']);
        }

        $sliderModel->delete($id);

        return redirect()->to('admin/sliders')->with('success', 'Title Deleted Successfully');
    }





   
}
