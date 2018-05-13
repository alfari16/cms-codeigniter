<section class="main">
  <div class="container">
    <div class="row">
      <div class="md8 sm9 xs12 pt-5">
        <?php if(isset($notfound)){?>
        <p class="text-center">Post tidak ditemukan.</p>
        <?php }else{?>
        <div class="white">
          <figure class="img-wrapper">
            <img class="img-content-detail" src="<?php echo base_url().'assets/'.$data[0]['thumbnail']; ?>" alt="<?php echo $data[0]['judul']; ?>">
          </figure>
          <div class="flex-wrap admin-act mt-3">
            <div class="left">
              <h1 class="post-title"><?php echo $data[0]['judul']; ?></h1>
            </div>
            <?php if($this->session->userdata('id')===$data[0]['id_author']){ ?>
              <div class="right">
                <a href="<?php echo base_url().'post/'.$data[0]['slug'];?>/edit">
                  <i class="fa fa-pencil"></i> Edit
                </a>
                <a href="<?php echo base_url().'post/'.$data[0]['slug'];?>/hapus">
                  <i class="fa fa-trash"></i> Hapus
                </a>
              </div>
            <?php } ?>
          </div>
          <p class="penulis"><?php echo $data[0]['nama']; ?></p>
          <p class="desc">
            <?php echo $data[0]['konten']; ?>
          </p>
        </div>
      </div>
<?php }if($sidenav === FALSE){ ?>
    </div>
  </div>
</section>
<?php } if(isset($delete)){?>
<script>
  if(confirm('Apakah anda ingin menghapus post ini?')){
    location.href='<?php echo base_url().'post/'.$slug;?>/dodelete';
  }
</script>
<?php } ?>