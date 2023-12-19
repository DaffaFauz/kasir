<?php

namespace App\Controllers;

use App\Models\AdminModel;

class Admin extends BaseController
{
    protected $admin;

    public function __construct()
    {
        $this->admin = new AdminModel();
    }
    public function index()
    {
        $data = [
            'active' => 'dashboard'
        ];
        return view('layout/v_dashboard', $data);
    }

    public function setting(){
        $data = [
            'active' => 'setting',
            'items' => $this->admin->getSetting()
        ];
        return view('v_setting', $data);
    }

    public function settingUpdate($id){
        $this->admin->update($id, [
            'nama_toko' => $this->request->getVar('nama_toko'),
            'slogan' => $this->request->getVar('slogan'),
            'alamat' => $this->request->getVar('alamat'),
            'no_telpon' => $this->request->getVar('no_telpon'),
            'deskripsi' => $this->request->getVar('deskripsi'),
        ]);
        session()->setFlashdata('pesan','Data berhasil diubah');
        return redirect()->to(base_url('/setting'));
    }
}
