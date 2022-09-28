<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class DosenFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if (is_null(session()->get('login_dosen'))) {
            return redirect()->to(base_url('/login'));
        }
    }

    //--------------------------------------------------------------------

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}