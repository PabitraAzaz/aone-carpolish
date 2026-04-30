<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AdminAuthFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session();

        // যদি admin_auth সেশন না থাকে, তবে রিডাইরেক্ট
        if (!$session->get('admin_auth')) {
            return redirect()->to(base_url('admin'));
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // এখানে কিছু করার দরকার নেই
    }
}
