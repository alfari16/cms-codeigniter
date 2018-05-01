  <section class="post-baru">
    <div class="container">
      <?php 
        echo validation_errors();
        if(isset($_GET['sukses'])) {?>
        <script>alert('Post berhasil di upload');</script>
        <?php }if(isset($error)){
          echo '<p>';
          foreach($error as $er){
            echo $er;
          }
          echo '</p>';
        } 
        if(isset($edit)){
          echo form_open_multipart('home/editPost');
        }else{
          echo form_open_multipart('home/create');
        }
      ?>
        <p class="title mt-5">Tambah Post Baru</p>
        <label for="thumb">Tambah Thumbnail</label>
        <input type="file" name="input_foto">
        <input type="text" name="judul" placeholder="Judul" value="<?php echo isset($result['judul'])?$result['judul']:'';?>">
        <textarea id="tiny-mce" name="konten" class="mt-3" placeholder="Konten">
          <?php if(isset($result)){echo $result['konten'];}?>
        </textarea>
        <div class="text-right">
            <button class="btn mt-3">Kirim</button>
        </div>
      <?php echo form_close();?>
    </div>
  </section>
  <script src="<?php echo base_url();?>js/tinymce/tinymce.min.js"></script>
  <script>
    tinymce.init({
        selector: '#tiny-mce',
        height: 200,
        menubar: false,
        plugins: [
            'advlist autolink lists link image charmap print preview anchor textcolor',
            'searchreplace visualblocks code fullscreen',
            'insertdatetime media table contextmenu paste code help wordcount'
        ],
        toolbar: 'insert | undo redo |  formatselect | bold italic backcolor  | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help',
    });
  </script>