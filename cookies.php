<?php
$userTZ = !isset($_COOKIE['myTimezone']) ? 'Europe/Berlin' : $_COOKIE['myTimezone'];
//$userTheme = !isset($_COOKIE['myTheme']) ? '' : $_COOKIE['myTheme'];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        if (isset($_POST['setTimeZoneBtn'])) {
            $userTimezone = $_POST['timezoneSelect'];
            if($userTimezone == ""){
                header("500.php");
            }
            setcookie('myTimezone', $userTimezone, time()+2629743, "", "", true);
            unset ($userTimezone);
            header("Refresh:0");
        }
        /*if (isset($_POST['themeModeButton'])) {
            if(!isset($_COOKIE['myTheme'])){
                $userTh = 'theme-dark';
                setcookie('myTheme', $userTh, time()+2629743, "/", "", true);
                unset ($_POST['themeModeButton']);
                //header("Refresh:0");
            } else if(isset($_COOKIE['myTheme'])) {
                setcookie('myTheme', "", time()-3600, "/", "", true);
                unset ($_POST['themeModeButton']);
                //header("Refresh:0");
            }
        }*/
    } catch (Exception $error) {
        $failure = "<br>" . $error->getMessage();
    }
}