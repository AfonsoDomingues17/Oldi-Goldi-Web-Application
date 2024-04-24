<?php
    function getAllBrands($db){
        $stmt = $db -> prepare('SELECT brand_name FROM Brands');
        $stmt->execute();
        $brands = $stmt->fetchAll();
        return $brands;
    }

    function getAllSizes($db){
        $stmt = $db -> prepare('SELECT * FROM Sizes');
        $stmt->execute();
        $sizes = $stmt->fetchAll();
        return $sizes;
    }
    function getAllCategories($db){
        $stmt = $db->prepare('SELECT category_name FROM Categories');
        $stmt->execute();
        $categories = $stmt->fetchAll();
        return $categories;
    }
    function getAllItems($db){
        $stmt = $db->prepare('SELECT * FROM Item');
        $stmt->execute();
        $items = $stmt->fetchAll();
        return $items;
    }

    function getAllConditions($db){
        $stmt = $db->prepare('SELECT condition_value FROM Conditions');
        $stmt->execute();
        $conditions = $stmt->fetchAll();
        return $conditions;
    }
    function getBrand($db, $brand_id){
        $stmt = $db->prepare('SELECT brand_name FROM Brands WHERE brand_id = ?');
        $stmt->execute(array($brand_id));
        $brand = $stmt->fetch();
        return $brand;
    }
    function getSize($db,$size_id){
        $stmt = $db->prepare('SELECT size_value FROM Sizes WHERE size_id = ?');
        $stmt->execute(array($size_id));
        $size = $stmt->fetch();
        return $size;
    }
    function getPhotos($db,$item_id){
        $stmt = $db->prepare('SELECT photo_url FROM Photos WHERE item_id = ?');
        $stmt->execute(array($item_id));
        $photos = $stmt->fetchAll();
        return $photos;
    }

    function getItem($db, $item_id) {
        $stmt = $db->prepare("SELECT * FROM Item WHERE ItemID = ?");
        $stmt->execute([$item_id]);
        return $stmt->fetch();
    }
    function getCategorie($db, $categorie_id) {
        $stmt = $db->prepare("SELECT * FROM Categories WHERE category_id = ?");
        $stmt->execute([$categorie_id]);
        return $stmt->fetch();
    }
    
    function getCondition($db, $condition_id) {
        $stmt = $db->prepare("SELECT condition_value FROM Conditions WHERE condition_id = ?");
        $stmt->execute([$condition_id]);
        return $stmt->fetch();
    }
    function Popular_categories($db){

        $stmt = $db->prepare("SELECT category_id, count(*) as Item_count FROM Item GROUP BY category_id ORDER BY Item_count DESC LIMIT 2");
        $stmt->execute();
        return $stmt->fetchAll();
    }
    function get_Items_ByCategory($db, $category_id){
        $stmt = $db->prepare("SELECT * FROM Item where category_id = ? LIMIT 5");
        $stmt->execute([$category_id]);
        return $stmt->fetchAll();
    }

    function getItemsBySize($db, $size_id){
        $stmt = $db->prepare('SELECT * FROM Item WHERE size_id = ?');
        $stmt->execute(array($size_id));
        $items = $stmt->fetchAll();
        return $items;
    }

    function getItemsByWhislist($db, $username){
        $stmt = $db->prepare('SELECT item_id FROM Whishlists WHERE username = ?');
        $stmt->execute(array($username));
        $items = $stmt->fetchAll();
        return $items;
    }

    function display_items($db, $items){
        foreach($items as $item) {?>
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
        <?php }
    }
    

   
?>