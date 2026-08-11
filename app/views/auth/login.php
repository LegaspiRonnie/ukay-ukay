<?php
    include '../components/header.php';
    include '../components/alert.php';
    require_once '../../../classes/Session.php'; 
?>
<main class="d-flex align-items-center justify-content-center min-vh-100 bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-4">
                <?php include '../components/alert.php'; ?>

                <div class="card shadow-sm auth-card">
                    <div class="text-center mt-3"><h2 class="h5 mb-0">Login</h2></div>
                    <div class="card-body">
                        <form method="post" action="../../controllers/login.php" onsubmit="const btn=this.querySelector('button[type=submit]'); btn.disabled=true; btn.innerText='Signing in...'; return true;">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email address</label>
                                <input name="email" type="email" class="form-control" id="email" aria-describedby="emailHelp" required autofocus>
                                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input name="password" type="password" class="form-control" id="password" required>
                            </div>

                            <div class="d-grid">
                                <button name="submit" type="submit" class="btn btn-primary">Sign in</button>
                            </div>
                            <div class="d-grid mt-2">
                                <p>Dosen't have an account? <a href="register.php">Click here</a></p>
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
