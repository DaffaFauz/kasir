<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\SatuanModel;

class Satuan extends ResourceController
{
    protected $sat;

    public function __construct()
    {
        $this->sat = new SatuanModel();
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
            'title' => 'Satuan',
            'menu' => 'MasterData',
            'submenu' => 'Satuan',
            'items' => $this->sat->getSatuan()
        ];
        return view('v_satuan', $data);
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        $this->sat->save([
            'nama_satuan' => $this->request->getVar('nama_satuan')
        ]);
        session()->setFlashData('pesan', 'Data berhasil ditambahkan!');
        return redirect()->to(base_url('/satuan'));
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        $this->sat->update($id, [
            'nama_satuan' => $this->request->getVar('nama_satuan')
        ]);
        session()->setFlashData('pesan', 'Data berhasil diubah!');
        return redirect()->to(base_url('/satuan'));
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $this->sat->delete($id);
        session()->setFlashData('pesan', 'Data berhasil dihapus!');
        return redirect()->to(base_url('/satuan'));
    }
}
