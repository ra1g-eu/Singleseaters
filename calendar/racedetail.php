<?php
$racesArray = array('bahrain-gp', 'azerbaijan-gp', 'monaco-gp', 'spanish-gp', 'portuguese-gp', 'emilia-romagna-gp',
    'hungarian-gp', 'british-gp', 'austrian-gp', 'steiermark-gp', 'french-gp',
    'turkish-gp', 'russian-gp', 'italian-gp', 'dutch-gp', 'belgian-gp', 'saudi-arabia-gp', 'qatar-gp', 'brazilian-gp', 'mexican-gp', 'us-gp',
    'australian-gp', 'japanese-gp', 'abu-dhabi-gp', 'italian-race', 'russian-race', 'saudi-arabia-race', 'abu-dhabi-race', 'bahrain-race', 'monaco-race', 'azerbaijan-race', 'british-race');
$calendarFromJson = '';
$JsonCalendar = '';
$raceSlug = '';
$seriesGet = '';
$userTZ = !isset($_COOKIE['myTimezone']) ? 'Europe/Berlin' : $_COOKIE['myTimezone'];
function formatTime($time, $timezone, $useFullDayName = true)
{
    $formattedTime = new DateTime($time);
    $formattedTime->setTimezone(new DateTimeZone($timezone));
    return $useFullDayName == true ? $formattedTime->format('l d F H:i') : $formattedTime->format('d F H:i');
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    try {
        if (isset($_GET['race']) && isset($_GET['series'])) {
            $raceSlug = $_GET['race'];
            if (!in_array($raceSlug, $racesArray)) {

                ?>
                <div class="modal-header">
                    <h5 class="modal-title">Wrong race!</h5>
                    <button type="button" class="btn btn-white" data-bs-dismiss="modal" aria-label="Close">X</button>
                </div>
                <div class="modal-body">
                    <div class="row p-1">
                        <div class="col-sm-12">
                            <div class="card text-center bg-transparent border-primary my-1 m-2 mt-3 mb-3">
                                <div class="alert alert-danger">Wrong race selected. Please try again.</div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                exit;
            } else {
                $seriesGet = $_GET['series'];
                if ($seriesGet == 'f1') {
                    $calendarFromJson = file_get_contents("../dist/f1-races.json");
                }
                if ($seriesGet == 'f2') {
                    $calendarFromJson = file_get_contents("../dist/f2-races.json");
                }
                if ($seriesGet == 'indyCar') {
                    $calendarFromJson = file_get_contents("../dist/f1-races.json");
                }
                if ($seriesGet == 'superFormula') {
                    $calendarFromJson = file_get_contents("../dist/f1-races.json");
                }
                $JsonCalendar = json_decode($calendarFromJson, true);
                foreach ($JsonCalendar as $key => $calendarData) {
                    if ($calendarData['slug'] == $raceSlug) {
                        $firstDate = formatTime($calendarData['sessions']['first']['time'], $userTZ);
                        $secondDate = formatTime($calendarData['sessions']['second']['time'], $userTZ);
                        $thirdDate = formatTime($calendarData['sessions']['third']['time'], $userTZ);
                        $fourthDate = formatTime($calendarData['sessions']['fourth']['time'], $userTZ);
                        $fifthDate = formatTime($calendarData['sessions']['fifth']['time'], $userTZ, false);
                        ?>
                        <div class="modal-header">
                            <h5 class="modal-title"><?= $calendarData['name'] . ($seriesGet == 'f1' ? ' Grand Prix' : ' Race'); ?> @ <?= $calendarData['location']; ?></h5>
                            <button type="button" class="btn btn-white" data-bs-dismiss="modal" aria-label="Close">X
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="text-center">Round #<?= $calendarData['round']; ?></div>
                            <div class="row p-1">
                                <div class="col-sm-12">
                                    <div class="card text-center bg-transparent border-primary my-1 m-2 mt-3 mb-3">
                                        <div class="card-header bg-green justify-content-center">
                                            <span class="font-weight-medium text-h3">🏁 <?= $calendarData['sessions']['fifth']['name'] ?> 🏁</span>
                                        </div>
                                        <div class="card-body">
                                            <span class="font-weight-semibold">Sunday <?= $fifthDate; ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="card text-center bg-transparent border-primary my-1 m-2 mt-3 mb-3">
                                        <div class="card-header bg-bitbucket">
                                            <span class="fs-6">1. <?= $calendarData['sessions']['first']['name'] ?></span>
                                        </div>
                                        <div class="card-body">
                                            <span class="font-weight-bold"><?= $firstDate ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="card text-center bg-transparent border-primary my-1 m-2 mt-3 mb-3">
                                        <div class="card-header bg-bitbucket">
                                            <span class="fs-6">2. <?= $calendarData['sessions']['second']['name'] ?></span>
                                        </div>
                                        <div class="card-body">
                                            <span class="font-weight-bold"><?= $secondDate ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="card text-center bg-transparent border-primary my-1 m-2 mt-3 mb-3">
                                        <div class="card-header bg-bitbucket">
                                            <span class="fs-6">3. <?= $calendarData['sessions']['third']['name'] ?></span>
                                        </div>
                                        <div class="card-body">
                                            <span class="font-weight-bold"><?= $thirdDate ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="card text-center bg-transparent border-primary my-1 m-2 mt-3 mb-3">
                                        <div class="card-header bg-bitbucket">
                                            <span class="fs-6">4. <?= $calendarData['sessions']['fourth']['name'] ?></span>
                                        </div>
                                        <div class="card-body">
                                            <span class="font-weight-bold"><?= $fourthDate ?></span>
                                        </div>
                                    </div>
                                </div>
                                <p class="small text-muted text-center">Current timezone selected: <?= $userTZ ?>.</p>
                            </div>
                        </div>
                        <?php
                    }
                }
            }
        } else if ((empty($_GET['race']) && empty($_GET['series'])) || ctype_digit($_GET['series']) || is_float($_GET['series']) || strlen($_GET['series']) < 2) {
            ?>
            <div class="modal-header">
                <h5 class="modal-title">Wrong race</h5>
                <button type="button" class="btn btn-white" data-bs-dismiss="modal" aria-label="Close">X</button>
            </div>
            <div class="modal-body">
                <div class="row p-1">
                    <div class="col-sm-12">
                        <div class="card text-center bg-transparent border-primary my-1 m-2 mt-3 mb-3">
                            <div class="alert alert-danger">Wrong race selected. Please try again.</div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
    } catch (Exception $error) {
        header("Location: https://singleseaters.net/404");
    }
}
?>

