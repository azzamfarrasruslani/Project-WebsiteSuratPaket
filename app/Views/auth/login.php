<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Surat Paket</title>
    <!-- Shortcut Icon -->
    <link rel="shortcut icon" href="<?= BASE_URL; ?>assets/images/envelope_icon.svg">
    <!-- CSS -->
    <link rel="stylesheet" href="<?= BASE_URL; ?>assets/css/styleLogin.css">
    <link href="<?= BASE_URL; ?>assets/css/styles.css" rel="stylesheet" />
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Averia+Serif+Libre:wght@300&family=Baloo+Thambi+2&family=Barlow+Semi+Condensed:ital,wght@1,100&family=Montserrat:wght@200;300;500;700&family=Poppins:wght@100;200;300;500;700&family=Roboto:wght@300&display=swap"
        rel="stylesheet" />
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/c23fedd423.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="content">
        <div class="img-login">
            <img src="<?= BASE_URL; ?>assets/images/Pcr Ilustrator.png" alt="Login Image" class="img-Log mx-auto">
        </div>
        <div class="login-sec">
            <h1>Login</h1>
            <h2>Silahkan masukan username dan password anda</h2>

            <div class="form-input">
            <?php if (isset($_SESSION['error'])): ?>
                    <p class="text-red-600 mt-4"><?= $_SESSION['error']; ?></p>
                    <?php unset($_SESSION['error']); ?>
                <?php endif; ?>
                <form action="<?= BASE_URL; ?>/auth/authenticate" id="loginForm" method="POST" class="space-y-8">
                    <div class="input-group">
                        <i class="fa-solid fa-user" style="color: #1c1678"></i>
                        <input type="text" placeholder="Username" id="username" name="username" required />
                    </div>
                    <div class="input-group">
                        <i class="fa-solid fa-key" style="color: #1c1678"></i>
                        <input type="password" placeholder="Password" id="password" name="password" required />
                    </div>
                    <input type="submit" name="login" value="Login" class="btn">
                </form>
            </div>
        </div>
    </div>
    <!-- Script for validation -->
    <script type="text/javascript">
        document.getElementById('loginForm').addEventListener('submit', function (event) {
            const username = document.getElementById('username');
            const password = document.getElementById('password');
            let valid = true;

            if (!username.value) {
                username.classList.add('border-red-600');
                valid = false;
            } else {
                username.classList.remove('border-red-600');
            }

            if (!password.value) {
                password.classList.add('border-red-600');
                valid = false;
            } else {
                password.classList.remove('border-red-600');
            }

            if (!valid) {
                event.preventDefault();
            }
        });
    </script>
</body>
</html>
