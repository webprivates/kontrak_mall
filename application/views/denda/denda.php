
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
		<th>Jatuh Tempo</th>
        <th>Denda</th>
		<th>Action</th>
            </tr><?php 
            foreach ($denda_data as $denda)
            {
                ?>
                <tr>
            <td><?php echo $denda->jatuh_tempo ?> Hari</td>
            <td><?php echo $denda->denda ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('denda/update/'.$denda->id),'Update'); 
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
