<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title><?= isset($pageTitle) ? htmlspecialchars($pageTitle) : 'App' ?></title>
</head>
<body style=" background: linear-gradient(135deg, #ef5e9f 0%, #f88733 100%);">
    <?= $content ?>
</body>
</html>
