<?php 
  include '../connection.php'; 
  include '../views/header.php';
  include './../connection.php';
  if(!isset($_GET['id'])){
    include '../views/content.php';
  }else{
    $temp = $_GET['id'];
    $data = query("SELECT judul,konten,nama,tanggal FROM post, user WHERE post.id=$temp AND post.id_author=user.id");
    if(mysqli_num_rows($data)<0){
      echo '<p class="text-center">Post tidak ditemukan</p>';
    }else{
      $result = $data->fetch_assoc();
?>
  <section class="main">
    <div class="container">
      <div class="row">
        <div class="md8 sm9 xs12 pt-5">
          <div class="white">
            <figure class="img-wrapper">
              <img src="assets/react.png" alt="">
            </figure>
            <h1 class="post-title mt-3"><?php echo $result['judul']; ?></h1>
            <p class="penulis"><?php $result['nama']; ?></p>
            <p class="desc">
              <?php $result['konten']; 
              echo json_encode($result);?>
            </p>
          </div>
        </div>
        <div class="md4 sm3 xs12 pt-5 sidebar">
          <section class="social flex-wrap">
            <div class="left">
              <p class="title">Follow me on</p>
            </div>
            <div class="right flex-wrap">
              <ul class="social">
                <li>
                  <a href="https://facebook.com/alif.irfan16" target="_blank" title="facebook">
                    <img src="assets/icon/facebook.svg" alt="">
                  </a>
                </li>
                <li>
                  <a href="https://instagram.com/alfari16" target="_blank" title="instagram">
                    <img src="assets/icon/instagram.svg" alt="">
                  </a>
                </li>
                <li>
                  <a href="https://linkedin.com/alfari16" target="_blank" title="linkedin">
                    <img src="assets/icon/linkedin.svg" alt="">
                  </a>
                </li>
                <li>
                  <a href="https://twitter.com/alif_irfan16" target="_blank" title="twitter">
                    <img src="assets/icon/twitter.svg" alt="">
                  </a>
                </li>
              </ul>
            </div>
          </section>
          <section class="popular">
            <p class="title">Popular Post</p>
            <hr>
            <ul>
              <li>
                <a href="post-detail.html" class="flex-wrap">
                  <figure class="img-wrapper flex-wrap center">
                    <img src="assets/peta.JPG" alt="">
                  </figure>
                  <div class="right">
                    <p class="title sub-title">Caching menggunakan Redis + Node.js</p>
                    <p class="penulis">Alif Irfan Anshory</p>
                  </div>
                </a>
              </li>
              <li>
                <a href="post-detail.html" class="flex-wrap">
                  <figure class="img-wrapper flex-wrap center">
                    <img src="assets/good.JPG" alt="">
                  </figure>
                  <div class="right">
                    <p class="title sub-title">Mengenal Framework Vue.js</p>
                    <p class="penulis">Alif Irfan Anshory</p>
                  </div>
                </a>
              </li>
              <li>
                <a href="post-detail.html" class="flex-wrap">
                  <figure class="img-wrapper flex-wrap center">
                    <img src="assets/react.png" alt="">
                  </figure>
                  <div class="right">
                    <p class="title sub-title">Lifecycle Hook pada Framework React.js</p>
                    <p class="penulis">Alif Irfan Anshory</p>
                  </div>
                </a>
              </li>
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
<?php 
    }
  } 
  include '../views/footer.php';
?>  