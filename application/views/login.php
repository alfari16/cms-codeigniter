<div class="login">
<?php 
    echo form_open('login/checkLogin');
    if(isset($_GET['auth'])){
?>
    <p class="title text-danger text-center">Anda harus login terlebih dahulu.</p>
    <?php } ?>    
    <p class="title text-center login-title">Login</p>
    <input placeholder="Username" class="form-control" type="text" name="username" required>
    <input placeholder="Password" class="form-control" type="password" name="password" required>
    <?php echo validation_errors();?>
<?php if(isset($notfound)){?>
    <p class="text-center">Username/Password tidak ditemukan</p>
<?php }?>
    <input class="btn" type="submit" value="Login">
    <p class="helper mt-3">(Username: admin, password: admin)</p>
<?php echo form_close();?>
</div>