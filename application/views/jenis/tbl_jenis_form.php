<div class="row">
    <div class="col-md-12 bg-white">
        <h2 style="margin-top:0px">Tbl_jenis <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
            <div class="form-group">
                <label for="varchar">Nm Jenis <?php echo form_error('nm_jenis') ?></label>
                <input type="text" class="form-control" name="nm_jenis" id="nm_jenis" placeholder="Nm Jenis" value="<?php echo $nm_jenis; ?>" />
            </div>
            <input type="hidden" name="id_jenis" value="<?php echo $id_jenis; ?>" /> 
            <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
            <a href="<?php echo site_url('jenis') ?>" class="btn btn-default">Cancel</a>
        </form>
    </div>
</div>
   
