<div class="slider text-center" style="color:white"><br>
  <!-- <img id="imgProfile" class="iio" src="??.jpg" style="border-radius: 8px;"><br> -->
  <h5>Michel DESCOTES</h5>
  <h6><a href="CV.pdf">Mon CV Téléchargeable</a></h6>
</div>

<section class="blog-area section">
  
  <div class="container">
    <div class="row">

      <?php
      foreach ($posts as $post) :
      ?>
        <div class="col-lg-4 col-md-6">
          <div class="card h-100">
            <!-- single-post -->
            <div class="single-post post-style-1">
              <div class="blog-image"><img src="public/images/marion-michele-330691.jpg" alt="Blog Image"></div>

              <a class="avatar" href="#"><img src="public/images/icons8-team-355979.jpg" alt="Profile Image"></a>
              <!-- blog-info -->
              <div class="blog-info">
                <h4 class="title"><a href="post&id=<?= $post->id() ?>&view=1"><b><?= $post->title() ?></b></a></h4>
                <h5><?= $post->chapo() ?></h5>
                <br>
                <h6><?= $post->author() ?></h6>
                <h6>Modifié le <?= $post->date() ?></h6>
              </div>
            </div>
          </div>
        </div>

      <?php endforeach ?>
    </div>
  </div>
</section>


