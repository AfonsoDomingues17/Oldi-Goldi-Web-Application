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
<section id="Wlist">
<h1>Wish List</h1>
<section id="Garticles">
<?php 
$items = getItemsByWhislist($db, $_SESSION['username']);
foreach($items as $Witem){ 
    $item = getItem($db,$Witem[0]);
    ?>
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
        <p id="heart"><?= $condition['condition_value']?> <i class="fa-regular fa-heart" data-item-id="<?= $item['ItemID'] ?>"></i></p>
    <?php } ?>
    </section>
</article>

<?php }?>
           
            
    </section>
</section>
<script src="script.js" defer></script>
</main>