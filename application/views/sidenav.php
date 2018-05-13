<div class="md4 sm3 xs12 pt-5 sidebar">
  <section class="popular">
    <p class="title">Popular Post</p>
    <hr>
    <ul>
      <?php 
        foreach ($sidenavData as $data) {
      ?>
      <li>
        <a href="<?php echo base_url().'post/'.$data['slug'];?>" class="flex-wrap">
          <img class="sidenav-img" src="<?php echo base_url().'assets/'.$data['thumbnail'];?>" alt="<?php echo $data['judul'];?>">
          <div class="right flex-wrap">
            <p class="title sub-title"><?php echo $data['judul'];?></p>
            <p class="penulis"><?php echo $data['nama'];?></p>
          </div>
        </a>
      </li>
      <?php 
        }
      ?>
    </ul>
  </section>
  <section class="subscribe">
    <p class="title">Subscribe UIN Gallery</p>
    <div class="form-group flex-wrap mt-3">
      <input placeholder="E-mail kamu" type="email" class="form-control">
      <button class="btn-transparent btn">Subscribe</button>
    </div>
    <small class="penulis mt-3">Kamu akan mendapat notifikasi saat karya baru diunggah.</small>
  </section>
</div>
</div>
  </div>
</section>