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

<aside id="Filters">
    <h3>Filters</h3>
    <form>
        <details>
            <summary>Size <i class="fa-solid fa-chevron-down"></i></summary>
            <section id="sizeSection">
                <input type="checkbox" id="size1" name="size1">
                <label for="size1">Size 1</label><br>
                <!-- Add more sizes as needed -->
            </section>
        </details>

        <details>
            <summary>Brand <i class="fa-solid fa-chevron-down"></i></summary>
            <section id="brandSection">
                <input type="checkbox" id="brand1" name="brand1">
                <label for="brand1">Brand 1 </i></label><br>
                <!-- Add more brands as needed -->
            </section>
        </details>   
    </form>
</aside>

    <!-- Items for sale -->
    <main>
        <h1>Items for Sale</h1>
        <?php foreach($items as $item) {?>
        <article class="item">
            <?php $photos = getPhotos($db,$item['ItemID']);?>
            <img src=<?= $photos[0]['photo_url']?> alt="Item 1">
            <h2><?= $item['item_name']?></h2>
            <p><?= $item['price']?></p>
            <p><?php $brand = getBrand($db,$item['brand_id']);
            echo $brand['brand_name'];?></p>
            <p><?php $size = getSize($db,$item['size_id']);
            echo $size['size_value'];?></p>
        </article>
        <?php } ?>
        <!-- Add more items as needed -->
    </main>
    <?php output_footer();
?>
