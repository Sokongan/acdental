<!DOCTYPE html>
<html lang="en">
<title><?= isset($pageTitle) ? htmlspecialchars($pageTitle) : 'App' ?></title>
<?php include(BASE_PATH . '/lib/includes.php'); ?>
<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
<div class="app-wrapper">

    <?php include('grid/header.php'); ?>

    <aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
        <?php include('grid/sidebar.php'); ?>
    </aside>

    <main class="app-main">
        <div class="app-content-header">
            <?php include('grid/breadcrumbs.php'); ?>
            <div class="container-fluid">
                <div class="app-content">
                    <div class="container-fluid">
                        <?= $content ?>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <?php include('grid/footer.php') ?>
</div>
</body>
</html>
