<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<?php include 'view/header.php';?>
    <img id="background" src="images/background.png" alt="background"/>
    <header>
      <h1>Uncle Jack's Trading Post</h1>
      <h2>Light-emitting Diode Bulds</h2>
    </header>
    <main>
      <div class="carousel colorDissolve">
          <img class="item" src="images/00013.jpg" alt="slideshow_image"/>
          <img class="item" src="images/00023.jpg" alt="slideshow_image"/>
          <img class="item" src="images/00033.jpg" alt="slideshow_image"/>
          <img class="item" src="images/00043.jpg" alt="slideshow_image"/>
      </div>
    </main>
<?php include 'view/footer.php'; ?>
