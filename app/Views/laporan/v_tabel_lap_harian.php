<thead>
    <tr class="text-center">
        <th width="50">No</th>
        <th>Kode / Barcode</th>
        <th>Nama Produk</th>
        <th>Modal</th>
        <th>Harga Jual</th>
        <th>Qty</th>
        <th>Total Harga</th>
        <th>Profit</th>
    </tr>
</thead>
<tbody>
    <?php $no = 1; foreach($data as $d):
        $total[] = $d['total_harga'];
        $untung[] = $d['profit'] ?>
    <tr>
        <td><?= $no++ ?></td>
        <td><?= $d['kode_produk'] ?></td>
        <td><?= $d['nama_produk'] ?></td>
        <td class="text-right">Rp. <?= number_format($d['modal']) ?></td>
        <td class="text-right">Rp. <?= number_format($d['harga_jual']) ?></td>
        <td><?= $d['qty'] ?></td>
        <td class="text-right">Rp. <?= number_format($d['total_harga']) ?></td>
        <td class="text-right">Rp. <?= number_format($d['profit']) ?></td>
    </tr>
    <?php endforeach ?>
    <tr>
        <td colspan="6">Grand Total</td>
        <td class="text-right">Rp. <?= number_format(array_sum($total)) ?></td>
        <td class="text-right">Rp. <?= number_format(array_sum($untung)) ?></td>
    </tr>
</tbody>