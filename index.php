<?php 
    session_start();
    $requestUri = $_SERVER['REQUEST_URI'];
    $uri_parts = explode('?', $_SERVER['REQUEST_URI'], 2);
    $request =  $uri_parts[0];
    $viewDir = '/src/views/';
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./public/styles/styles.css" type="text/css">
    <link rel="stylesheet" href="./src/views/components/navbar/navbar.styles.css" type="text/css">
    <?php
        if ($request === "/login") {
            echo '<link rel="stylesheet" href=".' . $viewDir . 'login/login.styles.css" type="text/css">';
        }
    ?>
    <?php
        if ($request === "/registration") {
            echo '<link rel="stylesheet" href=".' . $viewDir . 'registration/registration.styles.css" type="text/css">';
        }
    ?>
    <?php
        if ($request === "/posts") {
            echo '<link rel="stylesheet" href=".' . $viewDir . 'components/categories/categories.styles.css" type="text/css">';
        }
    ?>
    <title>Document</title>
</head>
<body>
    <?php 
        require_once __DIR__ . $viewDir . 'components/navbar/navbar.php';

        switch ($request) {
            case '/':
                require __DIR__ . $viewDir . 'home/home.php';
                break;

            case '/login':
                require __DIR__ . $viewDir . 'login/login.php';
                break;
            
            case '/registration':
                require __DIR__ . $viewDir . 'registration/registration.php';
                break;

            case '/posts':
                require __DIR__ . $viewDir . 'posts/posts.php';
                break;

            case '/add-category':
                require __DIR__ . $viewDir . 'components/categories/add-category/add-category.php';
                break;

            default:
                http_response_code(404);
                require __DIR__ . $viewDir . '404/404.php';
        }
    ?>
</body>
</html>
