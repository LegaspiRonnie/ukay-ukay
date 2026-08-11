<?php if (!empty($_SESSION['message_type']) && !empty($_SESSION['message'])): ?>
    <div class="alert alert-<?= $_SESSION['message_type'] === 'error' ? 'danger' : 'success' ?>" role="alert">
        <?= htmlspecialchars($_SESSION['message']) ?></p>
    </div>
    <?php unset($_SESSION['message'], $_SESSION['message_type']); ?>
<?php endif; ?>