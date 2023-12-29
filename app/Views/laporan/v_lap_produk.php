<table id="bootstrap-data-table" class="table table-striped table-bordered">
            <thead>
              <tr class="text-center">
                <th width="50">No</th>
                <th>Kode / Barcode</th>
                <th>Nama Produk</th>
                <th>Kategori</th>
                <th>Satuan</th>
                <th>Harga Beli</th>
                <th>Harga Jual</th>
                <th>Stok</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 1;
              foreach ($items as $item) :
              ?>
                <tr class="<?= ($item['stok'] == 0) ? 'text-danger' : '' ?>">
                  <td><?= $no++ ?></td>
                  <td><?= $item['kode_produk'] ?>
                  <td><?= $item['nama_produk'] ?>
                  <td><?= $item['nama_kategori'] ?></td>
                  <td><?= $item['nama_satuan'] ?></td>
                  <td>Rp. <?= number_format($item['harga_beli']) ?></td>
                  <td>Rp. <?= number_format($item['harga_jual']) ?></td>
                  <td><?= $item['stok'] ?></td>
                </tr>
              <?php
              endforeach
              ?>
            </tbody>
            <b>Print Date: </b><?= date('d M Y H:i:s') ?>
          </table>