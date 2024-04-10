<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Store</title>
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
            <button type="submit">P</button>
            <img src="" alt="shopping cart">
            <p>3 items</p>
        </form>
        </section>
        <a href = "login.php">Iniciar Sessão</a>
        <a href = "resgister.php">Registar</a>
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
        <section id="Start_buying">
        <h1>Consegues resistir a estes produtos incriveis!</h1>
        <img src="" alt="imagem principal" id= "main_img">
        <a href="">Start Buying</a>
        </section>
        
        <!-- Shop by brand -->
        <section id="Shop_by_brand">
            <h3>Shop by brand</h3>
            <ul>
                <li><a href = "">Nike</a></li>
                <li><a href = "">Adidas</a></li>
                <li><a href = "">Converse</a></li>
                <li><a href = "">Element</a></li>
                <li><a href = "">Levi's</a></li>
                <li><a href = "">Other1</a></li>
                <li><a href = "">Other2</a></li>
                <li><a href = "">Other3</a></li>
                <li><a href = "">Other4</a></li>
            </ul>
        </section>
        
        <!-- Popular categories -->
        <section id="Popular_categories">
            <h1>Most Popular Category</h1>
            <h2>Shoewear</h2>
            <article>
                <img src="" alt="sapatilhas">
                <p>40€</p>
                <p>Size</p>
                <p>Brand</p>
                <p>Condition</p>
            </article>
        </section>
        <section id="General articles">
            <h1>Popular Items</h1>
        <article>
            <img src="" alt="tshirt branca">
            <p>100€</p>
            <p>tamanho</p>
            <p>brand</p>
            <p>condition</p>
        </article>
        </section>
        <section id="Popular_users">
            <h1>Popular Users</h1>
            <p>name</p>
            <p>number_reviews</p>
            <a href="">View more</a>
            <article>
            <img src="" alt="tshirt branca">
            <p>100€</p>
            <p>tamanho</p>
            <p>brand</p>
            <p>condition</p>
            </article>
            <a href="">See all the 100 articles this user sells</a>
        </section>

    </main>
    <footer>
        
    </footer>
</body>
</html>
