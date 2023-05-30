<?php
require "cookies.php";
require "dist/incl/calendarfunctions.php";
$f1DataFromJson = getCalendarFromJSON("dist/f1-races.json");
$f2DataFromJson = getCalendarFromJSON("dist/f2-races.json");
$news = getCalendarFromJSON("dist/news.json");
$title = "Home";
include_once("header.php"); ?>
<div class="page">
    <?php include_once("nav.php"); ?>
    <div class="content">
        <div class="container-xl">
            <div class="alert alert-info alert-dismissible text-h3" role="alert">
                <i class="fas fa-info-circle mx-1"></i>
                Website is still in active development. Things can and will improve and/or change. Thank you for
                understanding.
                <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">&times;</button>
            </div>
            <!-- Page title -->
            <div class="page-header">
                <div class="row">
                    <h2 class="page-title text-center">
                        Welcome to Singleseaters.net
                    </h2>
                </div>
            </div>
            <hr>
            <div class="row justify-content-center">
                <div class="page-header">
                    <div class="row justify-content-between">
                        <div class="col-auto">
                            <p class="small text-muted">Click on a race to see more info.</p>
                        </div>
                        <h2 class="page-title">
                            <i class="fas fa-forward"></i> Upcoming races
                        </h2>
                    </div>
                </div>
                <div class="col-lg-4 col-md-5 col-sm-6 p-2">
                    <?php
                    $now = new DateTime();
                    $now->setTimezone(new DateTimeZone($userTZ));
                    foreach ($f1DataFromJson as $key => $f1data) {
                        if ($f1data['status']['code'] == 'next') {
                            $raceDateCompare = new DateTime($f1data['sessions']['fifth']['time']);
                            $raceDateCompare = $raceDateCompare->setTimezone(new DateTimeZone('GMT-1'));
                            $raceDateCompare = $raceDateCompare->add(new DateInterval('PT2H'));
                            $raceDate = formatTime($f1data['sessions']['fifth']['time'], $userTZ, false);
                            ?>
                            <div class="card border-primary border-left-wide border-0 shadow-sm hover-shadow-lg">
                                <div class="card-header justify-content-between align-items-center">
                                    <div>
                                        <span class="badge bg-primary p-1 rounded-3 text-h3">#<?= $f1data['round']; ?></span>
                                        <span class="badge bg-primary mx-1 text-h3 p-1 rounded-3">FORMULA 1</span>
                                    </div>
                                    <div>
                                        <span class="flag flag-md <?= $f1data['country-class']; ?>"></span>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title"><a
                                                class="stretched-link font-weight-extrabold text-decoration-none modalshowracedetail"
                                                href="calendar/racedetail.php?series=f1&race=<?= $f1data['slug']; ?>"
                                                role="button">
                                            🏎 <?= $f1data['name']; ?> GP <p class="font-weight-light">🏁
                                                Sunday <?= $raceDate ?></p>
                                        </a></h5>
                                </div>
                                <div class="card-footer">
                                    <div class="card-text text-center p-0 m-0">
                                        <div id="f1timer"></div>
                                        <div id="clockdiv">
                                            <div class="d-flex justify-content-center">
                                                <span class="days badge bg-primary rounded-0"
                                                      style="font-size: 20px"></span>
                                                <span class="badge bg-primary rounded-0"
                                                      style="font-size: 20px">Days</span>
                                            </div>
                                            <div class="d-flex justify-content-center">
                                                <span class="hours badge bg-info rounded-0"
                                                      style="font-size: 20px"></span>
                                                <span class="badge bg-info rounded-0"
                                                      style="font-size: 20px">Hours</span>
                                            </div>
                                            <div class="d-flex justify-content-center">
                                                <span class="minutes badge bg-secondary rounded-0"
                                                      style="font-size: 20px"></span>
                                                <span class="badge bg-secondary rounded-0" style="font-size: 20px">Minutes</span>
                                            </div>
                                        </div>
                                    </div>
                                    <script>
                                        const deadline = new Date("<?php echo $raceDateCompare->format("M d, Y H:i") ?>");
                                    </script>
                                </div>
                            </div>
                        <?php }
                    } ?>
                </div>
                <div class="col-lg-4 col-md-5 col-sm-6 p-2">
                    <?php foreach ($f2DataFromJson as $key => $f2data) {
                        $raceDateCompareF2 = new DateTime($f2data['sessions']['fifth']['time']);
                        $raceDateCompareF2 = $raceDateCompareF2->add(new DateInterval('PT2H'));
                        $raceDateF2 = formatTime($f2data['sessions']['fifth']['time'], $userTZ, false);
                        if ($f2data['status']['code'] == 'next') {
                            ?>
                            <div class="card border-secondary border-left-wide border-0 shadow-sm hover-shadow-lg">
                                <div class="card-header justify-content-between align-items-center">
                                    <div>
                                        <span class="badge bg-secondary p-1 rounded-3 text-h3">#<?= $f2data['round']; ?></span><span
                                                class="badge bg-secondary mx-1 text-h3 p-1 rounded-3">FORMULA 2</span>
                                    </div>
                                    <div>
                                        <span class="flag flag-md <?= $f2data['country-class']; ?>"></span>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title"><a
                                                class="stretched-link font-weight-extrabold text-decoration-none modalshowracedetail"
                                                href="calendar/racedetail.php?series=f2&race=<?= $f2data['slug']; ?>"
                                                role="button">
                                            🏎 <?= $f2data['name']; ?> <p class="font-weight-light">🏁
                                                Sunday <?= $raceDateF2 ?></p>
                                        </a></h5>
                                </div>

                                <?php if ($f2data['status']['code'] == 'next') { ?>
                                    <div class="card-footer">
                                        <div class="card-text text-center p-0 m-0">
                                            <div id="clockdivF2">
                                                <div class="d-flex justify-content-center">
                                                <span class="days badge bg-primary rounded-0"
                                                      style="font-size: 20px"></span>
                                                    <span class="badge bg-primary rounded-0"
                                                          style="font-size: 20px">Days</span>
                                                </div>
                                                <div class="d-flex justify-content-center">
                                                <span class="hours badge bg-info rounded-0"
                                                      style="font-size: 20px"></span>
                                                    <span class="badge bg-info rounded-0"
                                                          style="font-size: 20px">Hours</span>
                                                </div>
                                                <div class="d-flex justify-content-center">
                                                <span class="minutes badge bg-secondary rounded-0"
                                                      style="font-size: 20px"></span>
                                                    <span class="badge bg-secondary rounded-0" style="font-size: 20px">Minutes</span>
                                                </div>
                                            </div>
                                        </div>
                                        <script>
                                            const deadlineF2 = new Date("<?php echo $raceDateCompareF2->format("M d, Y H:i") ?>");
                                        </script>
                                    </div>
                                <?php } ?>
                            </div>
                        <?php }
                    } ?>
                </div>
            </div>
            <hr>
            <div class="row justify-content-center">
                <div class="page-header">
                    <div class="row align-items-center">
                        <div class="col-auto">
                            <h2 class="page-title">
                                <i class="fas fa-newspaper"></i> Latest news
                            </h2>
                        </div>
                    </div>
                </div>
                <?php foreach ($news as $key => $news_items) {
                    if($key <= 4){
                    ?>
                <div class="col-lg-6 col-md-6 col-sm-6" id="<?= $news_items['news-id']; ?>">
                    <div class="card border-info border-left-wide border-0 shadow-sm hover-shadow-lg">
                        <div class="card-header justify-content-center">
                            <div class="text-h3 float-start">
                                <?= $news_items['news-title']; ?>
                            </div>
                            <div class="float-end">

                            </div>
                        </div>
                        <div class="card-body">
                            <div class="card-text"><?= $news_items['news-small-desc']; ?></div>
                        </div>
                        <div class="card-footer text-center">
                            <span class="badge bg-primary p-1 rounded-3 text-h4"><?= $news_items['news-date']; ?></span>
                            <span class="badge bg-secondary p-1 rounded-3 text-h4"><?= $news_items['news-category']['category-main']; ?></span>
                            <span class="badge bg-secondary p-1 rounded-3 text-h4"><?= $news_items['news-category']['category-secondary']; ?></span>
                        </div>
                    </div>
                </div>
                <?php }} ?>
            </div>
            <!-- Content here -->
        </div>
        <?php include_once("footer.php"); ?>
    </div>
</div>
<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="raceBox" aria-hidden="true"
     id="raceBox">
    <div class="modal-dialog">
        <div class="modal-content">

        </div>
    </div>
</div>
<?php include_once("scriptsfooter.php"); ?>
