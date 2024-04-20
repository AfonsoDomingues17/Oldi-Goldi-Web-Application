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

<main>
    <a href="edit_profile.php">Edit your profile</a>
    <a href="">Mensagem</a>
    <section id="Info">
        <img src="" alt="profile picture">
        <p>Marcus Aurelio</p>
        <p>marquinhosrelampago77</h3>
        <p><i class="fa-solid fa-location-dot"></i> Alhos Vedros, Portugal</p>
        <p>Eu sou um personal treiner na zona de lisboa que recebjjj...</p>
    
    </section>
    <section id="Personal Info">
        <h3>Personal Info</h3>
        <span class="email">aureliomadureira@gmail.com</span>
        <span class="phonenumber">+351 999 456 778</span>
        <span class="address">Rua José Regio, N8, 3ºDto, Alhos Vedros 2860-113</span>
        
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
