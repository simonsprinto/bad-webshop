<?php
include_once("head.php");

function connectToDatabase()
{
    $db = new SQLite3('data.db');
    return $db;
}

$search = isset($_GET['search']) ? $_GET['search'] : '';
?>

<div class="container mt-3">
    <div class="input-group">
        <form action="" method="get" class="d-flex">
            <input type="text" name="search" class="form-control" placeholder="Sök produkter..." style="min-width: 400px;">
            <button type="submit" class="btn btn-dark ms-2">Sök</button>
        </form>
    </div>
</div>

<div class="container mt-3">
    <div class="row">
        <?php
        try {
            // Anslut till din SQLite-databas
            $db = connectToDatabase();

            if (!empty($search)) {
                // Skapa en SQL-fråga för att söka efter produkter som matchar sökningen
                $query = "SELECT * FROM products WHERE title LIKE '%" . $search . "%'";
            } else {
                // Skapa en SQL-fråga för att hämta alla produkter från tabellen "products"
                $query = "SELECT * FROM products";
            }

            $result = $db->query($query);

            // Loopa igenom resultatet och skriv ut produktinformation
            while ($row = $result->fetchArray()) {
                echo
                '<div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="' . $row['image_filename'] . '" class="card-img-top" alt="Produkt 1" width="100" height="250">
                        <div class="card-body">
                            <h5 class="card-title">' . $row['title'] . '</h5>
                            <p class="card-text">' . $row['description'] . '</p>
                            <p class="card-text">' . $row['price'] . ' kr</p>
                        </div>
                    </div>
                </div>';
            }

            $db->close();
        } catch (Exception $e) {
            echo "Databasfel: " . $e->getMessage();
        }
        ?>
    </div>
    <?php if (!empty($search)) {
        echo "<br>Du har sökt efter: " . $search . "<br>";
    } ?>
</div>

<?php include_once("foot.php"); ?>