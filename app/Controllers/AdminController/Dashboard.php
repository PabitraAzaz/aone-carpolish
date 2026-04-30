<?php

namespace App\Controllers\AdminController;

use App\Controllers\BaseController;
use App\Models\BookingModel;
use App\Models\Gallery;
use App\Models\Testimonial;

class Dashboard extends BaseController
{
    public function index()
    {
        return view('admin/dashboard');
    }


    public function get_form_data()
    {
        $dataM = new BookingModel;
        $data = $dataM->orderBy('id', 'DESC')->findAll();
        return view('admin/form_data', ['data' => $data]);
    }


    public function delete_form_data($id)
    {
        $model = new BookingModel();
        // ডাটা আছে কিনা আগে চেক করি
        $message = $model->find($id);

        if ($message) {
            $model->delete($id);
            return redirect()->back()->with('success', '✅ রেকর্ড সফলভাবে মুছে ফেলা হয়েছে!');
        } else {
            return redirect()->back()->with('error', '⚠️ রেকর্ড পাওয়া যায়নি!');
        }
    }



    // testimonial
    public function get_testimonial_data()
    {
        $testM = new Testimonial;
        $getTest = $testM->findAll();

        return view('admin/testimonial/index', ['test' => $getTest]);
    }

    public function create_testimonial()
    {
        if ($this->request->getMethod() === 'GET') {
            return view('admin/testimonial/create');
        } else {
            $validation = \Config\Services::validation();

            $rules = [
                'name'       => 'required',
                'profession' => 'required',
                'address'    => 'required',
                'message'    => 'required',
                'image'      => 'uploaded[image]|is_image[image]|max_size[image,2048]',
            ];

            if (!$this->validate($rules)) {
                return redirect()->back()->withInput()->with('error', $this->validator->listErrors());
            }

            // ✅ Image Upload
            $imageFile = $this->request->getFile('image');
            $newName   = $imageFile->getRandomName();
            $imageFile->move(FCPATH . 'uploads/testimonials', $newName);

            // ✅ Save to DB
            $testimonialM = new Testimonial();
            $testimonialM->save([
                'name'       => $this->request->getPost('name'),
                'profession' => $this->request->getPost('profession'),
                'address'    => $this->request->getPost('address'),
                'message'    => $this->request->getPost('message'),
                'image'      => $newName,
            ]);

            return redirect()->to(base_url('admin/testimonial'))->with('success', '✅ টেস্টিমোনিয়াল সফলভাবে যোগ হয়েছে!');
        }
    }


    public function delete_testimonial_data($id)
    {
        $model = new Testimonial();
        $testimonial = $model->find($id);

        if ($testimonial) {
            // যদি ইমেজ থাকে, ফাইলও মুছে ফেলব
            if (!empty($testimonial['photo']) && file_exists(FCPATH . 'uploads/testimonials/' . $testimonial['photo'])) {
                unlink(FCPATH . 'uploads/testimonials/' . $testimonial['photo']);
            }

            $model->delete($id);
            return redirect()->back()->with('success', '✅ টেস্টিমোনিয়াল সফলভাবে মুছে ফেলা হয়েছে!');
        }

        return redirect()->back()->with('error', '⚠️ টেস্টিমোনিয়াল পাওয়া যায়নি!');
    }


    // Gallery
    public function get_gallery_data()
    {
        $galM = new Gallery;
        $getTest = $galM->findAll();

        return view('admin/gallery/index', ['gal' => $getTest]);
    }


    public function create_gallery()
    {
        if ($this->request->getMethod() === 'GET') {
            return view('admin/gallery/create');
        } else {
            $validation = \Config\Services::validation();

            $rules = [
                'image'      => 'uploaded[image]|is_image[image]|max_size[image,2048]',
            ];

            if (!$this->validate($rules)) {
                return redirect()->back()->withInput()->with('error', $this->validator->listErrors());
            }

            // ✅ Image Upload
            $imageFile = $this->request->getFile('image');
            $newName   = $imageFile->getRandomName();
            $imageFile->move(FCPATH . 'uploads/gallery', $newName);

            // ✅ Save to DB
            $testimonialM = new Gallery();
            $testimonialM->save([
                'image'      => $newName,
            ]);

            return redirect()->to(base_url('admin/gallery'))->with('success', '✅ টেস্টিমোনিয়াল সফলভাবে যোগ হয়েছে!');
        }
    }


    public function delete_gallery_data($id)
    {
        $model = new Gallery();
        $testimonial = $model->find($id);

        if ($testimonial) {
            // যদি ইমেজ থাকে, ফাইলও মুছে ফেলব
            if (!empty($testimonial['image']) && file_exists(FCPATH . 'uploads/gallery/' . $testimonial['image'])) {
                unlink(FCPATH . 'uploads/gallery/' . $testimonial['image']);
            }

            $model->delete($id);
            return redirect()->back()->with('success', '✅ ছবি সফলভাবে মুছে ফেলা হয়েছে!');
        }

        return redirect()->back()->with('error', '⚠️ ছবি পাওয়া যায়নি!');
    }
}
