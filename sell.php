<?php 
require_once('database/connection.php');
require_once('database/categories.php');
require_once('templates/common.php');
require_once('templates/display_categories.php');

$db = getDatabaseConnection();
$categories = getAllCategories($db);
$brands = getAllBrands($db);
output_header($db);
display_categories($categories);

$item_id = $_GET['item_id'];
$item = getItem($db,$item_id);
$size = getSize($db,$item['size_id']);
$brand = getBrand($db,$item['brand_id']);
$photos = getPhotos($db,$item_id);
?>

<main id="SellItem">

<h1>Sell an Item</h1>
<section id="item_photos">
    <form action="action_sell_item.php" method="post" enctype="multipart/form-data">
        <section id="img_container">
            
            <?php foreach($photos as $photo){ ?>  
                <div class="img-wrapper">
                <img src="<?=$photo['photo_url']?>" width="200" height="200" alt="item photo">
                <i class="fa-solid fa-xmark"></i>
                </div>
            <?php } ?>
        </section>
        <label><input type="file" name="photo" id="item_img" accept="image/png,image/jpeg" multiple></label><br>
        <input type="hidden" id="item_hidden_input" name="img_URL" value="" >
        <input type="hidden" id="id_user_item" name="item_id" value="<?=$item_id?>">
        Item Name:<label><input type="text" name="item_name" value="<?=$item['item_name'] ?>" required></label><br>
        Description:<label><textarea name="item_description"><?=$item['description'] ?></textarea></label><br>

        Size:
        <select name="Sell_Size" >
        <option value="Nosize" selected>No Size</option>
            <?php $sizes = getAllSizes($db);
            foreach($sizes as $size) {
                if($size['size_id'] == $item['size_id']){?>
                    <option value="<?=$size['size_value'] ?>" selected><?=$size['size_value'] ?></option>
                <?php } else {?>
                    <option value="<?=$size['size_value'] ?>"><?=$size['size_value'] ?></option>
                    <?php } ?>
            <?php } ?>
        </select><br>

        Brand:<label><input type="text" name="item_brand" value="<?=$brand['brand_name'] ?>"></label><br>

        Condition:
        <select name="Sell_Conditions" required>
            <?php $conditions = getAllConditions($db);
            foreach($conditions as $condition) {
                if($condition['condition_id'] == $item['condition_id']){?>
                    <option value="<?=$condition['condition_value'] ?>" selected><?=$condition['condition_value'] ?></option>
                <?php } else {?>
                    <option value="<?=$condition['condition_value'] ?>"><?=$condition['condition_value'] ?></option>
                    <?php } ?>
            <?php } ?>
        </select><br>
        Category:
        <select name="Sell_Categories" required>
            <?php $categories = getAllCategories($db);
            foreach($categories as $category) {
            if($category['category_id'] == $item['category_id']){?>
                    <option value="<?=$category['category_name'] ?>" selected><?=$category['category_name'] ?></option>
                <?php } else {?>
                    <option value="<?=$category['category_name'] ?>"><?=$category['category_name'] ?></option>
                    <?php } ?>
            <?php } ?>
        </select><br>
        Price:<label><input type="number" value="<?= $item['price'] ?>" name="item_price" placeholder="€ 0,00"redquired></label><br>
        <?php if(isset($item_id)) {
        ?>
        <button type="submit">Confirm Changes</button>
        <?php } else { ?>
        <button type="submit">Sell</button>
        <?php } ?>
    </form>
</section>

</main>