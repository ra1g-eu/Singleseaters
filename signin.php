<?php
if(isset($_COOKIE['myLoginToken'])){
    header("Location: 500.php");
}
require "cookies.php";
$title = "Sign in";
$numOfFail = 0;
$failure = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        if (isset($_POST['signinButton'])) {
            $userToken = $_POST['accountToken'];
            if($userToken === '1e488f15c4b4cb0c7682877cf9c0f2f6a8d5de739c269'){
                if(isset($_POST['rememberMe'])){
                    setcookie('myLoginToken', $userToken, [
                        'expires' => time() + 5184000,
                        'path' => '/',
                        'domain' => '',
                        'secure' => true,
                        'httponly' => false,
                        'samesite' => 'Strict',
                    ]);
                    $numOfFail = 0;
                    header("Location: admin/");
                } else {
                    setcookie('myLoginToken', $userToken, [
                        'expires' => time() + 3600,
                        'path' => '/',
                        'domain' => '',
                        'secure' => true,
                        'httponly' => false,
                        'samesite' => 'Strict',
                    ]);
                    $numOfFail = 0;
                    header("Location: admin/");
                }
            } else {
                $numOfFail++;
                $failure = 'Invalid token. Please try again.';
            }
        }
    } catch (Exception $error) {
        $failure = "<br>" . $error->getMessage();
    }
}
if($numOfFail == 3){
    header("Location: 500.php");
}
include_once("header.php");
?>
<div class="flex-fill d-flex flex-column justify-content-center">
    <div class="container-tight py-6">
        <div class="text-center mb-4">
            <img src="" height="36" alt="">
        </div>
        <form class="card card-md" method="post">
            <div class="card-body">
                <h2 class="mb-5 text-center">Sign in to your account</h2>
                <span><?= $failure; ?></span>
                <div class="mb-3">
                    <label class="form-label">Login token</label>
                    <input type="text" class="form-control" placeholder="Enter token" name="accountToken" autocomplete="off" required>
                </div>
                <div class="mb-2">
                    <label class="form-check">
                        <input type="checkbox" name="rememberMe" class="form-check-input"/>
                        <span class="form-check-label">Remember me on this device</span>
                    </label>
                </div>
                <div class="form-footer">
                    <button type="submit" class="btn btn-primary btn-block" name="signinButton">Sign in</button>
                </div>
            </div>
        </form>
    </div>
</div>
<?php include_once("footer.php"); ?>