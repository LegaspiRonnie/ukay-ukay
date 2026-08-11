
<style>
    .sidebar {
        width: 240px;
        height: 100vh;
        position: fixed;
        top: 0;
        left: 0;
        transition: width .3s ease;
        overflow: hidden;
        z-index: 1040;
    }

    .sidebar.collapsed {
        width: 70px;
    }

    .sidebar .sidebar-text {
        transition: opacity .2s ease;
        white-space: nowrap;
    }

    .sidebar.collapsed .sidebar-text {
        opacity: 0;
        width: 0;
        overflow: hidden;
        display: inline-block;
    }

    .sidebar.collapsed .nav-link,
    .sidebar.collapsed .brand,
    .sidebar.collapsed .btn {
        justify-content: center;
    }

    .sidebar.collapsed .nav-link i,
    .sidebar.collapsed .brand i,
    .sidebar.collapsed .btn i {
        margin-right: 0 !important;
    }



    /* Mobile: sidebar becomes top navbar */
    @media (max-width: 767.98px) {
        .sidebar {
            position: relative;
            width: 100% !important;
            height: auto;
        }

        .sidebar.collapsed {
            width: 100% !important;
        }

        .sidebar.collapsed .sidebar-text {
            opacity: 1;
            width: auto;
            display: inline;
        }
    }
</style>

<!-- Sidebar -->
<div id="sidebar" class="sidebar bg-dark text-white d-flex flex-column p-3">

    <!-- Top -->
    <div class="d-flex align-items-center justify-content-between mb-3">
        <a href="#" class="brand d-flex align-items-center text-white text-decoration-none">
            <i class="bi bi-box-seam fs-4 me-2"></i>
            <span class="sidebar-text fs-5 fw-bold">MyStore</span>
        </a>

        <button id="toggleSidebar" class="btn btn-outline-light btn-sm">
            <i class="bi bi-list"></i>
        </button>
    </div>

    <hr class="border-secondary">

    <!-- Navigation -->
    <ul class="nav nav-pills flex-column mb-auto">

        <li class="nav-item mb-2">
            <a href="#" class="nav-link active d-flex align-items-center">
                <i class="bi bi-speedometer2 me-2"></i>
                <span class="sidebar-text">Dashboard</span>
            </a>
        </li>

        <li class="mb-2">
            <a href="#" class="nav-link text-white d-flex align-items-center">
                <i class="bi bi-box me-2"></i>
                <span class="sidebar-text">Products</span>
            </a>
        </li>

        <li class="mb-2">
            <a href="#" class="nav-link text-white d-flex align-items-center">
                <i class="bi bi-tags me-2"></i>
                <span class="sidebar-text">Categories</span>
            </a>
        </li>

        <li class="mb-2">
            <a href="#" class="nav-link text-white d-flex align-items-center">
                <i class="bi bi-cart me-2"></i>
                <span class="sidebar-text">Orders</span>
            </a>
        </li>

        <li class="mb-2">
            <a href="#" class="nav-link text-white d-flex align-items-center">
                <i class="bi bi-people me-2"></i>
                <span class="sidebar-text">Customers</span>
            </a>
        </li>

        <li class="mb-2">
            <a href="#" class="nav-link text-white d-flex align-items-center">
                <i class="bi bi-gear me-2"></i>
                <span class="sidebar-text">Settings</span>
            </a>
        </li>

    </ul>

    <hr class="border-secondary">

    <?php include 'logout.php'; ?>

</div>




<script>
    const sidebar = document.getElementById('sidebar');
    const main = document.getElementById('mainContent');
    const toggle = document.getElementById('toggleSidebar');

    toggle.addEventListener('click', () => {
        if (window.innerWidth >= 768) {
            sidebar.classList.toggle('collapsed');
            main.classList.toggle('expanded');
        }
    });
</script>
