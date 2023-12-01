<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data = [
            'active' => 'dashboard'
        ];
        return view('layout/v_dashboard', $data);
    }
}
