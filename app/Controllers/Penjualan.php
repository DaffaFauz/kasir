<?php

namespace App\Controllers;

use App\Models\UserModel;

class Penjualan extends BaseController
{
    protected $user;

    public function __construct()
    {
        $this->user = new UserModel();
    }
    public function index()
    {
        $data = [
            'active' => 'dashboard'
        ];
        return view('v_penjualan', $data);
    }

}
