<?php

include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>about</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <link rel="stylesheet" href="css/style.css">
</head>
<body>
   
<?php include 'header.php'; ?>

<div class="heading">
   <h3>about us</h3>
   <p> <a href="home.php">home</a> / about </p>
</div>

<section class="about">
   <div class="flex">
      <div class="image">
         <img src="images/cafe2.jpg" alt="">
      </div>

      <div class="content">
         <h3>why choose us?</h3>
         <p> At Roast & Toast, we’re passionate about delivering exceptional coffee in a warm, welcoming space. Our beans are carefully sourced and roasted to perfection, ensuring every cup is rich and flavorful. With a cozy atmosphere, fresh menu options, and a commitment to eco-friendly practices, we aim to create a café experience that feels like home. Whether you're here to relax, work, or catch up with friends, Roast & Toast is the perfect spot to unwind and enjoy quality moments.</p>
         <a href="contact.php" class="btn">contact us</a>
      </div>
   </div>
</section>

<section class="reviews">
   <h1 class="title">client's reviews</h1>

   <div class="box-container">

      <div class="box">
         <h3>Cleoransi</h3>
         <img src="images/review1.JPG" alt="">
         <p>Roast & Toast is my new favorite spot! The coffee is so rich and full of flavor, and the pastries are always fresh and delicious. The ambiance is cozy, with warm lighting and a laid-back vibe that makes it perfect for relaxing or getting some work done. Highly recommended!</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
      </div>

      <div class="box">
         <h3>Jelita</h3>
         <img src="images/review2.jpeg" alt="">
         <p>This place is a gem! I tried the signature cappuccino, and it was hands down the best I've ever had. The baristas are friendly and clearly know their craft. I also love the variety on the menu — there’s always something new to try. Roast & Toast has become my go-to cafe!</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
      </div>

      <div class="box">
         <h3>Anindya</h3>
         <img src="images/review3.jpeg" alt="">
         <p>Roast & Toast has such a unique and welcoming atmosphere. The decor is rustic yet modern, and the staff is incredibly attentive. I especially love their cold brews and the avocado toast — it’s a must-try! It’s a great place to catch up with friends or simply unwind with a good book.</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
         </div>
      </div>

      <div class="box">
         <h3>Keisha Syabilla</h3>
         <img src="images/review4.jpeg" alt="">
         <p>If you’re looking for quality coffee and a chill place to hang out, Roast & Toast is the place to be. Their espresso is bold and smooth, and the latte art is always impressive. I also appreciate the local artwork on display. It’s more than just a coffee shop — it’s a community hub.</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
         </div>
      </div>

   </div>

</section>

<?php include 'footer.php'; ?>
<script src="js/script.js"></script>

</body>
</html>
