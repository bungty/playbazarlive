<?php
include "db.php";

$id = intval($_GET['id']);

// fetch current data
$data = mysqli_fetch_assoc(mysqli_query($conn, "
    SELECT * FROM results WHERE id=$id
"));

// fetch markets
$markets = mysqli_query($conn, "SELECT * FROM markets");

// update
if(isset($_POST['update'])){
    $market_id = $_POST['market_id'];
    $date = $_POST['date'];
    $value = $_POST['value'];

    mysqli_query($conn, "
        UPDATE results 
        SET market_id='$market_id', result_date='$date', result_value='$value'
        WHERE id=$id
    ");

    header("Location: manage_result.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Edit Result</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
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

<div class="sidebar">
    <?php include "sidebar.php"; ?>
</div>

<div class="content">

<div class="card p-4 shadow">
    <h3>Edit Result</h3>

    <form method="POST">

        <div class="mb-3">
            <label>Market</label>
            <select name="market_id" class="form-control" required>
                <?php while($m = mysqli_fetch_assoc($markets)) { ?>
                    <option value="<?php echo $m['id']; ?>" 
                        <?php if($m['id'] == $data['market_id']) echo 'selected'; ?>>
                        <?php echo $m['name']; ?>
                    </option>
                <?php } ?>
            </select>
        </div>

        <div class="mb-3">
            <label>Date</label>
            <input type="date" name="date" value="<?php echo $data['result_date']; ?>" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Result</label>
            <input type="text" name="value" value="<?php echo $data['result_value']; ?>" class="form-control" required>
        </div>

        <button name="update" class="btn btn-primary">Update</button>
        <a href="manage_result.php" class="btn btn-secondary">Back</a>

    </form>

</div>

</div>

</body>
</html>