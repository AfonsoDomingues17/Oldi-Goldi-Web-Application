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
    $cat_display = $_GET['category_id'];
    $brand_display = $_GET['brand_id'];
    $searchTerm = $_GET['input'];
?>

<main>

    
    <!-- Items for sale -->
    <section class="items">
        <aside id="Filters">
            <h3>Filters</h3>
            <?php if(isset($searchTerm)){ ?>
            <section class="search-term-container">
                <span class="search-term"><?= htmlspecialchars($searchTerm) ?></span>
                <span class="remove-search-term"><i class="fa-solid fa-xmark"></i></span>
            </section>
            <?php }?>
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
                        <?php foreach($brands as $brand) {
                            if($brand_display == $brand['brand_id']){ ?>
                            <label><input type="checkbox" id="brand<?= $brand['brand_id']?>" name="brand1" data-brand-id="<?= $brand['brand_id'] ?>" checked><?= $brand['brand_name']?></label>
                          <?php } else {?>
                        <label><input type="checkbox" id="brand<? $brand['brand_id']?>" name="brand1" data-brand-id="<?= $brand['brand_id'] ?>"><?= $brand['brand_name']?></label>
                        <?php } ?>
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
                    <?php foreach($categories as $category) {
                        if($category['category_id'] == $cat_display){ ?>
                            <label><input type="checkbox" id="category<?= $category['category_id']?>" name="category1" data-category-id="<?= $category['category_id'] ?>" checked><?= $category['category_name']?></label>
                        <?php } else {?>
                        <label><input type="checkbox" id="category1" name="category<?= $category['category_id']?>" data-category-id="<?= $category['category_id'] ?>"><?= $category['category_name']?></label>
                        <?php } ?>
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
                <?php if(isset($cat_display)){
                    $items = get_Items_ByCategory($db, $cat_display);
                    
                }
                else if(isset($brand_display)){
                    $items = getItemsByBrand($db,$brand_display);
                    
                }
                else if(isset($searchTerm)){
                    $items = get_Items_ByName($db,$searchTerm);
                }
                
                display_items($db, $items);?>
            </section>
        </section>
    </section>

</main>
<?php output_footer(); ?>

