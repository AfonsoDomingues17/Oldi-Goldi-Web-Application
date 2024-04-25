<?php 
require_once('database/connection.php');
require_once('database/categories.php');
require_once('templates/common.php');
require_once('templates/display_categories.php');
require_once('action_get_user.php');

$db = getDatabaseConnection();
$categories = getAllCategories($db);
$brands = getAllBrands($db);
output_header();
display_categories($categories);
$loggedUser = $_SESSION['username'];
$pageOwner = $_GET['username'];
$user = getUserByUsername($db, $pageOwner);
?>

<main id = "user_profile">
    <section id="Info">
        <section class="user_profile_picture">
            <img src="<?php echo $user['photo_url']?>" alt="profile picture">
        </section>
        <section class="user_profile_details">
            <p id="user_name"><?php echo $user['name']; ?></p>
            <p id="user_username"><?php echo $user['username']; ?></p>
            <p><i class="fa-solid fa-location-dot"></i> <?php echo $user['Cidade']?>, <?php echo $user['Country']?></p>
            <p><?php echo $user['description']?></p>
            <?php if ($loggedUser != $pageOwner):?>
                <a href="">Message <?php echo $user['name']; ?></a>
            <?php endif; ?>
            <?php if ($loggedUser == $pageOwner):?>
                <a href="edit_profile.php">Edit your profile</a>
            <?php endif; ?>
        </section>
    </section>
    <section id="Personal_Info">
        <?php if ($loggedUser == $pageOwner):?>
            <h3>Contacts</h3>
            <span class="email"><i class="fa fa-envelope" aria-hidden="true"></i> <?php echo $user['email']?></span>
            <span class="phonenumber"><i class="fa fa-phone" aria-hidden="true"></i> <?php echo $user['phone_number']?></span>
            <span class="address"><i class="fa fa-home" aria-hidden="true"></i> <?php echo $user['Adress']?></span>
            <span class="zip_code"><?php echo $user['Zip_code']?></span>
        <?php endif; ?>
    </section>
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
    <section id="articles">
        <h1>Items to Sell</h1>
        <p>1247articles</p>
        <article>
            <img src="" alt="item">
            <p>250€</p>
            <p>size</p>
            <p>brand</p>
            <p>condition</p>
        </article>
    </section>
    <section id="Reviews">
        <h1>Reviews</h1>
        <p>5.0 (1700)</p>
        <article >
            <a href=""><img src="" alt="profile picture of users">
            <a href=""><span class="author">Francisco Teixeira</span></a>
            <span class="date">1d</span>
            <p>reviews stars</p>
            <p>Recomendo esta tudo perfeito, chegou tudo direitinho. Simplesmente perfeito!</p>
        </article>
    </section>
</main>

<?php output_footer();
?>
