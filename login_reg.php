<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN - REGISTER</title>

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
</head>
<body>
   <div class="container">
        <div class="from-box login">
            <form action="#" method="post">
                <h1>LOGIN</h1>
                <div class="input-box">
                    <input type="email" name="#" id="#" placeholder="Email" required>
                    <i class="fa-solid fa-envelope"></i>
                </div>

                <div class="input-box">
                    <input type="password" name="#" id="#" placeholder="Password" required>
                    <i class="fa-solid fa-envelope"></i>
                </div>

                <div class="forget-pass">
                    <a href="#">Forget Password</a>
                </div>
            </form>
        </div>
        <div class="form-box register"></div>

        <div class="toggle-box">
            <div class="toggle-panel toggle-left">
                <h1>Hello Welcome!</h1>
                <p>Don't have an account?</p>
                <button class="btn register-btn"></button>
            </div>
            <div class="toggle-panel toggle-right">
                <h1>Welcome Back!</h1>
                <p>Already have an account?</p>
                <button class="btn login-btn">Login</button>
            </div>
        </div>
   </div> 
</body>
<script src="script.js"></script>
</html>