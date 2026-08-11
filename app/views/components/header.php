<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ukay-Ukay</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link href="/public/assets/css/style.css" rel="stylesheet">
</head>
<body class="bg-light text-body">
    <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom">
        <div class="container">
            <a class="navbar-brand fw-bold" href="/">Ukay-Ukay</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu" aria-controls="navMenu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navMenu">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="/app/views/auth/login.php">Login</a></li>
                    <li class="nav-item"><a class="nav-link" href="/app/views/auth/register.php">Register</a></li>
                </ul>
                <div class="mt-auto">
                    <form method="POST" action="../controllers/logout.php"
                            onsubmit="const btn=this.querySelector('button[type=submit]'); btn.disabled=true; btn.innerText='Signing out...'; return true;">
                        <input type="hidden" name="logout" value="true">
                        <button type="submit" class="btn btn-outline-light text-red w-100 d-flex align-items-center justify-content-center justify-content-md-start" style="background-color: red;">
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </nav>