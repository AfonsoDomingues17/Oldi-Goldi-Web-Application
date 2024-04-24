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
    $sizes = getAllSizes($db);
    $conditions = getAllConditions($db);

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
                        <?php foreach($sizes as $size) {?>
                        <label><input type="checkbox" id="size1" name="size1" data-size-id="<?= $size['size_id'] ?>"><?= $size['size_value']?></label>
                        <?php }?>
                    </section>
                </details>

                <details>
                    <summary>Brand <i class="fa-solid fa-chevron-down"></i></summary>
                    <section id="brandSection">
                        <?php foreach($brands as $brand) {?>
                        <label><input type="checkbox" id="brand1" name="brand1" data-brand-id="<?= $brand['brand_id'] ?>"><?= $brand['brand_name']?></label>
                        <?php }?>
                    </section>
                </details>
                <details>
                    <summary>Condition <i class="fa-solid fa-chevron-down"></i></summary>
                    <section id="ConditionSection">
                        <?php foreach($conditions as $condition) {?>
                        <label><input type="checkbox" id="condition1" name="condition1" data-condition-id="<?= $condition['condition_id'] ?>"><?= $condition['condition_value']?></label>
                        <?php }?>
                    </section>
                </details>
                <details>
                    <summary>Category<i class="fa-solid fa-chevron-down"></i></summary>
                    <section id="CategorySection">
                    <?php foreach($categories as $category) {?>
                        <label><input type="checkbox" id="category1" name="category1" data-category-id="<?= $category['category_id'] ?>"><?= $category['category_name']?></label>
                        <?php }?>
                    </section>
                </details>
                <details>
                    <summary>Price<i class="fa-solid fa-chevron-down"></i></summary>
                    <section id="PriceSection">
                        <label>From:<input type="number" id="Sprice"></label><br>
                        <label>To:<input type="number" id="Finalprice"></label>

                        
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
                <?php display_items($db, $items); ?>
            </section>
        </section>
    </section>

</main>

<?php output_footer();