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
    <p class="text-center text-danger mt-3">Username/Password tidak ditemukan</p>
<?php }?>
    <p class="text-center text-mute mt-3">Belum punya akun? <a href="<?php echo base_url(); ?>daftar">Daftar</a>.</p>
    <input class="btn form-control mt-3" type="submit" value="Login">
    <p class="helper mt-3">(Username: admin, password: admin)</p>
<?php echo form_close();?>
</div>