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
    <h2>Register</h2>
    <form action="action_register.php" method="post">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" required><br>
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" required><br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br>
        <label>Phone number: <input type="text" name="phonenumber" required></label><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br><br>
        <label>Confirm Password: <input type="password" name="cpassword" required></label><br>
        <button type="submit">Register</button>

    
        
      
    </form>
</section>


<?php output_footer();?>