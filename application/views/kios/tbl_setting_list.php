
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
               
            </div>
        </div>
        <table class="table table-bordered" style="margin-bottom: 10px">
            <tr>
		<th>Tersedia</th>
        <th>Jumlah Kios terpakai</th>
		<th>Kosong</th>
		<th>Action</th>
            </tr><?php 
            foreach ($kios_data as $kios)
            {
                ?>
                <tr>
            <td><?php echo $kios->tersedia ?></td>
			<td><?php echo count($jml_kontrak) ?></td>
			<td><?php echo  $kios->tersedia - count($jml_kontrak) ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('kios/update/'.$kios->id),'Update'); 
				?>
			</td>
		</tr>
                <?php
            }
            ?>
        </table>
        <div class="row">
            <div class="col-md-6">
	    </div>
           
        </div>
