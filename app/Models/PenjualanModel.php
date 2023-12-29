<?php

namespace App\Models;

use CodeIgniter\Model;

class PenjualanModel extends Model
{
    public function noFaktur()
    {
        $tgl = date('Ymd');
        $query = $this->db->query("SELECT MAX(RIGHT(no_faktur, 4)) as nf from jual where tanggal_jual = '$tgl'")->getRowArray();
        if($query['nf'] > 0){
            $tmp = $query['nf'] + 1;
            $kode = sprintf('%04s', $tmp);
        }else{
            $kode = '0001';
        }
        $no_faktur = $tgl.$kode;
        return $no_faktur;
    }

    public function tabelJual(){
        return $this->db->table('jual');
    }
    
    public function tabelRinciJual(){
        return $this->db->table('rinci_jual');
    }
}
