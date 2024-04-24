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

<main id = "edit_profile_main">
    <section class="edit">
    <h1>Update your profile</h1>
        <form action="" id="edit_profile">
            <section id="update_profile">
            <section id="user_picture">
                <h2>Your picture</h2>
            <img src="https://picsum.photos/200/300" alt="profile picture">
            <label>About you: <textarea name="About you" id="About_you" placeholder="Let everyone know more about you!"></textarea></label>
            </section>
        
            <section id="user_details">
                <h2>User Details</h2>
                <label>Username: <textarea name="username" id="username"></textarea></label>
                <label>Email: <textarea name="username" id="username"></textarea></label>
                <label>Name: <textarea name="username" id="username"></textarea></label>
                <label>Phone Number: <textarea name="phonenumber" id="phonenumber"></textarea></label>
                <label>New Password: <input type="password" name="npassword"></label>
                <label>Confirm new Password: <input type="password" name = "cnpassword"></label>
            </section>
            <section id="shipping">
                <h2>Shipping Information</h2>

                <label>Adress: <textarea name="username" id="username"></textarea></label>
                <label>Zip-Code: <textarea name="username" id="username"></textarea></label>
                <label>Country: <textarea name="username" id="username"></textarea></label>
                <label>City: <textarea name="username" id="username"></textarea></label>
            </section>
        </section>
        <button type="submit">Update Profile</button>

    </form>
    </section>
    
</main>

<?php output_footer();
?>