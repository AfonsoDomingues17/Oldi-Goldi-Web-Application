<?php 
require_once('database/connection.php');
require_once('database/categories.php');
$db = getDatabaseConnection();
$categories = getAllCategories($db);

function display_categories($categories){
?>

<ul id="Category_filters">
    <?php foreach($categories as $categorie){?>
            <li><a href = ""><?= $categorie['category_name']?></a></li>
    <?php } ?>
        </ul>
       
</header>

<?php }?>