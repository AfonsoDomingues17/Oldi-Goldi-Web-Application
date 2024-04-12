<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://kit.fontawesome.com/2b8a00114a.js" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <h1>Update you profile</h1>
   <section id="update profile">
    <p>You picture</p>
    <img src="" alt="profile picture">
    <label>About you: <textarea name="About you" id="About you"></textarea></label>
    <label>Username: <textarea name="username" id="username"></textarea></label>
    <label>Email: <textarea name="username" id="username"></textarea></label>
    <label>Name: <textarea name="username" id="username"></textarea></label>
    <label>Phone Number: <textarea name="phonenumber" id="phonenumber"></textarea></label>
    <label>New Password: <input type="password" name="npassword"></label>
    <label>Confirm new Password: <input type="password" name = "cnpassword"></label>
    <h2>Shipping Information</h2>

    <label>Adress: <textarea name="username" id="username"></textarea></label>
    <label>Zip-Code: <textarea name="username" id="username"></textarea></label>
    <label>Country: <textarea name="username" id="username"></textarea></label>
    <label>City: <textarea name="username" id="username"></textarea></label>
   </section>
   <footer><button type="submit">Update Profile</button></footer>
</main>

<footer>
    <p>&copy; 2024 Your Online Store. All rights reserved.</p>
</footer>

</body>
</html>
