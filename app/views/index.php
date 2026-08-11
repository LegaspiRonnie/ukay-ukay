<?php
    require_once '../../classes/Session.php';
    isUserAuth();
    include 'components/header.php';
?>

<?php
     echo "this is the welcome page/index";
?>

<?php if (!empty($_SESSION['message_type']) && !empty($_SESSION['message'])): ?>
    <div class="alert alert-<?= $_SESSION['message_type'] === 'error' ? 'danger' : 'success' ?>" role="alert">
        <?= htmlspecialchars($_SESSION['message']) ?> <p> Welcome User no.<?=  htmlspecialchars($_SESSION['user_id']) ?></p>
    </div>
    <?php unset($_SESSION['message'], $_SESSION['message_type']); ?>
<?php endif; ?>

<form method="POST" action="../controllers/logout.php">
    <input type="hidden" name="logout" value="true"/>
    <button type="submit">Logout</button>

</form>

<?php
    include 'components/footer.php'
?>