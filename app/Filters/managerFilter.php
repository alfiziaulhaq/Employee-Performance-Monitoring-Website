<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class managerFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
       if(session('roles')!=2){
            return redirect()->to(site_url('forbidden'));
        }
        
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}