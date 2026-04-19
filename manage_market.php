<?php
include "db.php";

// DELETE
if(isset($_GET['delete'])){
    $id = intval($_GET['delete']);
    mysqli_query($conn, "DELETE FROM markets WHERE id=$id");
    header("Location: manage_market.php");
    exit();
}

// FETCH DATA
$result = mysqli_query($conn, "SELECT * FROM markets ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Manage Markets</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body{ margin:0; background:#f5f7fa; }

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

<!-- Sidebar -->
<div class="sidebar">
    <?php include "sidebar.php"; ?>
</div>

<!-- Main Content -->
<div class="content">

    <div class="card shadow p-4">

        <div class="d-flex justify-content-between mb-3">
            <h3>📋 Manage Markets</h3>
            <a href="add_market.php" class="btn btn-success">+ Add Market</a>
        </div>

        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Market Name</th>
                    <th width="150">Action</th>
                </tr>
            </thead>

            <tbody>
            <?php while($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td>
                        <a href="edit_market.php?id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm">Edit</a>

                        <a href="manage_market.php?delete=<?php echo $row['id']; ?>" 
                           class="btn btn-danger btn-sm"
                           onclick="return confirm('Delete this market?')">
                           Delete
                        </a>
                    </td>
                </tr>
            <?php } ?>
            </tbody>

        </table>

    </div>

</div>

</body>
</html>