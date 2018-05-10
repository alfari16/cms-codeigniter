<div class="md4 sm3 xs12 pt-5 sidebar">
  <section class="social flex-wrap">
    <div class="left">
      <p class="title">Follow me on</p>
    </div>
    <div class="right flex-wrap">
      <ul class="social">
        <li>
          <a href="https://facebook.com/alif.irfan16" target="_blank" title="facebook">
            <img src="<?php echo base_url(); ?>assets/icon/facebook.svg" alt="">
          </a>
        </li>
        <li>
          <a href="https://instagram.com/alfari16" target="_blank" title="instagram">
            <img src="<?php echo base_url(); ?>assets/icon/instagram.svg" alt="">
          </a>
        </li>
        <li>
          <a href="https://linkedin.com/alfari16" target="_blank" title="linkedin">
            <img src="<?php echo base_url(); ?>assets/icon/linkedin.svg" alt="">
          </a>
        </li>
        <li>
          <a href="https://twitter.com/alif_irfan16" target="_blank" title="twitter">
            <img src="<?php echo base_url(); ?>assets/icon/twitter.svg" alt="">
          </a>
        </li>
      </ul>
    </div>
  </section>
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
    <p class="title">Subscribe this blog</p>
    <div class="form-group flex-wrap mt-3">
      <input placeholder="E-mail kamu" type="email" class="form-control">
      <button class="btn-transparent btn">Subscribe</button>
    </div>
    <small class="penulis mt-3">Kamu akan mendapat notifikasi saat kami memposting berita baru.</small>
  </section>
</div>
</div>
  </div>
</section>