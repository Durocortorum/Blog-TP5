<div class="container-fluid">
  <div class="slider row" style="color:white;font-family: cursive"><br>
    <div class="col-xl-5 col-xs-12 text-center">
      <h4> DESCOTES Michel, Développeur Web</h4>
      <img class="photo mb-1 mt-1" src="photo.jpg" alt="photoProfile" style="border-radius: 8px; width:130px;height:180px;">
      <br />
      <a href="Michel_CV.pdf">Mon CV Téléchargeable</a>
    </div>
    <div class="col-xl-7 col-xs-12 text-center p-3">
      <br /><br />
      <h4 class="text-white">Bienvenue sur mon blog, si vous aimez le développement web et
        la programmation en <strong>PHP</strong>, <strong>HTML</strong>
        ou <strong>CSS</strong> vous êtes au bon endroit.
      </h4>
      <br />
      <h4>Confiez-moi votre projet et j'en fais une réalité !</h4>
    </div>
  </div>

  <div class="container">
    <div class="row mt-5">
      <?php
      foreach ($posts as $post) :
      ?>
        <div class="col-lg-4 col-md-6">
          <div class="card h-100" style="background-color:gainsboro">
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
                    <img src="public/images/developpement.jpg" class="d-block" style="height:200px" alt="developpement">
                  </div>
                </div>
              </div>

              <a class="avatar" style="display:block;margin-left:auto;margin-right: auto"><img src="public/images/Technology.png" alt="Profile Image"></a>
              <!-- blog-info -->
              <div class="blog-info text-center p-1">
                <h4 class="title"><a href="post&id=<?= $post->id() ?>&view=1"><b><?= $post->title() ?></b></a></h4>
                <h5><?= $post->chapo() ?></h5>
                <br>
                <div style="background-color:cadetblue; display:block;margin-left:auto;margin-right: auto; width:80%;border-radius: 10px">
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
</div>