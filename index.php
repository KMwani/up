<?php
require 'header.php';
?>
<main>
    <div class="para">
        <?php
        if(isset($_SESSION['id'])){
            echo '<p class="logged">You are logged in!</p>';
        }
        else{
            echo '<p class="unlogged">You are logged out!</p>';
        }
        ?>


</div>
</main>