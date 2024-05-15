<?php 
require_once('database/connection.php');
require_once('database/categories.php');
require_once('database/users.php');
require_once('templates/common.php');
require_once('templates/display_categories.php');

$db = getDatabaseConnection();
$categories = getAllCategories($db);
$brands = getAllBrands($db);
output_header($db);
display_categories($categories);
$pageOwner = $_GET['username'];
if(isset($pageOwner))$user = getUser($db,$pageOwner);
else $user = getUser($db,$_SESSION['username']);

$permissions = getUserPermissions($db,$_SESSION['username']);
?>

<main id = "user_profile">
    <section id="passwordPopUp" class="PopUp">

    <!-- Modal content -->
    <section class="PopUpcontent">
    <span id="close" class="close">&times;</span>
    <h2>Change Password</h2>
    <form id="passwordForm" action="update_password.php" method="post">
        <label>Current Password: <input type="password" name="cpassword" required></label><br>
        <label>New Password: <input type="password" name="npassword"></label><br>
        <label>Confirm new Password: <input type="password" name = "cnpassword"></label><br>
        <p id="message_error"></p>
        <button id="ConfirmChangesBtn">Confirm Changes</button>
    </form>
    </section>
    </section>
    <section id="deleteUserPopUp">
    <section id="DeletePopUpcontent">
        <span id="closeDeleteUser" class="close">&times;</span>
        <h2>Delete User</h2>
        <p>Are you sure you want to delete this user?</p>
        <form action="action_profile.php" method="post">
            <input type="hidden" name="user" value="<?= $user['username']?>">
            <input type="hidden" name="action" value="delete">
            <button id="confirmDeleteUser">Yes, Delete User</button>
            <button id="cancelDeleteUser">No, Cancel</button>
        </form>
        
    </section>
    </section>
    <section id="Info">
        <section class="user_profile_picture">
            <img src="<?= $user['photo_url']?>" alt="profile picture">
        </section>
        <section class="user_profile_details">
            <p id="user_name"><?= $user['name']; ?></p>
            <?php if($user['isAdmin']){ ?>
                <p id="user_username"><?= $user['username']; ?>(Admin)</p>
            <?php } else {?>
            <p id="user_username"><?= $user['username']; ?></p>
            <?php } ?>
            <?php if(isset($user['Cidade']) || isset($user['Country'])){ ?><p><i class="fa-solid fa-location-dot"></i> <?= $user['Cidade']?>, <?= $user['Country']?></p> <?php } ?>
            <p><?= $user['description']?></p>
            <?php if (isset($pageOwner) && !$user['isAdmin'] && $permissions){?>
                <form action="action_profile.php" method="post">
                    <input type="hidden" name="user" value="<?= $user['username'] ?>">
                    <input type="hidden" name="action" value="elevate">
                    <button id="ElevateUser">ElevateUserToAdmin</button>
                </form>
                <button id="DeleteUSer">Delete User</button>
            <?php } else if(!isset($pageOwner)){?>
                <a href="edit_profile.php?username=<?=$_SESSION['username']?>" id="EditProfileButton">Edit your profile</a>
                <button id="changePasswordBtn">Change Password</button>
            <?php }
            ?>
        </section>
    </section>
    <?php if(!isset($pageOwner) || $permissions){?>
    <section id="Info_StartSelling">
        <section id="Personal_Info">
                <h3>Contacts</h3>
                <span class="email"><i class="fa fa-envelope" aria-hidden="true"></i> <?=$user['email']?></span>
                <span class="phonenumber"><i class="fa fa-phone" aria-hidden="true"></i> <?= $user['phone_number']?></span>
                <span class="address"><i class="fa fa-home" aria-hidden="true"></i> <?= $user['Adress']?></span>
                <span class="zip_code"><?= $user['Zip_code']?></span>
        </section>
    <?php }?>
    <!--
    <section id="orders">
        <h2>Order History</h2>
        <ol>
            <li> Order: 1


            </li>
            
        </ol>
    </section>
    -->
    <!-- Só aparece se o perfil for da pessoa logada -->
    <?php $user_items = getItemsBySeller($db, $user['username']);
    if(count($user_items) < 1){ ?>
    <section id="ProfileStartSelling">
         <?php   if(!isset($pageOwner)) {?>
        <h3>List items to start selling</h3>
        <a href="sell.php" id="SellNowButton">Sell Now</a>
        <?php } else {?>
            <h3>This user has no items for sale</h3>
        <?php }?>
    </section>
    </section>
    
   <?php } 
    foreach($user_items as $item) {?>
            <section id="Garticles">
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
                    <p id="heart"><?= $condition['condition_value']?> 
                   <?php if(isset($pageOwner)){ if(isset($_SESSION['username'])){?> <i class="<?= isOnwhishlist($db,$item['ItemID'],$_SESSION['username'])? 'fa-solid fa-heart' : 'fa-regular fa-heart'?>" data-item-id="<?= $item['ItemID'] ?>">
                </i>
                <?php } }?>
            </p>
                <?php } ?>
                </section>
            </article>
        <?php }?>
            </section>
  
</main>

<?php output_footer();
?>
