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
    <div class="image-container">
        <img src="https://miro.medium.com/v2/resize:fit:1400/format:webp/1*iAu65xDmvpVdBJgps6EDEw.png" alt="imagem principal" id= "main_img">
        <a href="items.php">Start Buying</a>
    </div>
</section>
        
        <!-- Shop by brand -->
        <section id="Shop_by_brand">
        <h1>Shop by brand</h3>
        <ul>
            <?php foreach($brands as $brand) {?>
            
                <li><a href = ""><?= $brand['brand_name']?></a></li>
            <?php }?>
            </ul>
        </section>
        
        <!-- Popular categories -->
        <section id="Popular_categories">
            <h1>Most Popular Categories</h1>
            <h2><a href="">Shoewear</a></h2>
            <section id="articles">
            <article>
            <a href=""><img src="https://encrypted-tbn1.gstatic.com/shopping?q=tbn:ANd9GcS4zK3eemkv_6On3WPF10bU_QJgiFtulpcRd7FfBeTjLrHsWPB9JAM74v8iRwwXBYn299XR1ATIU3BgIrClPndrAxv0e3zev9XY0hi4pDScgx22_dMzNCTf" alt="sapatilhas"></a>
                <section class="article-info">
                <p>40€</p>
                <p>Size</p>
                <p>Brand</p>
                <p>Condition</p>
                </span>
            </article>
            
            <article>
            <a href=""><img src="https://encrypted-tbn1.gstatic.com/shopping?q=tbn:ANd9GcS4zK3eemkv_6On3WPF10bU_QJgiFtulpcRd7FfBeTjLrHsWPB9JAM74v8iRwwXBYn299XR1ATIU3BgIrClPndrAxv0e3zev9XY0hi4pDScgx22_dMzNCTf" alt="sapatilhas"></a>
                <section class="article-info">
                <p>40€</p>
                <p>Size</p>
                <p>Brand</p>
                <p>Condition</p>
                </span>
            </article>
            <article>
                <a href=""><img src="https://encrypted-tbn1.gstatic.com/shopping?q=tbn:ANd9GcS4zK3eemkv_6On3WPF10bU_QJgiFtulpcRd7FfBeTjLrHsWPB9JAM74v8iRwwXBYn299XR1ATIU3BgIrClPndrAxv0e3zev9XY0hi4pDScgx22_dMzNCTf" alt="sapatilhas"></a>
                <section class="article-info">
                <p>40€</p>
                <p>Size</p>
                <p>Brand</p>
                <p>Condition</p>
                </span>
            </article>
            <article>
                <a href=""><img src="https://encrypted-tbn1.gstatic.com/shopping?q=tbn:ANd9GcS4zK3eemkv_6On3WPF10bU_QJgiFtulpcRd7FfBeTjLrHsWPB9JAM74v8iRwwXBYn299XR1ATIU3BgIrClPndrAxv0e3zev9XY0hi4pDScgx22_dMzNCTf" alt="sapatilhas"></a>
                <section class="article-info">
                <p>40€</p>
                <p>Size</p>
                <p>Brand</p>
                <p>Condition</p>
                </span>
            </article>
            
            <article id="More">           
                 <a href="">See all the 100 articles this user sells</a>
            </article>
            </section>

            <h2><a href="">Clothing</a></h2>
            <section id="articles">
            <article>
                <a href=""><img src="https://nude-project.com/cdn/shop/files/LOOKBOOK_CULT_18_0035.jpg?v=1696612637" alt="sapatilhas"></a>
                <section class="article-info">
                <p>40€</p>
                <p>Size</p>
                <p>Brand</p>
                <p>Condition</p>
                </section>
            </article>
            <article>
            <a href=""><img src="https://nude-project.com/cdn/shop/files/LOOKBOOK_CULT_18_0035.jpg?v=1696612637" alt="sapatilhas"></a>
                <section class="article-info">
                <p>40€</p>
                <p>Size</p>
                <p>Brand</p>
                <p>Condition</p>
                </section>
            </article>
            <article>
                <a href=""><img src="https://nude-project.com/cdn/shop/files/LOOKBOOK_CULT_18_0035.jpg?v=1696612637" alt="sapatilhas"></a>
                <section class="article-info">
                <p>40€</p>
                <p>Size</p>
                <p>Brand</p>
                <p>Condition</p>
                </section>
            </article>
            <article id="More">           
                 <a href="">See all the 100 articles this user sells</a>
            </article>
            </section>
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
            <section id = "U_info">
            
            <a href=""><img src="https://images.ctfassets.net/h6goo9gw1hh6/2sNZtFAWOdP1lmQ33VwRN3/24e953b920a9cd0ff2e1d587742a2472/1-intro-photo-final.jpg?w=1200&h=992&fl=progressive&q=70&fm=jpg" alt="profile picture"></a>
            <div class="name-container">
            <p>Jose Notário</p>
            <p><i class="fa-solid fa-star"></i> <i class="fa-solid fa-star"></i> <i class="fa-solid fa-star"></i> <span class="R">125</span></p>
            </div>
            <a href="">View more</a>
            </section>
            <section id="articles">
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
            <article id="More">           
                 <a href="">See all the 100 articles this user sells</a>
            </article>

            </section>
        </section>

        

    </main>
<?php output_footer();
?>
