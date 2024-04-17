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
    <a href="edit_profile.php">Edit your profile</a>
    <a href="">Mensagem</a>
    <section id="Info">
        <img src="" alt="profile picture">
        <p>Marcus Aurelio</p>
        <p>marquinhosrelampago77</h3>
        <p><i class="fa-solid fa-location-dot"></i> Alhos Vedros, Portugal</p>
        <p>Eu sou um personal treiner na zona de lisboa que recebjjj...</p>
    
    </section>
    <section id="Personal Info">
        <h3>Personal Info</h3>
        <span class="email">aureliomadureira@gmail.com</span>
        <span class="phonenumber">+351 999 456 778</span>
        <span class="address">Rua José Regio, N8, 3ºDto, Alhos Vedros 2860-113</span>
        
    </section>
    <!--
    <section id="orders">
        <h2>Order History</h2>
        <ol>
            <li> Order: 1


            </li>
            
        </ol>
    </section>
    -->
    <!-- Só aparece se o perfil for da pessoa logada -->
    <section id="articles">
        <h1>Items to Sell</h1>
        <p>1247articles</p>
        <article>
            <img src="" alt="item">
            <p>250€</p>
            <p>size</p>
            <p>brand</p>
            <p>condition</p>
        </article>
    </section>
    <section id="Reviews">
        <h1>Reviews</h1>
        <p>5.0 (1700)</p>
        <article >
            <a href=""><img src="" alt="profile picture of users">
            <a href=""><span class="author">Francisco Teixeira</span></a>
            <span class="date">1d</span>
            <p>reviews stars</p>
            <p>Recomendo esta tudo perfeito, chegou tudo direitinho. Simplesmente perfeito!</p>
        </article>
    </section>
</main>

<footer>
    <p>&copy; 2024 Your Online Store. All rights reserved.</p>
</footer>

</body>
</html>
