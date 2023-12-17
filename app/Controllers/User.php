<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\UserModel;

class User extends ResourceController
{
    protected $user;

    public function __construct()
    {
        $this->user = new UserModel();
    }
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        //
        $data = [
            'active' => 'useregori',
            'items' => $this->user->getUser()
        ];
        return view('v_user', $data);
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        $this->user->save([
            'nama_user' => $this->request->getVar('nama_user'),
            'email' => $this->request->getVar('email'),
            'password' => sha1($this->request->getVar('password')),
            'level' => $this->request->getVar('level')
        ]);
        session()->setFlashData('pesan', 'Data berhasil ditambahkan!');
        return redirect()->to(base_url('/user'));
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        $this->user->update($id, [
            'nama_user' => $this->request->getVar('nama_user'),
            'email' => $this->request->getVar('email'),
            'level' => $this->request->getVar('level')
        ]);
        session()->setFlashData('pesan', 'Data berhasil diubah!');
        return redirect()->to(base_url('/user'));
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $this->user->delete($id);
        session()->setFlashData('pesan', 'Data berhasil dihapus!');
        return redirect()->to(base_url('/user'));
    }
}
