
        <h2 style="margin-top:0px">Kontrak List</h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('kontrak/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('kontrak/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('kontrak'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Search</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <table class="table table-bordered bg-white" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
                <th>Nama Kontrak</th>
                <th>Jenis Kontrak</th>
                <th>Nama Toko</th>
                <th>Tgl Masuk</th>
                <th>Tgl Berakhir</th>
                <th>Jumlah Dana</th>
                <th>DP</th>
                <th>Contact</th>
                <th>Action</th>
            </tr>
            <?php
            foreach ($kontrak_data as $kontrak){
                   $tanggal1 = new DateTime(".$kontrak->tgl_berakhir.");
                     $tanggal2 = new DateTime();
                     $perbedaan = $tanggal2->diff($tanggal1)->format("%a");
             ?>
                <tr>
                    <td width="10px"><?php echo ++$start ?></td>
                    <td><?php 
                            if ($perbedaan <= $tempo) {
                               echo "<a href='".base_url('kontrak/expired/').$kontrak->id_kontrak."' <span class='label label-danger'><i class='fa fa-warning' > " .$kontrak->nm_kontrak."</span></a>";
                            }else{
                                echo $kontrak->nm_kontrak;
                            }

                     ?></td>
                    <td><?php echo $kontrak->nm_jenis ?></td>
                    <td><?php echo $kontrak->nm_toko ?></td>
                    <td><?php echo $kontrak->tgl_masuk ?></td>
                    <td><?php echo $kontrak->tgl_berakhir ?></td>
                    <td><?php echo $kontrak->jml_dana ?></td>
                    <td><?php echo $kontrak->dp ?></td>
                    <td><?php echo $kontrak->cp ?></td>
                    <td style="text-align:center" width="200px">
                        <?php 
                        echo anchor(site_url('kontrak/read/'.$kontrak->id_kontrak),'Read'); 
                        echo ' | '; 
                        echo anchor(site_url('kontrak/update/'.$kontrak->id_kontrak),'Update'); 
                        echo ' | '; 
                        echo anchor(site_url('kontrak/delete/'.$kontrak->id_kontrak),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
                        ?>
                    </td>
		        </tr>
                <?php } ?>
        </table>
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
		<?php echo anchor(site_url('kontrak/excel'), 'Excel', 'class="btn btn-primary"'); ?>
		<?php echo anchor(site_url('kontrak/word'), 'Word', 'class="btn btn-primary"'); ?>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
