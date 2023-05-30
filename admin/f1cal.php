<?php
include_once("header.php");
$json = file_get_contents('../dist/f1-races.json');
$js = json_decode($json);
$result = null;
if(isset($_POST['f1CalSaveButton'])){
    $data = $_POST['f1calArea'];
    file_put_contents("../dist/f1-races.json", $data);
    file_put_contents("../dist/f1-races-bckp.json", $data);
    $result = 'Calendar saved!';
    $json = file_get_contents('../dist/f1-races.json');
    $js = json_decode($json);
}
?>
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Formula 1 Calendar</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <span class="alert alert-info <?= $result == null ? ' invisible' : ''; ?>"> <?= $result == null ? '' : $result; ?> </span>
            </div>
        </div>
        <h2>Select F1 season</h2>
        <p>2021 Season available only.</p>
        <form name="F1Cal" method="post">
            <button name="f1CalSaveButton" id="f1CalSaveButton" class="btn btn-lg btn-success"><i class="fas fa-check"></i> Save calendar</button>
            <hr>
            <label for="f1cal">
            <textarea name="f1calArea" id="f1cal" rows="25" cols="100">
                <?= json_encode($js, JSON_PRETTY_PRINT); ?>
            </textarea>
            </label>
            <hr>
            <button name="f1CalSaveButton" id="f1CalSaveButton" class="btn btn-lg btn-success"><i class="fas fa-check"></i> Save calendar</button>
        </form>
    </main>
<?php
include_once("footer.php");
?>