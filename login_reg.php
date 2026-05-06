<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN - REGISTER</title>

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/noty/lib/noty.css">
</head>
<body>
   <div class="container<?php echo (isset($_GET['registered']) && $_GET['registered'] === 'true') ? ' active' : 
     ((isset($_GET['registered']) && $_GET['registered'] === 'false') ? ' active' : '');
    ?>">

        <!-- LOGIN -->
        <div class="form-box login">
            <form action="backend/login.php" method="post">
                <h1>LOGIN</h1>
                <div class="input-box">
                    <input type="email" name="email" id="email" placeholder="Email" required>
                    <i class="fa-solid fa-envelope"></i>
                </div>

                <div class="input-box">
                    <input type="password" name="password" id="password" placeholder="Password" required>
                    <i class="fa-solid fa-envelope"></i>
                </div>

                <div class="forgot-pass">
                    <a href="#">Forgot Password?</a>
                </div>
                <button type="submit" class="btn">Login</button>
            </form>
        </div>

        <!-- REGISTER -->
        <div class="form-box register">
            <form id="registerForm" action="backend/register.php" method="post">
                <h1>REGISTER</h1>

                <div class="input-box">
                    <input type="text" name="fullname" id="fullname" placeholder="Full Name" required>
                    <i class="fa-solid fa-user"></i>
                </div>

                <div class="input-box">
                    <input type="email" name="email" id="reg_email" placeholder="Email" required>
                    <i class="fa-solid fa-envelope"></i>
                </div>

                <div class="input-box">
                    <input type="password" name="password" id="password" placeholder="Password" required>
                    <i class="fa-solid fa-lock"></i>
                </div>

                <button type="submit" class="btn reg-submit">Register</button>
            </form>
        </div>

        <div class="toggle-box">
            <div class="toggle-panel toggle-left">
                <h1>Hello Welcome!</h1>
                <p>Don't have an account?</p>
                <button class="btn register-btn">Register</button>
            </div>
            <div class="toggle-panel toggle-right">
                <h1>Welcome Back!</h1>
                <p>Already have an account?</p>
                <button class="btn login-btn">Login</button>
            </div>
        </div>
   </div>
   <?php if (isset($_SESSION['error'])): ?>
        <script>
        new Noty({
            type: 'error',
            layout: 'topRight',
            text: '<?php echo $_SESSION['error']; ?>',
            timeout: 3000
        }).show();
        </script>
        <?php unset($_SESSION['error']); endif; ?>

        <?php if (isset($_SESSION['success'])): ?>
        <script>
        new Noty({
            type: 'success',
            layout: 'topRight',
            text: '<?php echo $_SESSION['success']; ?>',
            timeout: 3000
        }).show();
        </script>
    <?php unset($_SESSION['success']); endif; ?>

    <script>
document.getElementById("registerForm").addEventListener("submit", function(e) {
    e.preventDefault();

    const form = this;
    const formData = new FormData(form);

    fetch("backend/register.php", {
        method: "POST",
        body: formData
    })
    .then(res => res.json())
    .then(data => {
        new Noty({
            type: data.status === "success" ? "success" : "error",
            layout: "topRight",
            text: data.message,
            timeout: 3000
        }).show();

        if (data.status === "success") {
            form.reset();

            // switch to login form
            document.querySelector('.container').classList.remove('active');
        } else {
            // stay on register form
            document.querySelector('.container').classList.add('active');
        }
    })
    .catch(err => {
        new Noty({
            type: "error",
            layout: "topRight",
            text: "Server error. Try again.",
            timeout: 3000
        }).show();
    });
});
</script>
</body>
<script src="js/script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/noty/lib/noty.min.js"></script>

<script>
    window.addEventListener('DOMContentLoaded', () => {
        const params = new URLSearchParams(window.location.search);
        const container = document.querySelector('.container');

        if (params.get('registered') === 'true') {
            setTimeout(() => {
                container.classList.remove('active');
                window.history.replaceState({}, document.title, window.location.pathname);
            }, 100);
        }
    });
</script>
</html>