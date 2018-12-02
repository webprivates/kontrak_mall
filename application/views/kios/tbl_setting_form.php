
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Tersedia <?php echo form_error('tersedia') ?></label>
            <input type="text" class="form-control" name="tersedia" id="tersedia" placeholder="Tersedia" value="<?php echo $tersedia; ?>" />
        </div>
	   
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('kios') ?>" class="btn btn-default">Cancel</a>
	</form>
