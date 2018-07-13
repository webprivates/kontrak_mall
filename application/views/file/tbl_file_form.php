<div class="row">
    <div class="col-md-12 bg-white">
    <h2 style="margin-top:0px">File <?php echo $button ?></h2>
        <!-- <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" > -->
        <?php echo form_open_multipart($action); ?>
	    <div class="form-group">
            <label for="int">Nama Kontrak<?php echo form_error('kontrak_id') ?></label>

            <select name="kontrak_id" id="kontrak_id"class="form-control">
                <option value="">-PILIH-</option>
                <?php foreach($kontrak_data as $kontrak):
                    $idkontrak=$kontrak->id_kontrak;
                    $nkontrak=$kontrak->nm_kontrak;
                ?>
                <?php if($idkontrak==$kontrak_id):?>
                    <option value="<?php echo $idkontrak;?>" selected><?php echo $nkontrak;?></option>
                <?php else:?>
                    <option value="<?php echo $idkontrak;?>"><?php echo $nkontrak;?></option>
                <?php endif;?>
                <?php endforeach;?>
            </select>


        </div>
	    <div class="form-group">
            <label for="varchar">Pilih File <?php echo $error ?></label>
            <input type="file" class="form-control" name="nm_file" id="nm_file">
            <!-- <?php echo form_upload('nm_file'); ?> -->
        </div>
	    <input type="hidden" name="id_file" value="<?php echo $id_file; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('file') ?>" class="btn btn-default">Cancel</a>
	</form>
    </div>
</div>
       
