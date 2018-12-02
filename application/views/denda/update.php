
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">denda <?php echo form_error('denda') ?></label>
            <input type="text" class="form-control" name="denda" id="denda" placeholder="denda" value="<?php echo $denda; ?>" />
        </div>
         <div class="form-group">
            <label for="int">jatuh_tempo (hari) <?php echo form_error('jatuh_tempo') ?></label>
            <input type="text" class="form-control" name="jatuh_tempo" id="jatuh_tempo" placeholder="jatuh_tempo" value="<?php echo $jatuh_tempo; ?>" />
        </div>
	   
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('denda') ?>" class="btn btn-default">Cancel</a>
	</form>
