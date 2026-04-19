<?php
include "db.php";

// insert
if(isset($_POST['submit'])){
    $market_id = $_POST['market_id'];
    $date = $_POST['date'];
    $value = $_POST['value'];

    mysqli_query($conn, "
        INSERT INTO results(market_id, result_date, result_value)
        VALUES('$market_id','$date','$value')
    ");

    header("Location: result_chart.php");
    exit();
}

// fetch markets
$markets = mysqli_query($conn, "SELECT * FROM markets");
?>

<!DOCTYPE html>
<html>
<head>
<title>Add Result</title>
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
    <h3>➕ Add Result</h3>

    <form method="POST">

        <div class="mb-3">
            <label>Market</label>
            <select name="market_id" class="form-control" required>
                <option value="">Select Market</option>
                <?php while($m = mysqli_fetch_assoc($markets)) { ?>
                    <option value="<?php echo $m['id']; ?>">
                        <?php echo $m['name']; ?>
                    </option>
                <?php } ?>
            </select>
        </div>

        <div class="mb-3">
            <label>Date</label>
            <input type="date" name="date" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Result</label>
            <input type="text" name="value" class="form-control" placeholder="e.g. 93" required>
        </div>

        <button name="submit" class="btn btn-success">Add Result</button>
    </form>

</div>

</div>

</body>
</html>