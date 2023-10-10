<?php
// Starta sessionen om den inte redan är startad
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <title>Webbutiken</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Lilita+One&display=swap');

        img {
            object-fit: cover;
        }

        .navbar-brand {
            font-family: 'Lilita One', sans-serif !important;
            font-size: 150%;
        }
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="index.php">✨ Webbutiken</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="shop.php">Produkter</a>
                        </li>
                        <li class="nav-item">
                            <?php
                            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) : ?>
                                <a class="nav-link" href="logout.php">Logga ut</a>
                            <?php else : ?>
                                <a class="nav-link" href="login.php">Logga in</a>
                            <?php endif; ?>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>