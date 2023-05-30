<?php
include_once("header.php");
$json = file_get_contents('../dist/f2-races.json');
$js = json_decode($json);
$result = null;
if(isset($_POST['f2CalSaveButton'])){
    $data = $_POST['f2calArea'];
    file_put_contents("../dist/f2-races.json", $data);
    file_put_contents("../dist/f2-races-bckp.json", $data);
    $result = 'Calendar saved!';
    $json = file_get_contents('../dist/f2-races.json');
    $js = json_decode($json);
}
?>
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Formula 2 Calendar</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <span class="alert alert-info <?= $result == null ? ' invisible' : ''; ?>"> <?= $result == null ? '' : $result; ?> </span>
            </div>
        </div>
        <h2>Select F2 season</h2>
        <p>2021 Season available only.</p>
        <form name="f2Cal" method="post">
            <button name="f2CalSaveButton" id="f2CalSaveButton" class="btn btn-lg btn-success"><i class="fas fa-check"></i> Save calendar</button>
            <hr>
            <label for="f2cal">
            <textarea name="f2calArea" id="f2cal" rows="25" cols="100">
                <?= json_encode($js, JSON_PRETTY_PRINT); ?>
            </textarea>
            </label>
            <hr>
            <button name="f2CalSaveButton" id="f2CalSaveButton" class="btn btn-lg btn-success"><i class="fas fa-check"></i> Save calendar</button>
        </form>
    </main>
<?php
include_once("footer.php");
?>