<?php 
session_start();
require_once('database/connection.php');
require_once('database/categories.php');
require_once('templates/common.php');
require_once('templates/display_categories.php');
require_once('is_on_whishlist.php');
$db = getDatabaseConnection();
$categories = getAllCategories($db);
$brands = getAllBrands($db);
output_header();
display_categories($categories);
?>


    <main>
    <section id="main_page">
    <section id="Start_buying">
    <h1>Consegues resistir a estes produtos incriveis?</h1>
    <div class="image-container">
        <img src="transferir.png" alt="imagem principal" id= "main_img">
        <a href="items.php">Start Buying</a>
    </div>
    
    </section>
        
        <!-- Shop by brand -->
        <section id="Shop_by_brand">
        <h1>Shop by brand</h3>
        <ul>
            <?php foreach($brands as $brand) {?>
            
                <li><a href = "items.php?brand_id=<?= $brand['brand_id']?>"><?= $brand['brand_name']?></a></li>
            <?php }?>
            </ul>
        </section>
        
        <!-- Popular categories -->
        <section id="Popular_categories">
            <h1>Most Popular Categories</h1>
            <?php 
            $top_categories = Popular_categories($db);
            foreach($top_categories as $tcate){
            $cate = getCategorie($db,$tcate['category_id']);?>
            <h2><a href=""><?=$cate['category_name']?></a></h2>
            <section id="articles">
                
            <?php $items = get_Items_ByCategory($db, $cate['category_id']);

            foreach($items as $item){ ?>
            
            <article>
            <?php $photos = getPhotos($db, $item['ItemID']); 
            ?>
            <a href="item.php?item_id=<?= $item['ItemID'] ?>"><img src="<?= $photos[0]['photo_url']?>" alt="Item 1"></a>
            <section class="article-info">
                <h2><?= $item['item_name']?></h2>
                <p><?= $item['price']?>€</p>
                <?php $brand = getBrand($db, $item['brand_id']);
                if (is_array($brand) && !empty($brand['brand_name'])) { ?>
                    <p><?= $brand['brand_name']?></p>
                <?php } ?>
                <?php $size = getSize($db, $item['size_id']); 
                if (is_array($size) && !empty($size['size_value'])) { ?>
                    <p><?= $size['size_value']?></p>

                <?php } ?>
                <?php $condition = getCondition($db, $item['condition_id']); 
                if (is_array($condition) && !empty($condition['condition_value'])) { ?>
                    <p id="heart"><?= $condition['condition_value']?> 
                   <?php if(isset($_SESSION['username'])){?> <i class="<?= isOnwhishlist($db,$item['ItemID'],$_SESSION['username'])? 'fa-solid fa-heart' : 'fa-regular fa-heart'?>" data-item-id="<?= $item['ItemID'] ?>">
                </i>
                <?php } ?>
            </p>
                <?php } ?>
                </section>
            </article>
            
            <?php }?>
            <article id="More">           
                 <a href="items.php?category_id=<?= $tcate['category_id']?>">See all the articles of the <?= $cate['category_name']?> category</a>
            </article>
            </section>
            <?php }?>
        </section>

        <section id="General_articles">
            <h1>Popular Items</h1>
            <section id="Garticles">
            <article>
            <a href=""><img src="https://armazemdasmalhas.com/wp-content/uploads/2021/05/t-shirt-branca-2-scaled.jpg" alt="sapatilhas"></a>
                <section class="article-info">
                <p>40€</p>
                <p>Size</p>
                <p>Brand</p>
                <p>Condition</p>
                </section>
            </article>
            <article>
            <a href=""><img src="https://armazemdasmalhas.com/wp-content/uploads/2021/05/t-shirt-branca-2-scaled.jpg" alt="sapatilhas"></a>
                <section class="article-info">
                <p>40€</p>
                <p>Size</p>
                <p>Brand</p>
                <p>Condition</p>
                </section>
            </article>
            <article>
            <a href=""><img src="https://armazemdasmalhas.com/wp-content/uploads/2021/05/t-shirt-branca-2-scaled.jpg" alt="sapatilhas"></a>
                <section class="article-info">
                <p>40€</p>
                <p>Size</p>
                <p>Brand</p>
                <p>Condition</p>
                </section>
            </article>
            <article>
            <a href=""><img src="https://armazemdasmalhas.com/wp-content/uploads/2021/05/t-shirt-branca-2-scaled.jpg" alt="sapatilhas"></a>
                <section class="article-info">
                <p>40€</p>
                <p>Size</p>
                <p>Brand</p>
                <p>Condition</p>
                </section>
            </article>
            <article>
            <a href=""><img src="https://armazemdasmalhas.com/wp-content/uploads/2021/05/t-shirt-branca-2-scaled.jpg" alt="sapatilhas"></a>
                <section class="article-info">
                <p>40€</p>
                <p>Size</p>
                <p>Brand</p>
                <p>Condition</p>
                </section>
            </article>
            <article>
            <a href=""><img src="https://armazemdasmalhas.com/wp-content/uploads/2021/05/t-shirt-branca-2-scaled.jpg" alt="sapatilhas"></a>
                <section class="article-info">
                <p>40€</p>
                <p>Size</p>
                <p>Brand</p>
                <p>Condition</p>
                </section>
            </article>
            <article>
                <a href=""><img src="https://armazemdasmalhas.com/wp-content/uploads/2021/05/t-shirt-branca-2-scaled.jpg" alt="sapatilhas"></a>
                <section class="article-info">
                <p>40€</p>
                <p>Size</p>
                <p>Brand</p>
                <p>Condition</p>
                </section>
            </article>
            
            </section>
        </section>
        <section id="Popular_users">
        <h1>Popular Users</h1>
        
        <?php $users = get_Top_Sellers($db);
        
        foreach($users as $user){

            $user = getUser($db, $user['seller']);
            $user_items = getItemsBySeller($db, $user['username']);
            ?>
            <section id="User">
            <section id = "U_info">
            
            <a href=""><img src="<?= $user['photo_url']?>" alt="profile picture"></a>
            <div class="name-container">
            <p><?= $user['name']?></p>
            <p><i class="fa-solid fa-star"></i> <i class="fa-solid fa-star"></i> <i class="fa-solid fa-star"></i> <span class="R">125</span></p>
            </div>
            <a href="profile.php">View more</a>

            </section>
        <?php foreach($user_items as $item) {?>
            <section id="articles">
            <article>
            <?php $photos = getPhotos($db, $item['ItemID']); 
            ?>
            <a href="item.php?item_id=<?= $item['ItemID'] ?>"><img src="<?= $photos[0]['photo_url']?>" alt="Item 1"></a>
            <section class="article-info">
                <h2><?= $item['item_name']?></h2>
                <p><?= $item['price']?>€</p>
                <?php $brand = getBrand($db, $item['brand_id']);
                if (is_array($brand) && !empty($brand['brand_name'])) { ?>
                    <p><?= $brand['brand_name']?></p>
                <?php } ?>
                <?php $size = getSize($db, $item['size_id']); 
                if (is_array($size) && !empty($size['size_value'])) { ?>
                    <p><?= $size['size_value']?></p>

                <?php } ?>
                <?php $condition = getCondition($db, $item['condition_id']); 
                if (is_array($condition) && !empty($condition['condition_value'])) { ?>
                    <p id="heart"><?= $condition['condition_value']?> 
                   <?php if(isset($_SESSION['username'])){?> <i class="<?= isOnwhishlist($db,$item['ItemID'],$_SESSION['username'])? 'fa-solid fa-heart' : 'fa-regular fa-heart'?>" data-item-id="<?= $item['ItemID'] ?>">
                </i>
                <?php } ?>
            </p>
                <?php } ?>
                </section>
            </article>
        <?php }?>
            <article id="More">           
                    <a href="items.php?category_id=<?= $tcate['category_id']?>">See all the articles of <?= $user['name']?> </a>
            </article>

            </section>
            </section>
        <?php }?>
        </section>

        
    </section>
    </main>

<?php output_footer();
?>
