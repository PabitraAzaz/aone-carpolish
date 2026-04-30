<?php

namespace App\Controllers\AdminController;

use App\Controllers\BaseController;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;

class LoginController extends BaseController
{
    public function index()
    {
        // ✅ যদি GET request হয় → login form দেখাও
        if ($this->request->getMethod() === 'get') {
            return view('admin/login');
        }

        // ✅ যদি POST request হয় → validation check
        $validation = \Config\Services::validation();


        $rules = [
            'user_name' => [
                'rules' => 'required|min_length[3]|max_length[50]',
                'errors' => [
                    'required' => 'ইউজার নেম দিতে হবে।',
                    'min_length' => 'ইউজার নেম অন্তত ৩ অক্ষরের হতে হবে।',
                ]
            ],
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'পাসওয়ার্ড দিতে হবে।',
                ]
            ]
        ];

        if (!$this->validate($rules)) {
            // যদি validation fail করে → আবার ফর্মে error দেখাও
            return view('admin/login', [
                'validation' => $this->validator
            ]);
        }

        // ✅ Input নাও
        $user_name = $this->request->getPost('user_name');
        $password  = md5($this->request->getPost('password')); // hashing with md5 (better use bcrypt)







        // ✅ Model দিয়ে database চেক করো
        $userM = new UserModel();
        $result = $userM->where([
            'user_name' => $user_name,
            'password'  => $password
        ])->first();




        if ($result) {
            // ✅ Session তৈরি করো
            $session = session();
            $session->set([
                'user_id'     => $result['id'],
                'user_name'   => $result['user_name'],
                'admin_auth'  => true,   // 👈 এই ফ্ল্যাগ সেট করো
            ]);

            return redirect()->to(base_url('admin/dashboard'))->with('success', 'Login Successful!');
        } else {
            return redirect()->back()->with('error', 'ভুল ইউজার নেম বা পাসওয়ার্ড!');
        }
    }


    public function logout()
    {
        $session = session();

        // সেশন ক্লিয়ার করো
        $session->remove(['user_id', 'user_name', 'admin_auth']);
        $session->destroy();

        // ফ্ল্যাশ মেসেজ সহ লগইন পেজে পাঠাও
        return redirect()->to(base_url('admin'))
            ->with('success', 'আপনি সফলভাবে লগআউট হয়েছেন।');
    }
}
