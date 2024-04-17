<?php
    require_once('database/connection.php');
    require_once('database/categories.php');
    require_once('templates/common.php');
    require_once('templates/display_categories.php');

    $db = getDatabaseConnection();
    $categories = getAllCategories($db);
    output_header();
    display_categories($categories);
?>


<section>
    <h2>Login</h2>
    <form action="action_login.php" method="post">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" required><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br><br>
        <button type="submit">Login</button>
    </form>
</section>


<?php output_footer();?>
