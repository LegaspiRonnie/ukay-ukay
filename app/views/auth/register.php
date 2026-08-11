<?php
    include '../components/header.php';
    require_once '../../../classes/Session.php'; 
?>
<main class="d-flex align-items-center justify-content-center min-vh-100 bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-4">
                <?php if (!empty($_SESSION['message_type']) && !empty($_SESSION['message'])): ?>
                    <div class="alert alert-<?= $_SESSION['message_type'] === 'error' ? 'danger' : 'success' ?>" role="alert">
                        <?= htmlspecialchars($_SESSION['message']) ?>
                    </div>
                    <?php unset($_SESSION['message'], $_SESSION['message_type']); ?>
                <?php endif; ?>

                <div class="card shadow-sm">
                    <div class="text-center mt-3"><h2 class="h5 mb-0">Register</h2></div>
                    <div class="card-body">
                        <form method="post" action="../../controllers/register.php">
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input name="username" type="text" class="form-control" id="username" aria-describedby="usernameHelp" required autofocus>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email address</label>
                                <input name="email" type="email" class="form-control" id="email" aria-describedby="emailHelp" required autofocus>
                                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input name="password" type="password" class="form-control" id="password" required>
                            </div>
                            <div class="mb-3">
                                <label for="confirm_password" class="form-label">Confirm password</label>
                                <input name="confirm_password" type="password" class="form-control" id="confirm_password" required>
                            </div>

                            <div class="d-grid">
                                <button name="submit" type="submit" class="btn btn-primary">Sign in</button>
                            </div>
                            <div class="d-grid mt-2">
                                <p>Already have and account? <a href="login.php">Click here</a></p>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php
    include '../components/footer.php'
?>
