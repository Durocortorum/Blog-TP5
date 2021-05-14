<div class="slider text-center" style="color:white"><br>
  <!-- <img id="imgProfile" class="iio" src="??.jpg" style="border-radius: 8px;"><br> -->
  <h5>Michel DESCOTES</h5>
  <h6><a href="Michel_CV.pdf">Mon CV Téléchargeable</a></h6>
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
              <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img src="public/images/Blog.jpg" class="d-block" style="height:200px" alt="Blog_Image">
                  </div>
                  <div class="carousel-item">
                    <img src="public/images/programmation.jpg" class="d-block" style="height:200px" alt="programmation">
                  </div>
                  <div class="carousel-item">
                    <img src="public/images/developpement2.jpg" class="d-block" style="height:200px" alt="developpement">
                  </div>
                </div>
              </div>

              <a class="avatar"><img src="public/images/Technology.png" alt="Profile Image"></a>
              <!-- blog-info -->
              <div class="blog-info p-1">
                <h4 class="title"><a href="post&id=<?= $post->id() ?>&view=1"><b><?= $post->title() ?></b></a></h4>
                <h5><?= $post->chapo() ?></h5>
                <br>
                <div class="bg-info" style="display:block;margin-left:auto;margin-right: auto; width:80%;border-radius: 10px">
                  <h6><?= $post->author() ?></h6>
                  <h6>Modifié le <?= $post->date() ?></h6>
                </div>
              </div>
            </div>
          </div>
        </div>

      <?php endforeach ?>
    </div>
  </div>
</section>