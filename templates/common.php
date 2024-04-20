<?php
session_start();

function output_header(){ ?>
    <!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/items.css">
    <link rel="stylesheet" href="css/edit_profile.css">

    <script src="https://kit.fontawesome.com/2b8a00114a.js" crossorigin="anonymous"></script>
    <meta charset="UTF-8">

    <title>Store</title>
</head>
<body>
    <header>
        <section id="main_nav_bar">
        <h1><a href = "index.php">Our Super Cool Store</a></h1> 
        <section id = "navsection">
        <form action="" method="get">
            <select name="Categories">
            <option value="All" selected>All Categories</option>
            <option value="Clothing">Clothing</option>
            <option value="Shoewear">Shoewear</option>
            <option value="Sweatshirts">Sweatshirts</option>
            <option value="Trousers">Trousers</option>
            </select>
            <!-- Search bar -->
            <input id = "search" type = "text" placeholder = "Find your dream item!">
            <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
            <p> <i class="fa-solid fa-cart-plus"></i></p>
        </form>
        </section>
        <?php if(isset($_SESSION['username'])) {?>
        <section id="loged_in">
        <a href="profile.php" id="profile"><i class="fa-solid fa-user"></i></a>
        <a href="sell.php" id="Sell_now">Sell Now</a>
        <a href="action_logout.php" id="logout">Logout</a>
        </section>
      <?php } 
      else { ?>
        <div id="signup">
        <a href = "login.php">Login</a>
        <a href = "register.php">Register</a>
        </div>
      <?php } ?>
      </section>

<?php } ?>

<?php function output_footer(){ ?>

    <footer>
    <p>&copy; 2024 Your Online Store. All rights reserved.</p>
    </footer>
    </body>
</html>
<?php }?>