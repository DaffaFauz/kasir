<?php

namespace App\Models;

use CodeIgniter\Model;

class LaporanModel extends Model
{
        protected $table            = 'rinci_jual';
        protected $primaryKey       = 'id_rinci';
        protected $allowedFields    = ['no_faktur', 'kode_produk', 'modal', 'harga_jual', 'qty', 'total_harga', 'profit'];

        public function getData($tgl)
        {
                return $this->join('produk', 'produk.kode_produk = rinci_jual.kode_produk')->join('jual', 'jual.no_faktur = rinci_jual.no_faktur')->where('jual.tanggal_jual', $tgl)->select('rinci_jual.kode_produk, produk.nama_produk, rinci_jual.modal, rinci_jual.harga_jual')->groupBy('rinci_jual.kode_produk')->selectSum('rinci_jual.qty')->selectSum('rinci_jual.total_harga')->selectSum('rinci_jual.profit')->findAll();
        }

        public function getDataBulanan($tgl)
        {
                return $this->join('produk', 'produk.kode_produk = rinci_jual.kode_produk')->join('jual', 'jual.no_faktur = rinci_jual.no_faktur')->where([
                        'year(jual.tanggal_jual)' => date('Y', strtotime($tgl)),
                        'month(jual.tanggal_jual)' => date('m', strtotime($tgl))
                ])->select('jual.tanggal_jual')->groupBy('jual.tanggal_jual')->selectSum('rinci_jual.total_harga')->selectSum('rinci_jual.profit')->findAll();
        }

        public function getDataTahunan($tgl)
        {
                return $this->join('produk', 'produk.kode_produk = rinci_jual.kode_produk')->join('jual', 'jual.no_faktur = rinci_jual.no_faktur')->where([
                        'year(jual.tanggal_jual)' => date('Y', strtotime($tgl))
                ])->select('jual.tanggal_jual')->groupBy('month(jual.tanggal_jual)')->selectSum('rinci_jual.total_harga')->selectSum('rinci_jual.profit')->findAll();
        }

        public function grafikBulanan()
        {
                return $this->join('produk', 'produk.kode_produk = rinci_jual.kode_produk')->join('jual', 'jual.no_faktur = rinci_jual.no_faktur')->where([
                        'year(jual.tanggal_jual)' => date('Y'),
                        'month(jual.tanggal_jual)' => date('m')
                ])->select('jual.tanggal_jual')->groupBy('jual.tanggal_jual')->selectSum('rinci_jual.total_harga')->selectSum('rinci_jual.profit')->findAll();
        }

        public function grafikTahunan()
        {
                return $this->join('produk', 'produk.kode_produk = rinci_jual.kode_produk')->join('jual', 'jual.no_faktur = rinci_jual.no_faktur')->where([
                        'year(jual.tanggal_jual)' => date('Y')
                ])->select('jual.tanggal_jual')->groupBy('month(jual.tanggal_jual)')->selectSum('rinci_jual.total_harga')->selectSum('rinci_jual.profit')->findAll();
        }

        public function pendapatanHarian()
        {
                return $this->join('jual', 'jual.no_faktur = rinci_jual.no_faktur')->where('jual.tanggal_jual', date('Y-m-d'))->groupBy('jual.tanggal_jual')->selectSum('rinci_jual.total_harga')->findAll();
        }

        public function pendapatanBulanan()
        {
                return $this->join('jual', 'jual.no_faktur = rinci_jual.no_faktur')->where('month(jual.tanggal_jual)', date('m'))->groupBy('month(jual.tanggal_jual)')->selectSum('rinci_jual.total_harga')->findAll();
        }

        public function pendapatanTahunan()
        {
                return $this->join('jual', 'jual.no_faktur = rinci_jual.no_faktur')->where('year(jual.tanggal_jual)', date('Y'))->groupBy('year(rinci_jual.kode_produk)')->selectSum('rinci_jual.total_harga')->findAll();
        }
}
