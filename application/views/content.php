<section class="main">
  <div class="container">
    <div class="row">
      <div class="<?php echo $isIndex?'md8':'md12'; ?> sm9 xs12 pt-5">
        <?php if($isIndex) { 
          $this->load->view('uingallery-desc');
        } else{?>
        <script>
          $('nav .post').addClass('active');
          $('#home').removeClass('active');
        </script>
        <?php } ?>
        <p class="penulis jangka">
          <?php if($isIndex) { ?>
          <span>Post terbaru</span>
          <?php } elseif(!isset($userData) && !$isIndex){?>
          <span>Semua post</span>
          <?php }?>
        </p>
        <div class="row">
          <?php
            foreach ($rows as $row) {
          ?>
            <div class="<?php echo $isIndex?'md4':'md3'; ?> sm6 xs6">
              <div class="card">
                  <figure class="img-wrapper content">
                    <img class="img-content" src="<?php echo base_url().'assets/'.$row['thumbnail'];?>" alt="<?php echo $row['judul'];?>">
                  </figure>
                  <small class="date">
                    <?php echo $row['tanggal']; ?>
                  </small>
                  <a href="<?php echo base_url().'post/'.$row['slug'] ?>">
                    <p class="title text-capitalized">
                      <?php echo $row['judul']; ?>
                    </p>
                  </a>
                  <p class="desc">
                    <?php echo substr(strip_tags($row['konten']),0,50); ?>...
                  </p>
                  <p class="penulis">
                    <?php echo isset($userData)?null:$row['nama']; ?>
                  </p>
                <?php if(isset($userData)) {?>
                <div class="flex-wrap admin-act">
                  <div class="left">
                    <p class="text-muted">Admin:</p>
                  </div>
                  <div class="right">
                    <a href="<?php echo base_url().'post/'.$row['slug']?>/edit">
                      <i class="fa fa-pencil"></i> Edit
                    </a>
                    <a href="<?php echo base_url().'post/'.$row['slug']?>/hapus">
                      <i class="fa fa-trash"></i> Hapus
                    </a>
                  </div>
                </div>
                <?php }?>
              </div>
            </div>
            <?php
              }
          ?>
        </div>
        <?php if($isIndex){?>
        <div class="text-center mt-5">
          <a href="<?php echo base_url();?>post" class="btn btn-primary btn-ajax">Muat Lebih banyak</a>
        </div>
        <?php } ?>
      </div>
      <?php if(!isset($sidenav)){ ?>
    </div>
  </div>
</section>
<?php } ?>