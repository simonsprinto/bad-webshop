<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <title>Startsida</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Lilita+One&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        h1 {
            color: white;
            font-size: 5rem;
            position: absolute;
            text-shadow: 1px 1px 5px #00000075;
            text-align: center;
            margin-top: -200px;
            font-family: 'Lilita One', sans-serif;
        }
        #hero {
            width: 100vw;
            height: 101vh;
            overflow: hidden;
            object-fit: cover;
        }
        #cta {
            background-color: black;
            color: white;
            padding: 10px 25px;
            position: absolute;
            border-radius: 35px;
            text-decoration: none;
            box-shadow: 5px 5px 25px 25px #00000025;
        }
    </style>
</head>
<body>
<img src="hero.jpg" alt="" id="hero">
<h1 class="display-1">Välkommen till Webbutiken!</h1>
<a href="shop.php" id="cta">Till produkterna</a>
</body>
</html>
