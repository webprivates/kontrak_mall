<?php $param = $this->uri->segment(2) ?>

<div class="row">
    <div class="col-md-12 bg-white">
        <h2 style="margin-top:0px">Tbl_users <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
            <div class="form-group">
                <label for="varchar">Username <?php echo form_error('username') ?></label>
                <input type="text" class="form-control" name="username" id="username" placeholder="Username" value="<?php echo $username; ?>" />
            </div>
            <?php if ($param == 'update' || $param == 'update_action'){ ?>
            <div class="form-group">
                <label for="varchar">Password Baru </label>
                <input type="text" class="form-control" name="password" id="password" placeholder="Password" />
                <p>*Tidak perlu isi jika tidak ingin mengubah password</p>
            </div>
            <?php } else{?>
            <div class="form-group">
                <label for="varchar">Password  <?php echo form_error('password') ?></label>
                <input type="text" class="form-control" name="password" id="password" placeholder="Password" required/>
            </div>
            <?php } ?>
            <div class="form-group">
                <label for="varchar">Nama <?php echo form_error('nama') ?></label>
                <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="<?php echo $nama; ?>" />
            </div>
            <div class="form-group">
                <label for="varchar">Level <?php echo form_error('level') ?></label>
                <input type="text" class="form-control" name="level" id="level" placeholder="Level" value="<?php echo $level; ?>" />
                <p>*level = admin / user</p>
            </div>
            <input type="hidden" name="id_users" value="<?php echo $id_users; ?>" /> 
            <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
            <a href="<?php echo site_url('users') ?>" class="btn btn-default">Cancel</a>
	    </form>
    </div>
</div>
       