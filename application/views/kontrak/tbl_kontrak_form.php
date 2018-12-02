<div class="row">
    <div class="col-md-12 bg-white">
        <h2 style="margin-top:0px">Kontrak <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
            <div class="form-group">
                <label for="varchar">Nama Kontrak <?php echo form_error('nm_kontrak') ?></label>
                <input type="text" class="form-control" name="nm_kontrak" id="nm_kontrak" placeholder="Nama Kontrak" value="<?php echo $nm_kontrak; ?>" />
            </div>
            <div class="form-group">
                <label for="int">Jenis Kontrak <?php echo form_error('jenis_id') ?></label>
                <select name="jenis_id" class="form-control" required>
                    <option value="">-PILIH-</option>
                    <?php foreach($jenis_data as $jenis):
                        $idjenis=$jenis->id_jenis;
                        $njenis=$jenis->nm_jenis;
                    ?>
                    <?php if($idjenis==$jenis_id):?>
                        <option value="<?php echo $idjenis;?>" selected><?php echo $njenis;?></option>
                    <?php else:?>
                        <option value="<?php echo $idjenis;?>"><?php echo $njenis;?></option>
                    <?php endif;?>
                    <?php endforeach;?>
                </select>
            </div>
            <div class="form-group">
                <label for="varchar">Nama Toko <?php echo form_error('nm_toko') ?></label>
                <input type="text" class="form-control" name="nm_toko" id="nm_toko" placeholder="Nama Toko" value="<?php echo $nm_toko; ?>" />
            </div>
            <div class="form-group">
                <label for="date">Tgl Masuk <?php echo form_error('tgl_masuk') ?></label>
                <input type="date" class="form-control" name="tgl_masuk" id="tgl_masuk" placeholder="Tgl Masuk" value="<?php echo $tgl_masuk; ?>" />
            </div>
             <div class="form-group">
                <label for="date">Tgl Berakhir <?php echo form_error('tgl_berakhir') ?></label>
                <input type="date" class="form-control" name="tgl_berakhir" id="tgl_berakhir" placeholder="Tgl Berakhir" value="<?php echo $tgl_berakhir; ?>" />
            </div>

            <div class="form-group">
                <label for="varchar">Cp <?php echo form_error('cp') ?></label>
                <input type="text" class="form-control" name="cp" id="cp" placeholder="Cp" value="<?php echo $cp; ?>" />
            </div>
            <div class="form-group">
                <label for="double">Jml Dana <?php echo form_error('jml_dana') ?></label>
                <input type="text" class="form-control" name="jml_dana" id="jml_dana" placeholder="Jumlah Dana" value="<?php echo $jml_dana; ?>" />
            </div>
             <div class="form-group">
                <label for="double">Jml DP <?php echo form_error('jml_dana') ?></label>
                <input type="text" class="form-control" name="dp" id="dp" placeholder="Jumlah DP" value="<?php echo $dp; ?>" />
            </div>
            <input type="hidden" name="id_kontrak" value="<?php echo $id_kontrak; ?>" /> 
            <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
            <a href="<?php echo site_url('kontrak') ?>" class="btn btn-default">Cancel</a>
        </form>
   

    </div>
</div>
