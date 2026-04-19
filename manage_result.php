<?php
include "db.php";

// DELETE
if(isset($_GET['delete'])){
    $id = intval($_GET['delete']);
    mysqli_query($conn, "DELETE FROM results WHERE id=$id");
    header("Location: manage_result.php");
    exit();
}

// FETCH DATA (JOIN with markets)
$result = mysqli_query($conn, "
    SELECT results.*, markets.name AS market_name 
    FROM results 
    JOIN markets ON markets.id = results.market_id
    ORDER BY results.result_date DESC
");
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Manage Results</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body{ margin:0; background:#f5f7fa; }

.sidebar{
    width:250px;
    height:100vh;
    position:fixed;
    background:#1e1e2f;
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

<!-- Content -->
<div class="content">

<div class="card shadow p-4">

    <div class="d-flex justify-content-between mb-3">
        <h3>📊 Manage Results</h3>
        <a href="add_result.php" class="btn btn-success">+ Add Result</a>
    </div>

    <table class="table table-bordered table-hover">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Market</th>
                <th>Date</th>
                <th>Result</th>
                <th width="150">Action</th>
            </tr>
        </thead>

        <tbody>
        <?php while($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['market_name']; ?></td>
            <td><?php echo $row['result_date']; ?></td>
            <td><?php echo $row['result_value']; ?></td>
            <td>
                <a href="edit_result.php?id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm">Edit</a>

                <a href="manage_result.php?delete=<?php echo $row['id']; ?>" 
                   class="btn btn-danger btn-sm"
                   onclick="return confirm('Delete this result?')">
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