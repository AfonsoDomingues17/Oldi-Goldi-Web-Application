<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://kit.fontawesome.com/2b8a00114a.js" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/edit_profile.css">
    <title>User Profile</title>
</head>
<body>

<header>
        <h1><a href = "index.php">Our Super Cool Store</a></h1> 
        <section id = "navsection">
        <form action="" method="get">
            <select name="Categories">
            <option value="Clothing">Clothing</option>
            <option value="Shoewear">Shoewear</option>
            <option value="Sweatshirts">Sweatshirts</option>
            <option value="Trousers">Trousers</option>
            </select>
            <!-- Search bar -->
            <input id = "search" type = "text" placeholder = "Find your dream item!">
            <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
            <img src="" alt="shopping cart">
            <p>3 items</p>
        </form>
        </section>
        <a href = "login.php">Iniciar Sessão</a>
        <a href = "register.php">Registar</a>
        <ul id="Category_filters">
            <li><a href = "">T-shirts</a></li>
            <li><a href = "">Shoewear</a></li>
            <li><a href = "">Sweatshirts</a></li>
            <li><a href = "">Trousers</a></li>
            <li><a href = "">Other</a></li>
        </ul>
        <!-- Shopping Cart -->
        <!-- Filters -->
    </header>

<main>
    <h1>Update your profile</h1>
        <form action="" id="edit_profile">
            <section id="update_profile">
            <section id="user_picture">
                <p>Your picture</p>
            <img src="https://picsum.photos/200/300" alt="profile picture">
            <label>About you: <textarea name="About you" id="About_you" placeholder="Let everyone know more about you!"></textarea></label>
            </section>
        
            <section id="user_details">
                <label>Username: <textarea name="username" id="username"></textarea></label>
                <label>Email: <textarea name="username" id="username"></textarea></label>
                <label>Name: <textarea name="username" id="username"></textarea></label>
                <label>Phone Number: <textarea name="phonenumber" id="phonenumber"></textarea></label>
                <label>New Password: <input type="password" name="npassword"></label>
                <label>Confirm new Password: <input type="password" name = "cnpassword"></label>
            </section>
            <section id="shipping">
                <h2>Shipping Information</h2>

                <label>Adress: <textarea name="username" id="username"></textarea></label>
                <label>Zip-Code: <textarea name="username" id="username"></textarea></label>
                <label>Country: <textarea name="username" id="username"></textarea></label>
                <label>City: <textarea name="username" id="username"></textarea></label>
            </section>
        </section>
    </form>
    
   <footer><button type="submit">Update Profile</button></footer>
</main>

<footer>
    <p>&copy; 2024 Your Online Store. All rights reserved.</p>
</footer>

</body>
</html>
