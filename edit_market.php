<?php
include "db.php";

$id = intval($_GET['id']);
$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM markets WHERE id=$id"));

if(isset($_POST['update'])){
    $name = $_POST['name'];

    mysqli_query($conn, "UPDATE markets SET name='$name' WHERE id=$id");
    header("Location: manage_market.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Edit Market</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
.sidebar{
    width:250px;
    height:100vh;
    position:fixed;
    background:#1e1e2f;
    color:#fff;
}
.content{
    margin-left:250px;
    padding:30px;
}
</style>

</head>

<body>

<div class="sidebar">
    <?php include "sidebar.php"; ?>
</div>

<div class="content">

<div class="card p-4 shadow">
    <h3>Edit Market</h3>

    <form method="POST">
        <div class="mb-3">
            <label>Market Name</label>
            <input type="text" name="name" class="form-control" value="<?php echo $data['name']; ?>" required>
        </div>

        <button name="update" class="btn btn-primary">Update</button>
        <a href="manage_market.php" class="btn btn-secondary">Back</a>
    </form>
</div>

</div>

</body>
</html>