<table id="bootstrap-data-table" class="table table-striped table-bordered">
    <thead>
        <tr class="text-center">
            <th width="50">No</th>
            <th>Tanggal</th>
            <th>Total Harga</th>
            <th>Profit</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1;
        foreach ($data as $d) :
            $total[] = $d['total_harga'];
            $untung[] = $d['profit'] ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= date("D, d M Y", strtotime($d['tanggal_jual'])) ?></td>
                <td class="text-right">Rp. <?= number_format($d['total_harga']) ?></td>
                <td class="text-right">Rp. <?= number_format($d['profit']) ?></td>
            </tr>
        <?php endforeach ?>
        <tr>
            <td colspan="2">Grand Total</td>
            <td class="text-right">Rp. <?= number_format(array_sum($total)) ?></td>
            <td class="text-right">Rp. <?= number_format(array_sum($untung)) ?></td>
        </tr>
    </tbody>
    <b>Print Date: </b><?= date('M', strtotime($tgl)) ?>
</table>