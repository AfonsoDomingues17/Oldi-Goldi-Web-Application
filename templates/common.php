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
    <link rel="stylesheet" href="css/item.css">
    <link rel="stylesheet" href="css/profile.css">

    <script src="items.js" defer></script>
    <script src="script.js" defer></script>
    <script src="update_profile.js" defer></script>
    <script src="change_password.js" defer></script>
    <script src="register.js" defer></script>
    <script src="search.js" defer></script>
    <script src="https://kit.fontawesome.com/2b8a00114a.js" crossorigin="anonymous"></script>
    <meta charset="UTF-8">

    <title>Store</title>
</head>
<body>
    <header>
        <section id="main_nav_bar">
        <h1><a href = "index.php">Our Super Cool Store</a></h1> 
        <section id = "navsection">
        <form action="search.php" method="post">
            <select name="Categories">
            <option value="All" selected>All Categories</option>
            <option value="Clothing">Clothing</option>
            <option value="Shoewear">Shoewear</option>
            <option value="Sweatshirts">Sweatshirts</option>
            <option value="Trousers">Trousers</option>
            </select>
            <!-- Search bar -->
            <input id = "search" type = "text" placeholder = "Find your dream item!" name="inputbar" oninput="searchFunction()">
            <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
        </form>
        </section>
        <section id="searchResult"></section>
        <div class="navbar-right">
            <?php if(isset($_SESSION['username'])) { ?>
            <div class="icon-links">
                <a href=""><i class="fa-solid fa-cart-plus"></i></a>
                <a href=""><i class="fa-solid fa-message"></i></a>
                <a href="wish_list.php"><i class="fa-solid fa-heart"></i></a>
            </div>
            <?php } ?>
            <?php if(isset($_SESSION['username'])) {?>
            <section id="loged_in">
            <a href="profile.php?username=<?php echo $_SESSION['username']; ?>" id="profile"><i class="fa-solid fa-user"></i></a>
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

        </div>
      </section>

<?php } ?>

<?php function output_footer(){ ?>

    <footer>
    <p>&copy; 2024 Your Online Store. All rights reserved.</p>
    </footer>
    </body>
</html>
<?php }?>