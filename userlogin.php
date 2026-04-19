<?php
session_start();
include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    if (!empty($email) && !empty($password)) {

        $stmt = $conn->prepare("SELECT * FROM users WHERE email=?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {

            $row = $result->fetch_assoc();

            if (password_verify($password, $row['password'])) {

                $_SESSION['user_id'] = $row['id'];
                $_SESSION['email'] = $row['email'];

                header("Location: dashboard.php");
                exit();

            } else {
                $_SESSION['error'] = "Wrong Password";
                header("Location: login.php");
                exit();
            }

        } else {
            $_SESSION['error'] = "User Not Found";
            header("Location: login.php");
            exit();
        }

    } else {
        $_SESSION['error'] = "Fill all fields";
        header("Location: index.php");
        exit();
    }
}
?>