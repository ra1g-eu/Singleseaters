<?php
require "../cookies.php";
require "../dist/incl/calendarfunctions.php";
$f1DataFromJson = getCalendarFromJSON("../dist/f1-races.json");
$title = "Formula 1";
include_once("../header.php");
?>
<div class="page">
    <?php include_once("../nav.php"); ?>
    <div class="content">
        <div class="container-xl">

            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col-auto">
                        <p class="small text-muted">Click on a race to see more info.</p>
                        <h2 class="page-title">
                            Upcoming race - Formula 1 2021
                        </h2>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                <?php
                foreach ($f1DataFromJson as $key => $f1data) {
                    $raceDateCompare = new DateTime($f1data['sessions']['fifth']['time']);
                    $raceDateCompare = $raceDateCompare->setTimezone(new DateTimeZone('GMT-1'));
                    $raceDateCompare = $raceDateCompare->add(new DateInterval('PT2H'));
                    $raceDate = formatTime($f1data['sessions']['fifth']['time'], $userTZ, false);
                    if ($f1data['status']['code'] == 'next') {
                        ?>
                        <div class="col-12 p-2">
                            <div class="card border-primary border-left-wide border-0 shadow-sm hover-shadow-lg">
                                <div class="card-header justify-content-between align-items-center">
                                    <div>
                                        <span class="badge bg-primary p-1 rounded-3 text-h3">#<?= $f1data['round']; ?></span><span
                                                class="badge bg-success mx-1 text-h3 p-1 rounded-3"><?= $f1data['status']['text']; ?></span>
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
                                            🏎 <?= $f1data['name']; ?> Grand Prix <p class="font-weight-light">🏁
                                                Sunday <?= $raceDate ?></p>
                                        </a></h5>
                                </div>

                                <?php if ($f1data['status']['code'] == 'next') { ?>
                                    <div class="card-footer">
                                        <div class="card-text text-center p-0 m-0">
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
                                <?php } ?>
                            </div>
                        </div>
                    <?php }
                } ?>
            </div>
            <hr>
            <!-- Page title -->
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col-auto">
                        <h2 class="page-title">
                            Formula 1 Race Calendar - 2021 Season
                        </h2>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                <?php
                foreach ($f1DataFromJson as $key => $f1data) {
                    $raceDate = formatTime($f1data['sessions']['fifth']['time'], $userTZ, false);
                    $f1data['status']['code'] == 'upcoming' ? $statusCodeDefault = '' : ($f1data['status']['code'] == 'next' ? $statusCodeDefault = 'badge bg-success mx-1 ' : $statusCodeDefault = 'badge bg-info mx-1');
                    if ($f1data['status']['code'] != 'cancelled') {
                        ?>
                        <div class="col-lg-4 col-md-5 col-sm-6 p-2">
                            <div class="card border-primary border-left-wide border-0 shadow-sm hover-shadow-lg"
                                 id="<?= $f1data['slug']; ?>">
                                <div class="card-header justify-content-between align-items-center">
                                    <div>
                                        <span class="badge bg-primary p-1 rounded-3 text-h3">#<?= $f1data['round']; ?></span><span
                                                class="<?= $statusCodeDefault; ?> text-h3 p-1 rounded-3"><?= $f1data['status']['text']; ?></span>
                                    </div>
                                    <div>
                                        <span class="flag flag-md <?= $f1data['country-class']; ?>"></span>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title"><a
                                                class="stretched-link font-weight-extrabold text-decoration-none modalshowracedetail <?php if ($f1data['status']['code'] == 'ended') {
                                                    echo ' text-decoration-line-through';
                                                } ?>"
                                                href="calendar/racedetail.php?series=f1&race=<?= $f1data['slug']; ?>"
                                                role="button">
                                            🏎 <?= $f1data['name']; ?> GP <p class="font-weight-light">🏁
                                                Sunday <?= $raceDate ?></p>
                                        </a></h5>
                                </div>
                            </div>
                        </div>
                    <?php }
                } ?>
            </div>

            <hr>
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col-auto">
                        <h2 class="page-title">
                            Cancelled races
                        </h2>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                <?php
                foreach ($f1DataFromJson as $key => $f1data) {
                    $raceDate = formatTime($f1data['sessions']['fifth']['time'], $userTZ, false);
                    if ($f1data['status']['code'] == 'cancelled') {
                        ?>
                        <div class="col-lg-4 col-md-5 col-sm-6 p-2">
                            <div class="card border-secondary border-left-wide border-0 shadow-sm hover-shadow-lg">
                                <div class="card-header justify-content-between align-items-center">
                                    <div>
                                        <span class="badge bg-primary p-1 rounded-3 text-h3">#<?= $f1data['round']; ?></span><span
                                                class="badge bg-info mx-1 text-h3 p-1 rounded-3"><?= $f1data['status']['text']; ?></span>
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
                            </div>
                        </div>
                    <?php }
                } ?>
            </div>

            <!-- Content here -->
        </div>
        <?php include_once("../footer.php"); ?>
    </div>
</div>
<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="raceBox" aria-hidden="true"
     id="raceBox">
    <div class="modal-dialog">
        <div class="modal-content">

        </div>
    </div>
</div>
<?php include_once("../scriptsfooter.php"); ?>
</body>
</html>