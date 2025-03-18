<?php
$servername = "localhost";
$username = "root"; // Αντικατάσταση με το username της βάσης δεδομένων
$password = ""; // Αντικατάσταση με το password της βάσης δεδομένων
$dbname = "user_auth";

// Δημιουργία σύνδεσης
$conn = new mysqli($servername, $username, $password, $dbname);

// Έλεγχος σύνδεσης
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Λήψη δεδομένων από τη φόρμα
$username = $_POST['username'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Κρυπτογράφηση του password

// Εισαγωγή δεδομένων στη βάση
$sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";

if ($conn->query($sql) === TRUE) {
    echo "Νέος χρήστης δημιουργήθηκε επιτυχώς";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
<?php
session_start();

// Έλεγχος αν ο χρήστης έχει υποβάλει τη φόρμα
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Έλεγχος στη βάση δεδομένων
    $sql = "SELECT id, username, password FROM users WHERE username='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            // Επιτυχής σύνδεση
            $_SESSION['username'] = $username;
            echo "Επιτυχής σύνδεση!";
        } else {
            echo "Λάθος password.";
        }
    } else {
        echo "Ο χρήστης δεν βρέθηκε.";
    }
}
?>
<?php
session_start();

// Έλεγχος αν ο χρήστης έχει υποβάλει τη φόρμα
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Έλεγχος στη βάση δεδομένων
    $sql = "SELECT id, username, password FROM users WHERE username='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            // Επιτυχής σύνδεση
            $_SESSION['username'] = $username;
            echo "Επιτυχής σύνδεση!";
        } else {
            echo "Λάθος password.";
        }
    } else {
        echo "Ο χρήστης δεν βρέθηκε.";
    }
}
?>
<?php
session_start();

if (isset($_SESSION['username'])) {
    echo "Καλώς ήρθες " . $_SESSION['username'];
} else {
    echo "Παρακαλώ συνδεθείτε.";
}
?>
<?php
if (isset($_COOKIE['username'])) {
    echo "Καλώς ήρθες " . $_COOKIE['username'];
} else {
    echo "Παρακαλώ συνδεθείτε.";
}
?>
<?php
session_start();
session_unset();
session_destroy();
header("Location: login.php"); // Ανακατεύθυνση στη σελίδα σύνδεσης
exit();
?>
<?php
setcookie("username", "", time() - 3600, "/"); // Διαγραφή του cookie
header("Location: login.php"); // Ανακατεύθυνση στη σελίδα σύνδεσης
exit();
?>