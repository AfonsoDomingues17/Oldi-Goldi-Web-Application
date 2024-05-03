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
$user = getUser($db,$_GET['username']);
?>

<main id = "edit_profile_main">
    <section class="edit">
    <h1>Update your profile</h1>
        <form method="post" action="action_update_profile.php" id="edit_profile " enctype="multipart/form-data">
            <section id="update_profile">
            <section id="user_picture">
                <h2>Your picture</h2>
            <img id="profilePicture" src="<?=$user['photo_url']?>" alt="profile picture">
            <input type="hidden" id="hidden_input" name="imgSrc" value="">
            <input type="file" id="fileInput">
            <label>About you: <textarea name="description" id="About_you" placeholder="Let everyone know more about you!"><?= $user['description']?></textarea></label>
            </section>
        
            <section id="user_details">
                <h2>User Details</h2>
                <label>Email: <input type="text" value="<?= $user['email']?>" name="email" id="email"></label>
                <label>Name: <input type="text" value="<?= $user['name']?>" name="name" id="name"></label>
                <label>Phone Number: <input type="text" value="<?= $user['phone_number']?>" name="pn" id="pn"></label>
            </section>
            <section id="shipping">
                <h2>Shipping Information</h2>

                <label>Adress: <textarea name="address" id="address"><?= $user['Adress']?></textarea></label>
                <label>Zip-Code: <input type="text" value="<?= $user['Zip_code']?>" name="ZP" id="XP"></label>
                <label>Country: <input type="text" value="<?= $user['Country']?>" name="Country" id="Country"></label>
                <label>City: <input type="text" value="<?= $user['Cidade']?>" name="City" id="City">
            </section>
        </section>
        <button type="submit">Update Profile</button>

    </form>
    </section>
    
</main>

<?php output_footer();
?>