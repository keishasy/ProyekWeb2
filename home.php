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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">

</head>
<body>
    <?php include 'header.php'; ?>
    <section class="home">
        <div class="content">
            <h3>Start Your Day Right with Roast & Toast.</h3>
            <p>Discover the rich flavors and cozy ambiance that make Roast & Toast your perfect getaway. Whether you're here to relax, work, or catch up with friends, we have a spot for you.</p>
            <a href="about.php" class="white-btn">discover more</a>
        </div>
    </section>
    
    <section class="products">
        <h1 class="title">Latest products</h1>
        <div class="box-container">
            <?php  
            $select_products = mysqli_query($conn, "SELECT * FROM `products` LIMIT 6") or die('query failed');
            if(mysqli_num_rows($select_products) > 0){
                while($fetch_products = mysqli_fetch_assoc($select_products)){
            ?>
            
            <form action="" method="post" class="box">
                <img class="image" src="images/<?php echo $fetch_products['image']; ?>" alt="">
                <div class="name"><?php echo $fetch_products['name']; ?></div>
                <div class="price">$<?php echo $fetch_products['price']; ?>/-</div>
                <input type="number" min="1" name="product_quantity" value="1" class="qty">
                <input type="hidden" name="product_name" value="<?php echo $fetch_products['name']; ?>">
                <input type="hidden" name="product_price" value="<?php echo $fetch_products['price']; ?>">
                <input type="hidden" name="product_image" value="<?php echo $fetch_products['image']; ?>">
                <input type="submit" value="add to cart" name="add_to_cart" class="btn">
            </form>
            
            <?php
                }
            } else {
                echo '<p class="empty">no products added yet!</p>';
            }
            ?>
        </div>
        
        <div class="load-more" style="margin-top: 2rem; text-align:center">
            <a href="shop.php" class="option-btn">load more</a>
        </div>
    </section>

    <section class="about">

        <div class="flex">
            <div class="image">
                <img src="images/cafe.jpg" alt="">
            </div>

            <div class="content">
                <h3>about us</h3>
                <p>Roast & Toast isn’t just a café; it’s a community. Established with a passion for quality coffee and warm experiences, our café is designed to be a cozy haven where people from all walks of life can relax, connect, and enjoy handcrafted coffee. </p>
                <a href="about.php" class="btn">read more</a>
            </div>

        </div>

    </section>

    <section class="home-contact">
        <div class="content">
            <h3>have any questions?</h3>
            <p>We're here to help make your experience at Roast & Toast as delightful as possible. Whether you have a question about our menu, need assistance with catering, or simply want to chat about coffee, feel free to reach out.</p>
            <a href="contact.php" class="white-btn">contact us</a>
        </div>

    </section>

    <?php include 'footer.php'; ?>
    <script src="js/script.js"></script>
</body>
</html>
