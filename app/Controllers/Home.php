<?php

namespace App\Controllers;

use App\Models\UserModel;

class Home extends BaseController
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
        return view('v_login', $data);
    }

    public function login(){
        $validation = \Config\Services::validation();
        $validation->setRules([
            'email' => [
                'label' => 'Email',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi!'
                ]
                ],
                'password' => [
                    'label' => 'Password',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} harus diisi!'
                    ]
                    ],
        ]);
        $data = $this->request->getVar();
        if(!$validation->run($data)){
            session()->setFlashdata('error', 'Data gagal ditambahkan! Silahkan periksa kembali');
            return redirect()->to(base_url('/'))->withInput()->with('validation', $validation->getErrors());
        }
        $email = $this->request->getVar('email');
        $password = sha1($this->request->getVar('password'));
        $cek = $this->user->cekLogin($email, $password);
        if($cek){
            session()->set('nama', $cek['nama_user']);
            session()->set('level', $cek['level']);
            session()->set('id', $cek['id_user']);

            if($cek['level'] == 1){
                return redirect()->to(base_url('/admin'));
            }else{
                return redirect()->to(base_url('/penjualan'));
            }
        }else{
            session()->setFlashdata('gagal', 'Username atau Password salah!');
            return redirect()->to(base_url('/'));
        }

    }

    public function logout(){
        session()->remove(['nama','level','id']);
        session()->setFlashdata('pesan', 'Anda berhasil logout');
        return redirect()->to(base_url('/'));
    }
}
