<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->
<?php include(BASE_PATH . '/lib/includes.php'); ?>
<!--end::Head-->
<!--begin::Body-->

<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
    <!--begin::App Wrapper-->
    <div class="app-wrapper">
        <!--begin::Header-->
        <?php include('grid/header.php'); ?>
        <!--end::Header-->
        <!--begin::Sidebar-->
        <aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
            <!--begin::Sidebar Brand-->
            <?php include('grid/sidebar.php'); ?>
            <!--end::Sidebar Brand-->
        </aside>
        <!--end::Sidebar-->
        <!--begin::App Main-->
        <main class="app-main">
            <!--begin::App Content Header-->
            <div class="app-content-header">
                <!--begin::Container-->
                <?php include('grid/breadcrumbs.php') ?>
                <div class="container-fluid">
                    <!--begin::Row-->
                    <div class="app-content">
                        <!--begin::Container-->
                        <div class="container-fluid">
                            <!--begin::Row-->
                            <?php
                            switch ($page) {
                                case 'patient':
                                    include(BASE_PATH . '/views/page/patient/index.php');
                                    break;
                                case 'login':
                                    include(BASE_PATH . '/views/page/auth/login.php');
                                    break;
                                case 'dashboard':
                                default:
                                    include(BASE_PATH . '/views/page/dashboard.php');
                                    break;
                            }
                            ?>
                            <!-- /.row (main row) -->
                        </div>
                        <!--end::Container-->
                    </div>
                    <!--end::Row-->
                </div>
                <!--end::Container-->
            </div>
        </main>
        <!--end::App Main-->
        <!--begin::Footer-->
        <?php include('grid/footer.php') ?>
        <!--end::Footer-->
    </div>
</body>
<!--end::Body-->

</html>