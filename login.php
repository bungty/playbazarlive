<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Login</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body {
    background: linear-gradient(135deg, #1e1e2f, #2b2b4b);
    height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #fff;
}

/* Glass Card */
.login-box {
    width: 100%;
    max-width: 380px;
    border-radius: 15px;
    background: rgba(255,255,255,0.05);
    backdrop-filter: blur(10px);
    box-shadow: 0 0 25px rgba(0,0,0,0.5);
}

/* Heading */
.login-title {
    font-weight: bold;
    color: #f6d365;
}

/* Input */
.form-control {
    background: #2c2c3e;
    border: none;
    color: #fff;
}

.form-control:focus {
    background: #2c2c3e;
    color: #fff;
    box-shadow: 0 0 5px #f6d365;
}

/* Button */
.btn-custom {
    background: linear-gradient(90deg,#f6d365,#fda085);
    border: none;
    color: #000;
    font-weight: bold;
}

.btn-custom:hover {
    opacity: 0.9;
}

/* Logo */
.logo {
    font-size: 22px;
    font-weight: bold;
    color: #f6d365;
}
</style>
</head>

<body>

<div class="login-box p-4">

    <div class="text-center mb-3">
        <div class="logo">🎯 Play Bazar</div>
        <small class="text-light">Live Result System</small>
    </div>

    <h4 class="text-center login-title mb-4">Login</h4>

    <?php if(isset($_SESSION['error'])) { ?>
        <div class="alert alert-danger">
            <?php echo $_SESSION['error']; unset($_SESSION['error']); ?>
        </div>
    <?php } ?>

    <form method="POST" action="userlogin.php">

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" placeholder="Enter email" required>
        </div>

        <div class="mb-3">
            <label>Password</label>
            <input type="password" name="password" class="form-control" placeholder="Enter password" required>
        </div>

        <button type="submit" class="btn btn-custom w-100">Login</button>

    </form>

</div>

</body>
</html>