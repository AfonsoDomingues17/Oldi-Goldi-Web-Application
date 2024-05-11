<?php 
require_once('database/connection.php');
require_once('database/categories.php');
require_once('database/users.php');
require_once('templates/common.php');

$db = getDatabaseConnection();
output_header($db);
$category = getAllCategories($db);
$brands = getAllBrands($db);
$conditions = getAllConditions($db);
$sizes = getAllSizes($db);
$users = getAllUsers($db);
$transactions = getAllTransactions($db);
?>

<main>

<h1>Admin Page</h1>

    <Section id="Insertions">
        <section id="AddCategory">
            <h2>Add Category</h2>
            <form>
                <ul id="CategoriesAdmin">
                <?php foreach($category as $cat){ ?>
                    <li><?= $cat['category_name']?></li>
                <?php } ?>
                </ul>
                <label>New Category: <input type="text" id="new_category" name="category_name" required></label><br>
                <button id="AS">Add Category</button>
            </form>
        </section>
        <section id="AddBrand">
            <h2>Add Brand</h2>
            <form>
                <ul id="BrandsAdmin">
                <?php foreach($brands as $brand){ ?>
                    <li><?= $brand['brand_name']?></li>
                <?php } ?>
                </ul>
                <label>New Brand: <input type="text" id="new_brand" name="brand_name" required></label><br>
                <button id="AS">Add Brand</button>
            </form>
        </section>

        <section id="AddCondtion">
            <h2>Add Condition</h2>
            <form>
                <ul id="ConditionsAdmin">
                <?php foreach($conditions as $condition){ ?>
                    <li><?= $condition['condition_value']?></li>
                <?php } ?>
                </ul>
                <label>New Condition: <input type="text" id="new_condition" name="condition_value" required></label><br>
                <button id="AS">Add Condition</button>
            </form>
        </section>

        <section id="AddSize">
            <h2>Add Size</h2>
            <form>
                <ul id="SizesAdmin">
                <?php foreach($sizes as $size){ ?>
                    <li><?= $size['size_value']?></li>
                <?php } ?>
                </ul>
                <label>New Size: <input type="text" id="new_size" name="size_value" required></label><br>
                <button id="AS">Add Size</button>
            </form>
        </section>
    </Section>
    <section id="Users">
        <h2>Users</h2>
        <ul>
        <?php foreach($users as $user){ 
            if($user['username'] != $_SESSION['username']){?>
            <a href="profile.php?username=<?= $user['username'] ?>"><li><img width="50" height="50" src="<?= $user['photo_url'] ?>" alt="profile_picutre">
              <p><?= $user['username']?>(<?= $user['name'] ?>)</p>
              <p>Item for Sale: <?= NumberItemForSale($db,$user['username'])  ?></p>
              <p>Items Sold: <?= NumberItemsSold($db,$user['username']) ?></p>
        </li></a>
        <?php } ?>
        <?php } ?>
        </ul>
    </section>

    <section id="Transactions">
        <h2>Transactions</h2>
        <ul>
            <?php foreach($transactions as $transaction){ 
                $item = getSoldItem($db,$transaction['item_id']);
                echo $item['item_name'];
                $new_price = getNewPrice($db,$_SESSION['username'],$transaction['item_id']);
                ?>
            <li>
                <p>Buyer: <?= $transaction['buyer'] ?></p>
                <p>Seller: <?= $transaction['seller'] ?></p>
                <p>Item: <?= $item['item_name'] ?></p>
                <?php if($new_price) {?>
                <p>Price: <?= $new_price?>€</p>
                <?php } else { ?>
                    <p>Price: <?= $item['price'] ?>€</p>
                <?php } ?>
                <p>Date: <?= $transaction['transaction_date'] ?></p>
            </li>
            <?php } ?>
        </ul>
    </section>




</main>