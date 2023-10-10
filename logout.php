<?php
// Starta sessionen om den inte redan är startad
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Avsluta sessionen (nollställ den)
session_destroy();

// Omdirigera användaren tillbaka till index.php
header("Location: index.php");
exit;
