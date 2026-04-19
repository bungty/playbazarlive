<?php
include "db.php";

// insert data
if(isset($_POST['submit'])){
    $name = $_POST['name'];

    if(!empty($name)){
        mysqli_query($conn, "INSERT INTO markets(name) VALUES('$name')");
        header("Location: manage_market.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Add Market</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body{
    margin:0;
    background:#f5f7fa;
}

/* Sidebar */
.sidebar{
    width:250px;
    height:100vh;
    position:fixed;
    background:#1e1e2f;
    color:#fff;
}

/* Content */
.content{
    margin-left:250px;
    padding:30px;
}
</style>
</head>

<body>

<!-- Sidebar -->
<div class="sidebar">
    <?php include "sidebar.php"; ?>
</div>

<!-- Main Content -->
<div class="content">

    <div class="card shadow p-4">
        <h3 class="mb-4">➕ Add Market</h3>

        <form method="POST">

            <div class="mb-3">
                <label class="form-label">Market Name</label>
                <input type="text" name="name" class="form-control" placeholder="Enter market name" required>
            </div>

            <button type="submit" name="submit" class="btn btn-success">Add Market</button>
            <a href="manage_market.php" class="btn btn-secondary">Back</a>

        </form>

    </div>

</div>

</body>
</html>