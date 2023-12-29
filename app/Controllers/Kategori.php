<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\KategoriModel;

class Kategori extends ResourceController
{
    protected $kat;

    public function __construct()
    {
        $this->kat = new KategoriModel();
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
            'title' => 'Kategori',
            'menu' => 'MasterData',
            'submenu' => 'Kategori',
            'items' => $this->kat->getKategori()
        ];
        return view('v_kategori', $data);
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        $this->kat->save([
            'nama_kategori' => $this->request->getVar('nama_kategori')
        ]);
        session()->setFlashData('pesan', 'Data berhasil ditambahkan!');
        return redirect()->to(base_url('/kategori'));
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        $this->kat->update($id, [
            'nama_kategori' => $this->request->getVar('nama_kategori')
        ]);
        session()->setFlashData('pesan', 'Data berhasil diubah!');
        return redirect()->to(base_url('/kategori'));
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $this->kat->delete($id);
        session()->setFlashData('pesan', 'Data berhasil dihapus!');
        return redirect()->to(base_url('/kategori'));
    }
}
