<!-- /views/404.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>404 Not Found</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <div class="container">
        <h1>404 - Page Not Found</h1>
        <p>Route not found: <?= htmlspecialchars($_SERVER['REQUEST_URI']) ?></p>
        <p>The page you are looking for doesn't exist.</p>
        <a href="/dashboard">Back to home</a>
    </div>
</body>
</html>
