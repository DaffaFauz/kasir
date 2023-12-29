<?php

namespace App\Controllers;

use App\Models\AdminModel;
use App\Models\ProdukModel;
use App\Models\LaporanModel;

class Laporan extends BaseController
{
    protected $admin;
    protected $produk;
    protected $laporan;

    public function __construct()
    {
        $this->admin = new AdminModel();
        $this->produk = new ProdukModel();
        $this->laporan = new LaporanModel();
    }
    public function index()
    {
        $data = [
            'active' => 'dashboard',
            'page' => 'laporan/v_lap_produk',
            'laporan' => 'Laporan Data Produk',
            'profile' => $this->admin->getSetting(),
            'items' => $this->produk->getProduk()
        ];
        return view('laporan/v_template_lap', $data);
    }

    public function lapHarian()
    {
        $data = [
            'title' => 'Laporan Harian',
            'menu' => 'Laporan',
            'submenu' => 'Laporan Harian',
            'page' => 'laporan/v_lap_harian',
            'laporan' => 'Laporan Penjualan Harian',
            'profile' => $this->admin->getSetting(),
            'items' => $this->produk->getProduk()
        ];
        return view('laporan/v_lap_harian', $data);
    }

    public function getLapHarian()
    {
        $tgl = $this->request->getVar('tgl');
        $data = [
            'data' => $this->laporan->getData($tgl)
        ];
        $response = [
            'data' => view('laporan/v_tabel_lap_harian', $data)
        ];

        echo json_encode($response);
    }

    public function printLapHarian($tgl)
    {
        $data = [
            'title' => 'Laporan Harian',
            'menu' => 'Laporan',
            'submenu' => 'Laporan Harian',
            'page' => 'laporan/v_print_lap_harian',
            'laporan' => 'Laporan Penjualan Harian',
            'profile' => $this->admin->getSetting(),
            'data' => $this->laporan->getData($tgl),
            'tgl' => $tgl
        ];
        return view('laporan/v_template_lap', $data);
    }

    public function lapBulanan()
    {
        $data = [
            'title' => 'Laporan Bulanan',
            'menu' => 'Laporan',
            'submenu' => 'Laporan Bulanan',
            'laporan' => 'Laporan Penjualan Bulanan',
            'profile' => $this->admin->getSetting(),
            'items' => $this->produk->getProduk()
        ];
        return view('laporan/v_lap_bulanan', $data);
    }

    public function getLapBulanan()
    {
        $tgl = $this->request->getVar('tgl');
        $data = [
            'data' => $this->laporan->getDataBulanan($tgl)
        ];
        $response = [
            'data' => view('laporan/v_tabel_lap_bulanan', $data)
        ];

        echo json_encode($response);
    }

    public function printLapBulanan($tgl)
    {
        $data = [
            'active' => 'dashboard',
            'page' => 'laporan/v_print_lap_bulanan',
            'laporan' => 'Laporan Penjualan Bulanan',
            'profile' => $this->admin->getSetting(),
            'data' => $this->laporan->getDataBulanan($tgl),
            'tgl' => $tgl
        ];
        return view('laporan/v_template_lap', $data);
    }

    public function lapTahunan()
    {
        $data = [
            'title' => 'Laporan Tahunan',
            'menu' => 'Laporan',
            'submenu' => 'Laporan Tahunan',
            'laporan' => 'Laporan Penjualan Tahunan',
        ];
        return view('laporan/v_lap_tahunan', $data);
    }

    public function getLapTahunan()
    {
        $tgl = $this->request->getVar('tgl');
        $data = [
            'data' => $this->laporan->getDataTahunan($tgl)
        ];
        $response = [
            'data' => view('laporan/v_tabel_lap_tahunan', $data)
        ];

        echo json_encode($response);
    }

    public function printLapTahunan($tgl)
    {
        $data = [
            'page' => 'laporan/v_print_lap_tahunan',
            'laporan' => 'Laporan Penjualan Tahunan',
            'profile' => $this->admin->getSetting(),
            'data' => $this->laporan->getDataTahunan($tgl),
            'tgl' => $tgl
        ];
        return view('laporan/v_template_lap', $data);
    }
}
