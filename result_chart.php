<?php
include "db.php";

// fetch markets
$markets = mysqli_query($conn, "SELECT * FROM markets");

// month/year
$year = date("Y");
$month = date("m");

// total days
$days = cal_days_in_month(CAL_GREGORIAN, $month, $year);
?>

<!DOCTYPE html>
<html>
<head>
<title>Result Chart</title>

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
    padding:20px;
}
table{
    font-size:12px;
}
td{
    text-align:center;
}
</style>

</head>

<body>

<div class="sidebar">
    <?php include "sidebar.php"; ?>
</div>

<div class="content">

<h3 class="mb-3">📊 Monthly Result Chart</h3>

<table class="table table-bordered">

<tr>
    <th>Market</th>
    <?php for($d=1;$d<=$days;$d++){ ?>
        <th><?php echo $d; ?></th>
    <?php } ?>
</tr>

<?php while($m = mysqli_fetch_assoc($markets)) { ?>
<tr>
    <td><?php echo $m['name']; ?></td>

    <?php for($d=1;$d<=$days;$d++){

        $date = $year.'-'.$month.'-'.str_pad($d,2,'0',STR_PAD_LEFT);

        $res = mysqli_query($conn,"
            SELECT result_value FROM results 
            WHERE market_id=".$m['id']." 
            AND result_date='$date'
        ");

        $row = mysqli_fetch_assoc($res);
    ?>
        <td>
            <?php echo $row['result_value'] ?? '-'; ?>
        </td>
    <?php } ?>
</tr>
<?php } ?>

</table>

</div>

</body>
</html>