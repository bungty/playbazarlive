<!DOCTYPE html>
<html lang="hi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Playbazar Live • Premium Matka</title>
  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <style>
    * {
      font-family: 'Plus Jakarta Sans', sans-serif;
    }
    
    body {
      background: linear-gradient(135deg, #0f0c29, #302b63, #24243e);
      min-height: 100vh;
      padding: 20px 0 40px;
    }

    /* Glassmorphism Card */
    .glass-card {
      background: rgba(255, 255, 255, 0.08);
      backdrop-filter: blur(20px);
      -webkit-backdrop-filter: blur(20px);
      border: 1px solid rgba(255, 255, 255, 0.1);
      border-radius: 32px;
      box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
    }

    /* Logo Styling */
    .logo-wrapper {
      display: flex;
      align-items: center;
      gap: 12px;
    }
    
    .logo-icon {
      width: 50px;
      height: 50px;
      background: linear-gradient(135deg, #f6d365 0%, #fda085 100%);
      border-radius: 16px;
      display: flex;
      align-items: center;
      justify-content: center;
      box-shadow: 0 10px 20px rgba(246, 211, 101, 0.3);
    }
    
    .logo-icon i {
      font-size: 28px;
      color: #1a1a2e;
    }
    
    .logo-text {
      font-size: 28px;
      font-weight: 800;
      background: linear-gradient(135deg, #fff 0%, #f6d365 100%);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
      letter-spacing: -0.5px;
    }

    /* Date Display */
    .date-display {
      background: linear-gradient(135deg, #f6d365, #fda085);
      padding: 12px 24px;
      border-radius: 50px;
      font-weight: 700;
      color: #1a1a2e;
      box-shadow: 0 8px 20px rgba(246, 211, 101, 0.25);
    }

    /* Login Button */
    .btn-login {
      background: rgba(255, 255, 255, 0.15);
      border: 1.5px solid rgba(255, 255, 255, 0.3);
      color: white;
      padding: 12px 32px;
      border-radius: 50px;
      font-weight: 700;
      font-size: 16px;
      backdrop-filter: blur(10px);
      transition: all 0.3s ease;
    }
    
    .btn-login:hover {
      background: white;
      color: #1a1a2e;
      border-color: white;
      transform: translateY(-2px);
    }

    /* Action Buttons */
    .action-btn {
      padding: 14px 28px;
      border-radius: 16px;
      font-weight: 700;
      font-size: 14px;
      letter-spacing: 0.5px;
      transition: all 0.3s ease;
      border: none;
    }
    
    .btn-past {
      background: rgba(255, 255, 255, 0.1);
      color: white;
      border: 1px solid rgba(255, 255, 255, 0.2);
    }
    
    .btn-past:hover {
      background: rgba(255, 255, 255, 0.2);
      color: white;
    }
    
    .btn-show {
      background: linear-gradient(135deg, #f6d365, #fda085);
      color: #1a1a2e;
      box-shadow: 0 10px 25px rgba(246, 211, 101, 0.3);
    }
    
    .btn-show:hover {
      transform: translateY(-3px);
      box-shadow: 0 15px 30px rgba(246, 211, 101, 0.4);
    }
    
    .btn-print {
      background: rgba(255, 255, 255, 0.1);
      color: white;
      border: 1px solid rgba(255, 255, 255, 0.2);
    }

    /* Table Styling */
    .table-wrapper {
      border-radius: 24px;
      overflow: hidden;
      background: rgba(10, 10, 25, 0.6);
      backdrop-filter: blur(10px);
      border: 1px solid rgba(255, 255, 255, 0.1);
    }
    
    .matka-table {
      margin-bottom: 0;
      border-collapse: separate;
      border-spacing: 0;
    }
    
    .matka-table thead th {
      background: linear-gradient(135deg, #1a1a2e, #16213e);
      color: #f6d365;
      font-weight: 700;
      font-size: 13px;
      text-transform: uppercase;
      letter-spacing: 0.5px;
      padding: 18px 8px;
      border-bottom: 2px solid #f6d365;
      text-align: center;
    }
    
    .matka-table tbody tr {
      border-bottom: 1px solid rgba(255, 255, 255, 0.05);
      transition: all 0.2s ease;
    }
    
    .matka-table tbody tr:hover {
      background: rgba(255, 255, 255, 0.05);
    }
    
    .matka-table td {
      padding: 14px 6px;
      color: rgba(255, 255, 255, 0.9);
      font-weight: 500;
      font-size: 14px;
      text-align: center;
      border: none;
    }
    
    .market-cell {
      background: linear-gradient(135deg, #1a1a2e, #0f0f1a) !important;
      color: #f6d365 !important;
      font-weight: 800 !important;
      font-size: 15px !important;
      text-align: left !important;
      padding-left: 20px !important;
      position: sticky;
      left: 0;
      border-right: 2px solid rgba(246, 211, 101, 0.3);
    }
    
    .today-result {
      background: linear-gradient(135deg, #f6d365, #fda085) !important;
      color: #1a1a2e !important;
      font-weight: 800 !important;
      font-size: 16px !important;
      box-shadow: 0 0 20px rgba(246, 211, 101, 0.4);
      border-radius: 8px;
    }

    /* WhatsApp & Telegram Cards */
    .social-card {
      background: linear-gradient(135deg, rgba(255,255,255,0.1), rgba(255,255,255,0.05));
      backdrop-filter: blur(15px);
      border: 1px solid rgba(255, 255, 255, 0.15);
      border-radius: 28px;
      padding: 30px;
      transition: all 0.3s ease;
    }
    
    .social-card:hover {
      transform: translateY(-5px);
      border-color: rgba(246, 211, 101, 0.5);
    }
    
    .social-icon {
      width: 70px;
      height: 70px;
      border-radius: 20px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 32px;
    }
    
    .wa-icon {
      background: linear-gradient(135deg, #075E54, #128C7E, #25D366);
      box-shadow: 0 15px 30px rgba(37, 211, 102, 0.3);
    }
    
    .tg-icon {
      background: linear-gradient(135deg, #0088cc, #00aaff);
      box-shadow: 0 15px 30px rgba(0, 136, 204, 0.3);
    }
    
    .btn-social {
      background: rgba(255, 255, 255, 0.15);
      border: 1px solid rgba(255, 255, 255, 0.3);
      color: white;
      padding: 14px 28px;
      border-radius: 50px;
      font-weight: 700;
      transition: all 0.3s ease;
    }
    
    .btn-social:hover {
      background: white;
      color: #1a1a2e;
    }

    /* Banner */
    .banner-gradient {
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      border-radius: 32px;
      padding: 50px;
      position: relative;
      overflow: hidden;
    }
    
    .banner-gradient::before {
      content: '';
      position: absolute;
      top: -50%;
      right: -50%;
      width: 200%;
      height: 200%;
      background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
      animation: rotate 20s linear infinite;
    }
    
    @keyframes rotate {
      from { transform: rotate(0deg); }
      to { transform: rotate(360deg); }
    }

    /* Advertise Badge */
    .ad-badge {
      display: inline-block;
      background: linear-gradient(135deg, #f6d365, #fda085);
      color: #1a1a2e;
      padding: 12px 30px;
      border-radius: 50px;
      font-weight: 800;
      font-size: 18px;
      letter-spacing: 2px;
      margin: 20px 0;
    }

    /* Disclaimer */
    .disclaimer-box {
      background: rgba(0, 0, 0, 0.3);
      backdrop-filter: blur(10px);
      border-radius: 24px;
      padding: 30px;
      border: 1px solid rgba(255, 255, 255, 0.1);
    }
    
    .text-gradient {
      background: linear-gradient(135deg, #f6d365, #fda085);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
    }
  </style>
</head>
<body>

<div class="container">
  
  <!-- Header Section -->
  <div class="glass-card p-4 mb-4">
    <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
      <div class="logo-wrapper">
        <div class="logo-icon">
          <i class="fas fa-crown"></i>
        </div>
        <span class="logo-text">Playbazar<span style="color: #f6d365; -webkit-text-fill-color: #f6d365;">Live</span></span>
      </div>
      
      <div class="d-flex align-items-center gap-3">
        <div class="date-display">
          <i class="far fa-calendar-alt me-2"></i>19 APR 2026
        </div>
        <button class="date-display">
            <a class="btn bth-warning" href="login.php">
          LOGIN <i class="fas fa-arrow-right ms-2"></i>
            </a>
        </button>
      </div>
    </div>
  </div>

  <!-- Action Buttons -->
  <div class="d-flex flex-wrap gap-3 mb-4 justify-content-center justify-content-md-start">
    <button class="action-btn btn-past">
      <i class="fas fa-history me-2"></i>PAST RESULT
    </button>
    <button class="action-btn btn-show">
      <i class="fas fa-chart-simple me-2"></i>SHOW RESULT
    </button>
    <button class="action-btn btn-print">
      <i class="fas fa-print me-2"></i>PRINT CHART
    </button>
  </div>

  <!-- Matka Chart Section -->
  <div class="glass-card p-3 p-md-4 mb-4">
    <h4 class="text-white mb-4 d-flex align-items-center">
      <i class="fas fa-table me-3" style="color: #f6d365;"></i>
      <span class="text-gradient fw-bold">LIVE RESULT CHART • APRIL 2026</span>
      <span class="ms-auto badge" style="background: rgba(246,211,101,0.2); color: #f6d365; padding: 8px 16px;">
        <i class="fas fa-circle me-2" style="font-size: 8px; color: #25D366;"></i>LIVE
      </span>
    </h4>
    
    <?php
include "db.php";

// current month/year
$year = 2026;
$month = 4;

// total days
$days = cal_days_in_month(CAL_GREGORIAN, $month, $year);

// fetch markets
$markets = mysqli_query($conn, "SELECT * FROM markets");
?>

<div class="table-wrapper">
<div style="overflow-x:auto;">
<table class="matka-table w-100">

<thead>
<tr>
    <th style="text-align:left; padding-left:20px;">MARKET</th>
    
    <?php for($d=1; $d <= $days; $d++) { ?>
        <th <?php if($d == date('d')) echo 'style="color:#f6d365;"'; ?>>
            <?php echo $d; ?>
        </th>
    <?php } ?>
</tr>
</thead>

<tbody>

<?php while($m = mysqli_fetch_assoc($markets)) { ?>

<tr>

<td class="market-cell">
    <?php echo $m['name']; ?>
</td>

<?php for($d=1; $d <= $days; $d++) {

    $date = $year.'-'.$month.'-'.str_pad($d,2,'0',STR_PAD_LEFT);

    $res = mysqli_query($conn, "
        SELECT result_value 
        FROM results 
        WHERE market_id=".$m['id']." 
        AND result_date='$date'
    ");

    $row = mysqli_fetch_assoc($res);

    $value = $row['result_value'] ?? '-';

    // highlight today column
    $class = ($d == date('d')) ? 'today-result' : '';
?>

<td class="<?php echo $class; ?>">
    <?php echo $value; ?>
</td>

<?php } ?>

</tr>

<?php } ?>

</tbody>
</table>
</div>
</div>
    
    <!-- Advertise Here -->
    <div class="text-center mt-4">
      <span class="ad-badge">
        <i class="fas fa-bullhorn me-3"></i>ADVERTISE HERE<i class="fas fa-bullhorn ms-3"></i>
      </span>
    </div>
  </div>

  <!-- WhatsApp & Telegram Section -->
  <div class="row g-4 mb-4">
    <div class="col-md-6">
      <div class="social-card">
        <div class="d-flex align-items-start gap-4">
          <div class="social-icon wa-icon">
            <i class="fab fa-whatsapp"></i>
          </div>
          <div>
            <h3 class="text-white fw-bold mb-2">💬 WhatsApp Group</h3>
            <p class="text-white-50 mb-4">दिलचस्प खबरें और लाइव अपडेट पाएं</p>
            <button class="btn-social">
              <i class="fab fa-whatsapp me-2"></i>Join Now →
            </button>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="social-card">
        <div class="d-flex align-items-start gap-4">
          <div class="social-icon tg-icon">
            <i class="fab fa-telegram-plane"></i>
          </div>
          <div>
            <h3 class="text-white fw-bold mb-2">✈️ Telegram Channel</h3>
            <p class="text-white-50 mb-4">सर्वश्रेष्ठ अपडेट और फास्ट रिजल्ट प्राप्त करें</p>
            <button class="btn-social">
              <i class="fab fa-telegram-plane me-2"></i>Join Channel →
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Banner Image -->
  <div class="banner-gradient mb-4">
    <div style="position: relative; z-index: 1;">
      <img src="images/footer-banner.jpeg" width="100%"  alt="Special Game" class="img-fluid rounded-3 mb-4" style="box-shadow: 0 
           alt="Special Game" 
           class="img-fluid rounded-3 mb-4" 
           style="box-shadow: 0 15px 30px rgba(246, 211, 101, 0.3);">
      <h2 class="text-white fw-bold display-6 mb-3">🎯 आज का स्पेशल गेम</h2>
      <p class="text-white-50 fs-5">सबसे तेज़ और सटीक रिजल्ट के लिए जुड़े रहें</p>
      <button class="btn btn-light px-5 py-3 mt-3 rounded-pill fw-bold">
        VIEW NOW <i class="fas fa-arrow-right ms-2"></i>
      </button>
    </div>
  </div>

  <!-- Disclaimer -->
  <div class="disclaimer-box">
    <div class="d-flex align-items-center gap-3 mb-3">
      <i class="fas fa-shield-alt fa-2x" style="color: #f6d365;"></i>
      <h5 class="text-white mb-0 fw-bold">⚠️ महत्वपूर्ण सूचना</h5>
    </div>
    <p class="text-white-50 mb-0" style="font-size: 14px; line-height: 1.8;">
      This website is only for informational and entertainment purposes. We do not promote or support any kind of illegal gambling or betting activities. Users are solely responsible for their actions and decisions. All the results and information provided on this website are based on personal analysis and sources. We are not responsible for any profit or loss. If gambling or betting is illegal in your area, please do not use this website. You must be 18+ to use this platform. By using this website, you agree that you are doing so at your own risk.
    </p>
  </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>