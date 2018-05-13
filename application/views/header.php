<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>UIN Gallery</title>
  <meta name="description" content="UIN Gallery adalah tempat terkumpulnya kreasi terbaik karya mahasiswa UIN Maliki">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/main.css" />
  <link rel="icon shortcut" href="./assets/icon/favicon.png">
  <script src="<?php echo base_url()?>js/jquery.min.js" type="text/javascript"></script>
</head>
<body class="flex-wrap">
  <script>console.log('<?php echo json_encode($this->session->userdata())?>')</script>
  <nav class="static">
    <div class="container">
      <div class="flex-wrap">
        <h1 class="blog-title">
          UIN<span>Gallery</span><span class="admin"><?php echo $this->session->userdata('username')?'(Admin)':null;?></span>
        </h1>
        <div class="link-wrapper">
          <ul class="link">
            <li id="home">
              <a href="<?php echo base_url()?>">Beranda</a>
            </li>
            <li id="post">
              <a href="<?php echo base_url()?>post">Lihat Karya</a>
            </li>
            <li id="upload">
              <a href="<?php echo base_url()?>upload">Upload Karya</a>
            </li>
            <?php if($this->session->userdata('username')!==null){?>
            <li id="profile">
              <a href="<?php echo base_url(); ?>profile">Karya Saya</a>
            </li>
            <li>
              <a href="<?php echo base_url()?>logout">Logout</a>
            </li>
            <?php }else{?>
            <li>
              <a href="<?php echo base_url()?>login">Login</a>
            </li>
            <?php }?>
          </ul>
        </div>
      </div>
    </div>
  </nav>
  <div class="v-spacer">
  <script>
    var url = location.href;
    var activated=false;
    $('.link').children('li').each(function(index,val){
      var text = $(val).attr('id')?$(val).attr('id').toLowerCase():null;
      if(url.indexOf(text)>0) {
        $(val).addClass('active');
        activated=true;
      };
    });
    if(!activated) $('#home').addClass('active');

  </script>