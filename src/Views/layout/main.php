<!DOCTYPE html>
<html lang="en">

<head>
    <title>AC DENTAL MANAGEMENT SYSTEM</title>
    <?php $this->insert('lib/includes'); ?>
</head>

<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
    <div class="app-wrapper">

        <?php $this->insert('layout/grid/header'); ?>

        <aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
            <?php $this->insert('layout/grid/sidebar'); ?>
        </aside>

        <main class="app-main">
            <div class="app-content-header">
                <?php $this->insert('layout/grid/breadcrumbs'); ?>
                <div class="container-fluid">
                    <div class="app-content">
                        <div class="container-fluid overflow-auto">
                            <?= $this->section('content') ?>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <?php $this->insert('layout/grid/footer'); ?>
    </div>
</body>

</html>