<div class="row">
    <div class="col-md-12 bg-white">
        <h2 style="margin-top:0px">Tbl_kontrak <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
            <div class="form-group">
                <label for="int">Jenis Id <?php echo form_error('jenis_id') ?></label>
                <input type="text" class="form-control" name="jenis_id" id="jenis_id" placeholder="Jenis Id" value="<?php echo $nm_jenis; ?>" />
            </div>
            <div class="form-group">
                <label for="varchar">Nm Toko <?php echo form_error('nm_toko') ?></label>
                <input type="text" class="form-control" name="nm_toko" id="nm_toko" placeholder="Nm Toko" value="<?php echo $nm_toko; ?>" />
            </div>
            <div class="form-group">
                <label for="date">Tgl Masuk <?php echo form_error('tgl_masuk') ?></label>
                <input type="date" class="form-control" name="tgl_masuk" id="tgl_masuk" placeholder="Tgl Masuk" value="<?php echo $tgl_masuk; ?>" />
            </div>
            <div class="form-group">
                <label for="varchar">Cp <?php echo form_error('cp') ?></label>
                <input type="text" class="form-control" name="cp" id="cp" placeholder="Cp" value="<?php echo $cp; ?>" />
            </div>
            <div class="form-group">
                <label for="double">Jml Dana <?php echo form_error('jml_dana') ?></label>
                <input type="text" class="form-control" name="jml_dana" id="jml_dana" placeholder="Jml Dana" value="<?php echo $jml_dana; ?>" />
            </div>
            <input type="hidden" name="id_kontrak" value="<?php echo $id_kontrak; ?>" /> 
            <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
            <a href="<?php echo site_url('kontrak') ?>" class="btn btn-default">Cancel</a>
        </form>

    </div>
</div>
