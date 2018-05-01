<div class="login">
<?php echo form_open('login/checkLogin');?>
    <p class="title text-center login-title">Login sebagai Admin</p>
    <input placeholder="Username" class="form-control" type="text" name="username" required>
    <input placeholder="Password" class="form-control" type="password" name="password" required>
    <?php echo validation_errors();?>
<?php if(isset($notfound)){?>
    <p class="text-center">Username/Password tidak ditemukan</p>
<?php }?>
    <input class="btn" type="submit" value="Login">
<?php echo form_close();?>
</div>