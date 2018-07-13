<div class="row">
    <div class="col-md-12 bg-white">
    <h2 style="margin-top:0px">File <?php echo $button ?></h2>
        <!-- <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" > -->
        <?php echo form_open_multipart($action); ?>
	    <div class="form-group">
            <label for="int">Nama Kontrak<?php echo form_error('kontrak_id') ?></label>
            <select name="kontrak_id" id="kontrak_id"class="form-control">
                <?php foreach($kontrak_data as $kontrak): ?>
                    <option value="<?php echo $kontrak->id_kontrak ?>"><?php echo $kontrak->nm_kontrak ?></option>
                <?php endforeach ?>
            </select>
        </div>
	    <div class="form-group">
            <label for="varchar">Pilih File <?php echo $error ?></label>
            <!-- <input type="file" class="form-control" name="nm_file" id="nm_file" required> -->
            <?php echo form_upload('nm_file'); ?>
        </div>
	    <input type="hidden" name="id_file" value="<?php echo $id_file; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('file') ?>" class="btn btn-default">Cancel</a>
	</form>
    </div>
</div>
       
