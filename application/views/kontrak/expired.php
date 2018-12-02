<div class="row">
    <div class="col-md-12 bg-white">
        <h2 style="margin-top:0px">Detail Kioss</h2>
        <table class="table">
            <tr><td>Nama kontrak</td><td><?php echo $data->nm_kontrak; ?></td></tr>
            <tr><td>Jenis kontrak</td><td><?php echo $data->nm_jenis; ?></td></tr>
            <tr><td>Nama Toko</td><td><?php echo $data->nm_toko; ?></td></tr>
            <tr><td>Tgl Masuk</td><td><?php echo $data->tgl_masuk; ?></td></tr>
            <tr><td>Tgl Berakhir</td><td><?php echo $data->tgl_berakhir; ?></td></tr>
            <tr><td>Contact Person</td><td><?php echo $data->cp; ?></td></tr>
            <tr><td>Jumlah Dana</td><td><?php echo $data->jml_dana; ?></td></tr>
            <tr><td>Jumlah DP</td><td><?php echo $data->dp; ?></td></tr>
            <tr><td><span class="label label-danger"> Denda Sebesar</span></td><td>Rp. <?php echo $denda->denda; ?></td></tr>
            <tr><td></td><td><a href="<?php echo site_url('kontrak') ?>" class="btn btn-default">Cancel</a></td></tr>
        </table>
    </div>
</div>
   
