<?php 
function display_categories($categories){
?>

<input type="checkbox" id="hamburger"> 
<label class="hamburger" for="hamburger"></label>

<ul id="Category_filters">
    <?php foreach($categories as $categorie){?>
            <li><a href = "items.php?category_id=<?= urlencode($categorie['category_id']) ?>"><?= $categorie['category_name']?></a></li>
    <?php } ?>
        </ul>
       
</header>

<?php }?>