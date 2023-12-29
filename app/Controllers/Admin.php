<?php

namespace App\Controllers;

use App\Models\AdminModel;
use App\Models\LaporanModel;

class Admin extends BaseController
{
    protected $admin;
    protected $laporan;

    public function __construct()
    {
        $this->admin = new AdminModel();
        $this->laporan = new LaporanModel();
    }
    public function index()
    {
        $data = [
            'title' => 'Dashboard',
            'menu' => 'Dashboard',
            'submenu' => 'Dashboard',
            'gb' => $this->laporan->grafikBulanan(),
            'gt' => $this->laporan->grafikTahunan(),
            'ph' => $this->laporan->pendapatanHarian(),
            'pb' => $this->laporan->pendapatanBulanan(),
            'pt' => $this->laporan->pendapatanTahunan(),
        ];
        return view('layout/v_dashboard', $data);
    }

    public function setting()
    {
        $data = [
            'title' => 'Setting',
            'menu' => 'Setting',
            'submenu' => 'Setting',
            'items' => $this->admin->getSetting()
        ];
        return view('v_setting', $data);
    }

    public function settingUpdate($id)
    {
        $this->admin->update($id, [
            'nama_toko' => $this->request->getVar('nama_toko'),
            'slogan' => $this->request->getVar('slogan'),
            'alamat' => $this->request->getVar('alamat'),
            'no_telpon' => $this->request->getVar('no_telpon'),
            'deskripsi' => $this->request->getVar('deskripsi'),
        ]);
        session()->setFlashdata('pesan', 'Data berhasil diubah');
        return redirect()->to(base_url('/setting'));
    }
}
