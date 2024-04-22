<?php
require_once('database/connection.php');
require_once('templates/common.php');
require_once('database/categories.php');

$db = getDatabaseConnection();

if (isset($_GET['item_id'])) {
    $item_id = $_GET['item_id'];
    output_header();
    display_item($db, $item_id);
    output_footer();
} else {
    header('Location: index.php');
    exit();
}

function display_item($db, $item_id) {
    $item = getItem($db, $item_id);
    $photos = getPhotos($db, $item_id);
    $brand = getBrand($db, $item['brand_id']);
    $size = getSize($db, $item['size_id']);

    echo '<section class="product">';
        echo '<article class="product-image">';
            if (!empty($photos)) {
                echo '<img src="'. htmlspecialchars($photos[0]['photo_url']). '" alt="'. htmlspecialchars($item['item_name']). '">';
            } else {
                echo '<img src="placeholder.jpg" alt="No Image Available">';
            }
        echo '</article>';
        echo '<article class="product-details">';
            echo '<h1 class="product-name">'. htmlspecialchars($item['item_name']). '</h1>';
            echo '<p class="product-price">'. htmlspecialchars($item['price']). '€</p>';
            echo '<p class="product-description">'. htmlspecialchars($item['description']). '</p>';
            if (is_array($brand)) {
                echo '<p class="product-brand">Brand: '. htmlspecialchars($brand['name']). '</p>';
            }
            if (is_array($size)) {
                echo '<p class="product-size">Size: '. htmlspecialchars($size['size_value']). '</p>';
            }
            echo '<div class="product-actions">';
                echo '<button class="btn btn-primary">Add to Cart</button>';
                echo '<button class="btn btn-secondary"><i class="fas fa-heart"></i> Favorite</button>';
            echo '</div>';
        echo '</article>';
    echo '</section>';
}
?>