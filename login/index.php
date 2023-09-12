<?php require_once '../header.php';
if (isset($_SESSION['username'])) {?>
    <script>
        window.location.href = "https://danielpekel.nl/dashboard";
    </script>
    <?php }
$msg = '';
if (isset($_POST['submit'])) {
    $username = escape($_POST['username']);
    $password = escape($_POST['password']);
    if ($username != "" && $password != "") {
        if ($username == 'daniel' && $password == 'test') {
            $_SESSION['username'] = 'test'?>
            <script>
                window.location.href = "https://danielpekel.nl/dashboard";
            </script>
        <?php } else {
            $msg = 'Gebruikersnaam of wachtwoord is onjuist';
            return false;
        }
    } else {
        $msg = 'Vul alle velden in aub.';
    }
}

?>

<div class="w-100 vh-100 bg-black">
    <div class="container">
        <div class="row ptplaceform justify-content-center">
            <div class="rounded-5 col-10 col-md-3 bg-white text-center py-3">
                <h2 class="fw-bold mb-4">Login</h2>
                <form method="POST" name="loginform">
                    <input type="text" name="username" class="form-control my-3" placeholder="Username"/>
                    <input type="password" name="password" class="form-control" placeholder="Password"/>
                    <input type="submit" name="submit" class="btn btn-primary mt-3 w-100 mb-2" value="Login">
                    <?php
                    if (!empty($msg)): ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo $msg; ?>
                        </div>
                    <?php endif; ?>
                </form>
            </div>
        </div>
    </div>
</div>

<?php require_once '../footer.php'; ?>
