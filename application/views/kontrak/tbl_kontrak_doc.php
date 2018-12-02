<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            .word-table {
                border:1px solid black !important; 
                border-collapse: collapse !important;
                width: 100%;
            }
            .word-table tr th, .word-table tr td{
                border:1px solid black !important; 
                padding: 5px 10px;
            }
        </style>
    </head>
    <body>
        <h2>Tbl_kontrak List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
                <th>Nama Kontrak</th>
                <th>Jenis Kontrak</th>
                <th>Nm Toko</th>
                <th>Tgl Masuk</th>
                <th>Tgl Berakhir</th>
                <th>Contact</th>
                <th>Jml Dana</th>
                <th>DP</th>
		
            </tr>
            <?php
            foreach ($kontrak_data as $kontrak)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $kontrak->nm_kontrak ?></td>
		      <td><?php echo $kontrak->nm_jenis ?></td>
		      <td><?php echo $kontrak->nm_toko ?></td>
              <td><?php echo $kontrak->tgl_masuk ?></td>
		      <td><?php echo $kontrak->tgl_berakhir ?></td>
		      <td><?php echo $kontrak->cp ?></td>
              <td><?php echo $kontrak->jml_dana ?></td> 
		      <td><?php echo $kontrak->dp ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>