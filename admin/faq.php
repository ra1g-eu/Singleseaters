<?php
include_once("header.php");
$json = file_get_contents('../dist/faq.json');
$js = json_decode($json);
$result = null;
if(isset($_POST['faqSaveButton'])){
    $data = $_POST['faqArea'];
    file_put_contents("../dist/faq.json", $data);
    file_put_contents("../dist/faq-bckp.json", $data);
    $result = 'FAQ saved!';
    $json = file_get_contents('../dist/faq.json');
    $js = json_decode($json);
}
?>
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Frequently Asked Questions</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <span class="alert alert-info <?= $result == null ? ' invisible' : ''; ?>"> <?= $result == null ? '' : $result; ?> </span>
            </div>
        </div>
        <h2>Add new or edit existing FAQs</h2>
        <form name="faq" method="post">
            <button name="faqSaveButton" id="faqSaveButton" class="btn btn-lg btn-success"><i class="fas fa-check"></i> Save FAQ</button>
            <hr>
            <label for="faq">
            <textarea name="faqArea" id="faq" rows="25" cols="100">
                <?= json_encode($js, JSON_PRETTY_PRINT); ?>
            </textarea>
            </label>
            <hr>
            <button name="faqSaveButton" id="faqSaveButton" class="btn btn-lg btn-success"><i class="fas fa-check"></i> Save FAQ</button>
        </form>
    </main>
<?php
include_once("footer.php");
?>