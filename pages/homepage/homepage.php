<?php
require_once "../../includes/config_session.inc.php";

if (!isset($_SESSION['user_id'])) {
  header("Location: /blogged/index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" type="text/css" href="homepage.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Playwrite+NL:wght@100..400&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css2?family=Bodoni+Moda:ital,opsz,wght@0,6..96,400..900;1,6..96,400..900&display=swap" rel="stylesheet">
</head>

<body>
  <nav class="navbar navbar-expand-lg sticky-top" style="background-color: white;">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Blogged</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">My Blog</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Contact</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Logout</a>
          </li>
        </ul>
        <form class="d-flex" role="search">
          <input class="form-control me-2" type="search" placeholder="Search Article" aria-label="Search">
          <button class="btn btn-dark" type="submit">Search</button>
        </form>
      </div>
    </div>
  </nav>
  <section>
    <div class="blog-img-div">
      <img class="blog-img blog-img-1" src="../../images/laptop-4906312_640.jpg" alt="laptop-img" />
      <img class="blog-img blog-img-2" src="../../images/notebooks-569121_640.jpg" alt="cafe-img" />
      <img class="blog-img blog-img-3" src="../../images/office-581127_640.jpg" alt="ipad-img" />
    </div>
  </section>
  <section class="blog-card-section">
    <h3 class="blog-card-header">My blog, My life</h3>
    <div class="for-alignment">
      <div class="blog-cards">
        <div class="flex-blog-cards">
          <div class="card" style="width: 18rem;">
            <img src="../../images/bristles-6580821_640.jpg" class="card-img-top card-img" alt="bristles">
            <div class="card-body">
              <p class="release-date">March 26, 2023</p>
              <h5 class="card-title">Card title</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
          </div>
          <div class="card card-two" style="width: 18rem; margin-top:35px;">
            <img src="../../images/woman-6284845_640.jpg" class="card-img-top card-img" alt="woman-laptop">
            <div class="card-body">
              <p class="release-date">March 26, 2023</p>
              <h5 class="card-title">Card title</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
          </div>
        </div>
        <a href="#" class="show-posts">All Posts</a>
      </div>
      <div class="form-div">
        <h3 class="email-text">Let the posts come to you.</h3>
        <form class="email-form">
          <label class="input-label">Email*</label>
          <input class="email-input" type="text" name="email" />
          <button class="email-button" type="submit">Subscribe</button>
        </form>
      </div>
    </div>
  </section>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>