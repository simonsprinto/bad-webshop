<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Kolla om användarnamn och lösenord har skickats via GET-anrop.
    if (isset($_GET["username"]) && isset($_GET["password"])) {
        $username = $_GET["username"];
        $password = $_GET["password"];

        // Öppna anslutning till SQLite-databasen (ersätt 'users.db' med sökvägen till din databas)
        $db = new PDO('sqlite:data.db');

        // SQL
        $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
        $result = $db->query($query);
        $row = $result->fetch(PDO::FETCH_ASSOC);

        // Om något returnerats från databasen
        if ($row) {
            // Starta sessionen om den inte redan är startad
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            $_SESSION["loggedin"] = true;
            $_SESSION["username"] = $username;
            header("Location: admin.php"); // Omdirigera till inloggad sida
            exit;
        } else {
            // Inloggning misslyckades
            $message = "Fel användarnamn eller lösenord.";
        }

        $db = null;
    }
}
?>

<?php include_once("head.php") ?>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <h2 class="text-center">Logga in</h2>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
                    <div class="mb-3">
                        <label for="username" class="form-label">Användarnamn:</label>
                        <input type="text" class="form-control" id="username" name="username">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Lösenord:</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Logga in</button>
                </form>
                <br>
                <?php if (isset($message)) {
                    echo $message;
                } ?>
            </div>
        </div>
    </div>

    <?php include_once("foot.php"); ?>