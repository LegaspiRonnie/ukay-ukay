

    <!-- Logout -->
    <div class="mt-auto">
        <form method="POST" action="../controllers/logout.php"
                onsubmit="const btn=this.querySelector('button[type=submit]'); btn.disabled=true; btn.innerText='Signing out...'; return true;">
            <input type="hidden" name="logout" value="true">
            <button type="submit" class="btn btn-outline-light w-100 d-flex align-items-center justify-content-center justify-content-md-start">
                Logout
            </button>
        </form>
    </div>