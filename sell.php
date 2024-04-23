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

<h1>Sell an Item</h1>
<section id="item_photos">
    <form action="upload_photo.php" method="post" enctype="multipart/form-data">
        <label><input type="file" name="photo" accept="image/png,image/jpeg" multiple></label>
    </form>
    <img src="" alt="uploaded image">
    <form action="">
        Item Name:<label><input type="text" required></label><br>
        Description:<label><textarea></textarea></label><br>
        Size:<label><input type="text"></label><br>
        Brand:<label><input type="text"></label><br>
        Condition:<label><input type="text"></label><br>
        <select name="Sell_Categories" required>
            <option value="Begin" selected>Select a Categorie</option>
            <option value="Clothing">Clothing</option>
            <option value="Shoewear">Shoewear</option>
            <option value="Sweatshirts">Sweatshirts</option>
            <option value="Trousers">Trousers</option>
        </select><br>
        Price:<label><input type="number" placeholder="€ 0,00"redquired></label><br>
        <button type="submit">Sell</button>
    </form>
</section>

</main>