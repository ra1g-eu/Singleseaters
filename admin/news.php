<?php
include_once("header.php");
$json = file_get_contents('../dist/news.json');
$js = json_decode($json);
$result = null;
if(isset($_POST['newsSaveButton'])){
    $data = $_POST['newsArea'];
    file_put_contents("../dist/news.json", $data);
    file_put_contents("../dist/news-bckp.json", $data);
    $result = 'News saved!';
    $json = file_get_contents('../dist/news.json');
    $js = json_decode($json);
}
?>
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">News</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <span class="alert alert-info <?= $result == null ? ' invisible' : ''; ?>"> <?= $result == null ? '' : $result; ?> </span>
            </div>
        </div>
        <h2>Write news or edit existing ones.</h2>
        <p>Oldest news are on the bottom. Place new articles at the top. <br> Use template below:</p>
        <pre>
  {
    "news-id": "i00x",
    "news-title": "",
    "news-small-desc" : "",
    "news-date" : "xx.xx.2021",
    "news-slug" : "news-title-i00x",
    "news-text" : "base64",
    "news-author" : "ra1g",
    "news-category" : {
      "category-main" : "",
      "category-secondary" : ""
    }
  },
        </pre>
        <form name="news" method="post">
            <button name="newsSaveButton" id="newsSaveButton" class="btn btn-lg btn-success"><i class="fas fa-check"></i> Save news</button>
            <hr>
            <label for="news">
            <textarea name="newsArea" id="news" rows="25" cols="100">
                <?= json_encode($js, JSON_PRETTY_PRINT); ?>
            </textarea>
            </label>
            <hr>
            <button name="newsSaveButton" id="newsSaveButton" class="btn btn-lg btn-success"><i class="fas fa-check"></i> Save news</button>
        </form>
    </main>
<?php
include_once("footer.php");
?>