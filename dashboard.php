<?php
include "db.php";

$year = 2026;
$month = 4;
$today = date('d');

$days = cal_days_in_month(CAL_GREGORIAN, $month, $year);

// markets
$markets = mysqli_query($conn, "SELECT * FROM markets");

// chart data
$chart = mysqli_query($conn,"
    SELECT markets.name, COUNT(results.id) as total
    FROM markets
    LEFT JOIN results ON markets.id = results.market_id
    GROUP BY markets.id
");

$labels = [];
$data = [];

while($row = mysqli_fetch_assoc($chart)){
    $labels[] = $row['name'];
    $data[] = $row['total'];
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Dashboard</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<style>
body{margin:0;background:#2b2b4b;color:#fff;}

.sidebar{
    width:240px;
    height:100vh;
    position:fixed;
    background:#1e1e2f;
}

.content{
    margin-left:240px;
    padding:20px;
}

.header{
    background:#3a3761;
    padding:15px;
    border-radius:10px;
    display:flex;
    justify-content:space-between;
}

.table-wrapper{
    margin-top:20px;
    background:#1e1e2f;
    border-radius:15px;
    padding:10px;
}

.matka-table{
    width:100%;
    border-collapse:collapse;
}

.matka-table th, .matka-table td{
    padding:8px;
    text-align:center;
    border-bottom:1px solid #333;
    font-size:12px;
}

.market-cell{
    text-align:left;
    color:#f6d365;
    font-weight:bold;
}

.today-result{
    background:linear-gradient(#f6d365,#fda085);
    color:#000;
    border-radius:8px;
    font-weight:bold;
}

.chart-box{
    margin-top:20px;
    background:#1e1e2f;
    padding:20px;
    border-radius:15px;
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

<div class="header">
    <h5>📊 LIVE RESULT • APRIL 2026</h5>
    <span class="badge bg-success">LIVE</span>
</div>

<!-- Chart -->
<div class="chart-box">
    <h5>Market Activity</h5>
    <canvas id="chart"></canvas>
</div>

<!-- Table -->
<div class="table-wrapper">
<div style="overflow-x:auto;">

<table class="matka-table">

<tr>
<th>Market</th>

<?php for($d=1;$d<=$days;$d++){ ?>
<th <?php if($d==$today) echo 'style="color:#f6d365;"'; ?>>
<?php echo $d; ?>
</th>
<?php } ?>

</tr>

<?php while($m = mysqli_fetch_assoc($markets)) { ?>
<tr>

<td class="market-cell"><?php echo $m['name']; ?></td>

<?php for($d=1;$d<=$days;$d++){

$date = $year.'-'.$month.'-'.str_pad($d,2,'0',STR_PAD_LEFT);

$res = mysqli_query($conn,"
SELECT result_value FROM results 
WHERE market_id=".$m['id']." AND result_date='$date'
");

$row = mysqli_fetch_assoc($res);
$value = $row['result_value'] ?? '-';

$class = ($d==$today) ? 'today-result' : '';
?>

<td class="<?php echo $class; ?>"><?php echo $value; ?></td>

<?php } ?>

</tr>
<?php } ?>

</table>

</div>
</div>

</div>

<script>
new Chart(document.getElementById('chart'), {
    type: 'bar',
    data: {
        labels: <?php echo json_encode($labels); ?>,
        datasets: [{
            label: 'Total Results',
            data: <?php echo json_encode($data); ?>,
            backgroundColor: '#f6d365'
        }]
    }
});
</script>

</body>
</html>