<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ta emot formulärdata
    $title = $_POST["title"];
    $price = $_POST["price"];
    $purchase_price = $_POST["purchase-price"];
    $description = $_POST["description"];

    // Kontrollera om en fil har laddats upp
    if (isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {
        // Hantera uppladdad fil
        $image_name = $_FILES["image"]["name"];
        $image_tmp_name = $_FILES["image"]["tmp_name"];

        // Ange sökvägen där bilden kommer att sparas (anpassa efter din server)
        $image_path = "uploads/" . $image_name;

        // Flytta den uppladdade bilden till den angivna sökvägen
        move_uploaded_file($image_tmp_name, $image_path);
    } else {
        // Om ingen bild har laddats upp, kan du här hantera det (t.ex. sätta en standardbild)
        $image_path = "default.jpg";
    }

    // Anslut till din SQLite-databas med PDO
    try {
        $db = new PDO('sqlite:data.db');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Skapa SQL-fråga för att infoga produkten i databasen
        $query = "INSERT INTO products (title, price, description, image_filename, purchase_price) VALUES ('$title', $price, '$description', '$image_path', $purchase_price)";

        // Utför frågan för att lagra produkten
        $db->exec($query);

        // Stäng databasanslutningen
        $db = null;

        // Omdirigera till en bekräftelsesida eller en annan sida efter lagring
        header("Location: shop.php");
        exit;
    } catch (PDOException $e) {
        echo "Databasfel: " . $e->getMessage();
    }
}
?>

<?php include_once("head.php") ?>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2 class="text-center">Lägg till ny produkt</h2>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="title" class="form-label">Produkttitel:</label>
                        <input type="text" class="form-control" id="title" name="title">
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Pris:</label>
                        <input type="text" class="form-control" id="price" name="price">
                    </div>
                    <div class="mb-3">
                        <label for="purchase-price" class="form-label">Inköpspris (dold för kunder)</label>
                        <input type="text" class="form-control" id="purchase-price" name="purchase-price">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Beskrivning:</label>
                        <textarea class="form-control" id="description" name="description"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Bild:</label>
                        <input type="file" class="form-control" id="image" name="image">
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Lägg till produkt</button>
                </form>
            </div>
        </div>
    </div>

    <?php include_once("foot.php"); ?>