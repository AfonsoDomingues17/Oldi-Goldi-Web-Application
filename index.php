<?php 
require_once('database/connection.php');
require_once('database/categories.php');
require_once('templates/common.php');
require_once('templates/display_categories.php');

$db = getDatabaseConnection();
$categories = getAllCategories($db);
$brands = getAllBrands($db);
output_header();
display_categories($categories);
?>


    <main>
        <section id="Start_buying">
        <h1>Consegues resistir a estes produtos incriveis?</h1>
        <img src="https://miro.medium.com/v2/resize:fit:1400/format:webp/1*iAu65xDmvpVdBJgps6EDEw.png" alt="imagem principal" id= "main_img">
        <a href="">Start Buying</a>
        </section>
        
        <!-- Shop by brand -->
        <section id="Shop_by_brand">
        <h3>Shop by brand</h3>
        <ul>
            <?php foreach($brands as $brand) {?>
            
                <li><a href = ""><?= $brand['brand_name']?></a></li>
            <?php }?>
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
<?php output_footer();
?>
