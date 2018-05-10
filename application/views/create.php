  <section class="post-baru">
    <div class="container">
      <?php 
        echo validation_errors();
        if(isset($_GET['sukses'])) {?>
        <script>alert('Post berhasil di upload');</script>
        <?php } ?>
      <?php 
        if(isset($_GET['edit'])) {?>
        <script>
          alert('Post berhasil di edit!');
          location.href="<?php echo base_url();?>post";
        </script>
        <?php }
        if(isset($error)){
          echo '<p>';
          foreach($error as $er){
            echo $er;
          }
          echo '</p>';
        } 
        if(isset($edit)){
          echo form_open_multipart('home/doEdit');
          ?>
          <script>$('#home').removeClass('active');</script>
          <?php
        }else{
          echo form_open_multipart('home/create');
        }
      ?>
        <p class="title mt-5">Tambah Post Baru</p>
        <div>
          <p class="label-create">Thumbnail</p>
            <label for="thumbnail" class="label-thumb" title="Tambah thumbnail">
              <?php if(isset($result['thumbnail'])){ ?>
              <img src="<?php echo base_url().'assets/'.$result['thumbnail'];?>" id="gambar-thumbnail">
              <?php } ?>
            </label>
            <input type="file" class="hidden" name="input_foto" id="thumbnail">
        </div>
        <div class="mt-3">
          <p class="label-create">Judul</p>
          <input class="form-control special" type="text" name="judul" placeholder="Judul" value="<?php echo isset($result['judul'])?$result['judul']:'';?>">          
        </div>
        <p class="label-create mt-3">Deskripsi</p>
        <textarea id="tiny-mce" name="konten" class="mt-3" placeholder="Konten">
          <?php if(isset($result)){echo $result['konten'];}?>
        </textarea>
        <?php if(isset($edit)){?>
          <input type="hidden" name="slug" value="<?php echo $slug; ?>">
        <?php } ?>
        <div class="text-right">
            <button type="submit" class="btn mt-3">Kirim</button>
        </div>
      <?php echo form_close();?>
    </div>
  </section>
  <script src="<?php echo base_url();?>js/tinymce/tinymce.min.js"></script>
  <script>
    $('#thumbnail').change(function(e){
      console.log('triggerred',e.target.files[0])
      var check = $('#gambar-thumbnail').length<1;
      if(check){
        var img = document.createElement('img');
        img.id='gambar-thumbnail';
        $('.label-thumb').append(img);
      }
      $('#gambar-thumbnail').attr('src',URL.createObjectURL(e.target.files[0]));
    });
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