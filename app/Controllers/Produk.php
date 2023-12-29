<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\ProdukModel;
use App\Models\KategoriModel;
use App\Models\SatuanModel;

class Produk extends ResourceController
{
    protected $produk;
    protected $kat;
    protected $sat;

    public function __construct()
    {
        $this->produk = new ProdukModel();
        $this->kat = new KategoriModel();
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
            'title' => 'Produk',
            'menu' => 'MasterData',
            'submenu' => 'Produk',
            'items' => $this->produk->getProduk(),
            'kategori' => $this->kat->getKategori(),
            'satuan' => $this->sat->getSatuan(),
        ];
        return view('v_produk', $data);
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'kode_produk' => [
                'label' => 'Kode produk',
                'rules' => 'is_unique[produk.kode_produk]|required',
                'errors' => [
                    'is_unique' => '{field} sudah ada!',
                    'required' => '{field} harus diisi!'
                ]
            ],
            'nama_produk' => [
                'label' => 'Nama produk',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi!'
                ]
            ],
            'id_kategori' => [
                'label' => 'Kategori',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi!'
                ]
            ],
            'id_satuan' => [
                'label' => 'Satuan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi!'
                ]
            ],
            'harga_beli' => [
                'label' => 'Harga beli',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi!'
                ]
            ],
            'harga_jual' => [
                'label' => 'Harga jual',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi!'
                ]
            ],
            'stok' => [
                'label' => 'Stok barang',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi!'
                ]
            ],
        ]);
        $data = $this->request->getVar();
        if (!$validation->run($data)) {
            session()->setFlashdata('error', 'Data gagal ditambahkan! Silahkan periksa kembali');
            return redirect()->to(base_url('/produk'))->withInput()->with('validation', $validation->getErrors());
        }
        $hb = str_replace(',', '', $this->request->getVar('harga_beli'));
        $hj = str_replace(',', '', $this->request->getVar('harga_jual'));
        $this->produk->save([
            'kode_produk' => $this->request->getVar('kode_produk'),
            'nama_produk' => $this->request->getVar('nama_produk'),
            'id_kategori' => $this->request->getVar('id_kategori'),
            'id_satuan' => $this->request->getVar('id_satuan'),
            'harga_beli' => $hb,
            'harga_jual' => $hj,
            'stok' => $this->request->getVar('stok')
        ]);
        session()->setFlashData('pesan', 'Data berhasil ditambahkan!');
        return redirect()->to(base_url('/produk'));
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'kode_produk' => [
                'label' => 'Kode produk',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi!'
                ]
            ],
            'nama_produk' => [
                'label' => 'Nama produk',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi!'
                ]
            ],
            'id_kategori' => [
                'label' => 'Kategori',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi!'
                ]
            ],
            'id_satuan' => [
                'label' => 'Satuan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi!'
                ]
            ],
            'harga_beli' => [
                'label' => 'Harga beli',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi!'
                ]
            ],
            'harga_jual' => [
                'label' => 'Harga jual',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi!'
                ]
            ],
            'stok' => [
                'label' => 'Stok barang',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi!'
                ]
            ],
        ]);
        $data = $this->request->getVar();
        if (!$validation->run($data)) {
            session()->setFlashdata('error', 'Data gagal ditambahkan! Silahkan periksa kembali');
            return redirect()->to(base_url('/produk'))->withInput()->with('validation', $validation->getErrors());
        }
        $hb = str_replace(',', '', $this->request->getVar('harga_beli'));
        $hj = str_replace(',', '', $this->request->getVar('harga_jual'));
        $this->produk->update($id, [
            'kode_produk' => $this->request->getVar('kode_produk'),
            'nama_produk' => $this->request->getVar('nama_produk'),
            'id_kategori' => $this->request->getVar('id_kategori'),
            'id_satuan' => $this->request->getVar('id_satuan'),
            'harga_beli' => $hb,
            'harga_jual' => $hj,
            'stok' => $this->request->getVar('stok')
        ]);
        session()->setFlashData('pesan', 'Data berhasil diubah!');
        return redirect()->to(base_url('/produk'));
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $this->produk->delete($id);
        session()->setFlashData('pesan', 'Data berhasil dihapus!');
        return redirect()->to(base_url('/produk'));
    }
}
