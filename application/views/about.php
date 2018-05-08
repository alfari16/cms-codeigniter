<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Tech Rags</title>
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/main.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css">
</head>
<body>
  <section class="header mt-5">
    <div class="background">
      <div class="left">
        <figure class="img-wrapper flex-wrap">
          <img src="<?php echo base_url(); ?>assets/me.JPG" alt="Alif Irfan Anshory">
        </figure>
      </div>
      <div class="right">
        <h1 class="name">Alif Irfan Anshory</h1>
        <p class="nim">Web Developer | JS Enthusiast</p>
      </div>
    </div>
  </section>
  <section class="info container">
    <p class="text-center">
      Hi! I'm 20 years old developer from Indonesia. I love logics and something beautiful. That's why I deepen the front end development.
      In addition, I am also studying other programming languages, according to the curriculum I get in the university. I believe
      that with the power of code, I can change the world for the better future.
    </p>
  </section>
  <div class="text-center">
    <button class="btn act" id="aktivitas">Activity</button>
  </div>
  <section class="activity">

  </section>

  <script src="<?php echo base_url(); ?>js/jquery.min.js"></script>
  <script>
    $("#aktivitas").click(function() {
    $.ajax({
      type: "GET",
      url: "<?php echo base_url(); ?>activity/aktivitas.html",
      headers: {
        "Content-Type": "plain/html"
      },
      success: function(res) {
        $(".activity").html(res);
      },
      error: function(err) {
        console.log(err);
      }
    });
  });
  </script>
</body>
</html>