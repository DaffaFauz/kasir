<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\PenjualanModel;
use App\Models\ProdukModel;

class Penjualan extends BaseController
{
    protected $user;
    protected $penjualan;
    protected $produk;

    public function __construct()
    {
        $this->user = new UserModel();
        $this->penjualan = new PenjualanModel();
        $this->produk = new ProdukModel();
    }
    public function index()
    {
        $cart = \Config\Services::cart();
        $data = [
            'active' => 'dashboard',
            'items' => $this->penjualan->noFaktur(),
            'cart' => $cart->contents(),
            'grand_total' => $cart->total(),
            'produk' => $this->produk->getProduk()
        ];
        return view('v_penjualan', $data);
    }

    public function cekKode(){
        $kode = $this->request->getVar('kode_produk');
        $produk = $this->produk->cekKode($kode);
        if($produk == null){
            $data = [
            'nama_produk' => '',
            'nama_kategori' => '',
            'nama_satuan' => '',
            'harga_jual' => '',
            'harga_beli' => ''
            ];
        } else{
            $data = [
                'nama_produk' => $produk['nama_produk'],
                'nama_kategori' => $produk['nama_kategori'],
                'nama_satuan' => $produk['nama_satuan'],
                'harga_jual' => number_format($produk['harga_jual']),
                'harga_beli' => $produk['harga_beli'],
                ];
        }
        echo json_encode($data);
    }

    public function addCart(){
        $cart = \Config\Services::cart();

        $harga = str_replace(',', '', $this->request->getVar('harga'));
        // Insert an array of values
        $cart->insert(array(
        'id'      => $this->request->getVar('kode_produk'),
        'qty'     => $this->request->getVar('qty'),
        'price'   => $harga,
        'name'    => $this->request->getVar('nama_produk'),
        'options' => array('nama_kategori' => $this->request->getVar('kategori'),
                            'nama_satuan' => $this->request->getVar('satuan'),
                            'modal' => $this->request->getVar('modal'))
        ));
        return redirect()->to(base_url('/penjualan'));
    }

    public function deleteCart(){
        $cart = \Config\Services::cart();
        // Clear the shopping cart
        $cart->destroy();
        return redirect()->to(base_url('/penjualan'));
    }

    public function removeItem($rowid){
        $cart = \Config\Services::cart();
        $cart->remove($rowid);
        return redirect()->to(base_url('/penjualan'));
    }

    public function simpanTransaksi(){
        $cart = \Config\Services::cart();
        $produk = $cart->contents();
        $no_faktur = $this->penjualan->noFaktur();

        $data = [
            'no_faktur' => $no_faktur,
            'tanggal_jual' => date('Y-m-d'),
            'jam' => date('H:i:s'),
            'grand_total' => $cart->total(),
            'dibayar' => str_replace(',','',$this->request->getVar('bayar')),
            'kembalian' => str_replace(',','',$this->request->getVar('kembalian')),
            'id_user' => session()->get('id')
        ];
        $this->penjualan->tabelJual()->insert($data);

        foreach($produk as $p){
            $data = [
                'no_faktur' => $no_faktur,
                'kode_produk' => $p['id'],
                'modal' => $p['options']['modal'],
                'harga_jual' => $p['price'],
                'qty' => $p['qty'],
                'total_harga' => $p['subtotal'],
                'profit' => ($p['price'] - $p['options']['modal']) * $p['qty']
            ];
            $this->penjualan->tabelRinciJual()->insert($data);
        }
        $cart->destroy();
        session()->setFlashData('pesan', 'Transaksi berhasil disimpan!');
        return redirect()->to(base_url('/penjualan'));
    }
}
