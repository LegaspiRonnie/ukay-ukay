<?php
require_once '../../classes/Session.php';
isUserAuth();

include 'components/header.php';
?>

<header>
    
</header>

<div class="d-flex container mt-5">


    <main id="mainContent" class="main-content flex-grow-1 ">

        <?php include 'components/alert.php'; ?>

        <section class="container-fluid">
            <?php include 'components/tables/products_table.php'; ?>
        </section>

    </main>
    
        <!-- Logout -->
    

</div>

<footer>
    <?php include 'components/footer.php';  ?>
</footer>