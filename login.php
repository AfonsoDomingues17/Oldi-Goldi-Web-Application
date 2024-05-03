<?php
    require_once('database/connection.php');
    require_once('database/categories.php');
    require_once('templates/common.php');
    require_once('templates/display_categories.php');

    $db = getDatabaseConnection();
    $categories = getAllCategories($db);
    output_header($db);
    display_categories($categories);
?>

<section id="login_register" >
    <article id="login_txt">
        <h1>Welcome Back!</h1>
        <p>To keep connected with us please login with your personal info</p>
    </article>
    <article id="form-container login">
        <form id="login_action" action="action_login.php" method="post">
            <input type="text" id="username" name="username" placeholder = "Username" required><br>
            <input type="password" id="password" name="password" placeholder="Password" required><br><br>
            <p id="message_error_login"></p>
            <button  id="log_button" type="submit">Login</button>
        </form>
    </article>
</section>



<?php output_footer();?>
