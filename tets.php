<?php

// Read the JSON file
$json = file_get_contents('dist/f1-races.json');
$js = json_decode($json);
$result = null;
if(isset($_POST['Btn'])){
    $data = $_POST['cal'];
    file_put_contents("dist/f1-races.json", $data);
    $result = 'Saved';
}
?>

<html lang="en">
<body>
<form method="post" name="saveF">
<label>
    <textarea style="width: 600px; height: 500px" name="cal">
    <?= json_encode($js, JSON_PRETTY_PRINT); ?>
    </textarea>
</label>
    <hr>
    <button type="submit" name="Btn">Save calendar</button>
</form>
<span> <?= $result == null ? '' : $result; ?> </span>
</body>
</html>
