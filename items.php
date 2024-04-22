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
    $items = getAllItems($db);


?>

<main>

    
    <!-- Items for sale -->
    <section class="items">
        <aside id="Filters">
            <h3>Filters</h3>
            <form>
                <details>
                    <summary>Size <i class="fa-solid fa-chevron-down"></i></summary>
                    <section id="sizeSection">
                        <label><input type="checkbox" id="size1" name="size1">S</label>
                        <label><input type="checkbox" id="size1" name="size1">M</label>
                        <label><input type="checkbox" id="size1" name="size1">L</label>
                        <label><input type="checkbox" id="size1" name="size1">XL</label>
                    </section>
                </details>

                <details>
                    <summary>Brand <i class="fa-solid fa-chevron-down"></i></summary>
                    <section id="brandSection">
                        <label><input type="checkbox" id="brand1" name="brand1">cartier</label>
                        <label><input type="checkbox" id="brand1" name="brand1">Gucci</label>
                        <label><input type="checkbox" id="brand1" name="brand1">Nike</label>
                        <label><input type="checkbox" id="brand1" name="brand1">Adidas</label>
                    </section>
                </details>
            </form>
        </aside>
        <section id="Item_for_sell">
            <section class = "heading">
                <h1>Items for Sale</h1>
                <div id="action_buttons">
                    <p id="Show_Filter">Hide filters <i class="fa-solid fa-sliders"></i></p>

                    <div id="dropdownContainer">
                        <p id="orderBy">Order by <i class="fa-solid fa-chevron-down"></i></p>
                        <section id="dropdownMenu" class="dropdown-menu">
                            <a href="#">Preço: Ascendente</a>
                            <a href="#">Preço: Descendente</a>
                            <a href="#">Mais Recente</a>
                        </section>
                    </div>
                </div>
            </section>
            <section id="Garticles">
                <?php foreach($items as $item) {?>
                    <article>
                        <?php $photos = getPhotos($db, $item['ItemID']);?>
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
                                <p><?= $condition['condition_value']?></p>
                            <?php } ?>
                        </section>
                    </article>
                <?php } ?>
            </section>
        </section>
    </section>
</main>

<?php output_footer();