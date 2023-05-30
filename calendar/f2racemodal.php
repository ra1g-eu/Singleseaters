<?php
$userTZ = !isset($_COOKIE['myTimezone']) ? 'Europe/Berlin' : $_COOKIE['myTimezone'];
function formatTime($time, $timezone, $useFullDayName = true)
{
    $formattedTime = new DateTime($time);
    $formattedTime->setTimezone(new DateTimeZone($timezone));
    return $useFullDayName == true ? $formattedTime->format('l d F H:i') : $formattedTime->format('d F H:i');
}
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    try {
        if (isset($_GET['race'])) {
            $raceslug = $_GET['race'];
            $string = file_get_contents("../dist/f2-races.json");
            $json_a = json_decode($string, true);
            $now = new DateTime();
            $now->setTimezone(new DateTimeZone($userTZ));
        }
        ?>
        <?php
        foreach ($json_a as $key => $f2data) {
            if ($f2data['slug'] == $raceslug) {
                $raceDate = formatTime($f2data['sessions']['feature'], $userTZ, false);
                $practiceDate = formatTime($f2data['sessions']['practice'], $userTZ);
                $qualifying = formatTime($f2data['sessions']['qualifying'], $userTZ);
                $sprint1Date = formatTime($f2data['sessions']['sprint1'], $userTZ);
                $sprint2Date = formatTime($f2data['sessions']['sprint2'], $userTZ);
                $f2data['status']['code'] == 'upcoming' ? $statusCodeDefault = 'hidden' : ($f2data['status']['code'] == 'next' ? $statusCodeDefault = 'bg-success' : $statusCodeDefault = 'bg-info');
                ?>
                <button type="button" class="btn btn-outline-info rounded-0" data-bs-dismiss="modal"
                        aria-label="Close">Close window
                </button>
                <div class="modal-header justify-content-between">
                    <h5 class="modal-title"><?= $f2data['name']; ?> Grand Prix</h5>
                    <h5 class="modal-title">Round #: <?= $f2data['round']; ?></h5>
                </div>
                <div class="modal-body">
                    <div class="row p-1">
                        <div class="col-sm-6">
                            <div class="card text-center bg-transparent border-primary my-1 m-2 mt-3 mb-3">
                                <div class="card-header text-white bg-primary">
                                    <span class="fw-light fs-6">Location</span>
                                </div>
                                <div class="card-body">
                                    <span class="font-weight-bold"><?= $f2data['location']; ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="card text-center bg-transparent border-primary my-1 m-2 mt-3 mb-3">
                                <div class="card-header text-white bg-primary">
                                    <span class="fw-light fs-6">Feature Race</span>
                                </div>
                                <div class="card-body">
                                    <span class=" font-weight-bold ">Sunday <?= $raceDate ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="card text-center bg-transparent border-primary my-1 m-2 mt-3 mb-3">
                                <div class="card-header text-white  bg-primary">
                                    <span class="fw-light fs-6">Practice</span>
                                </div>
                                <div class="card-body">
                                    <span class=" font-weight-bold "><?= $practiceDate; ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="card text-center bg-transparent border-primary my-1 m-2 mt-3 mb-3">
                                <div class="card-header text-white  bg-primary">
                                    <span class="fw-light fs-6">Sprint Race 1</span>
                                </div>
                                <div class="card-body">
                                    <span class=" font-weight-bold "><?=$sprint1Date?></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="card text-center bg-transparent border-primary my-1 m-2 mt-3 mb-3">
                                <div class="card-header text-white  bg-primary">
                                    <span class="fw-light fs-6">Sprint Race 2</span>
                                </div>
                                <div class="card-body">
                                    <span class=" font-weight-bold "><?= $sprint2Date; ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="card text-center bg-transparent border-primary my-1 m-2 mt-3 mb-3">
                                <div class="card-header text-white  bg-primary">
                                    <span class="fw-light fs-6">Qualification</span>
                                </div>
                                <div class="card-body">
                                    <span class=" font-weight-bold "><?=$qualifying?></span>
                                </div>
                            </div>
                        </div>
                        <p class="small text-muted text-center">Current timezone selected: <?= $userTZ ?>.</p>
                    </div>
                </div>
                <button type="button" class="btn btn-outline-info rounded-0" data-bs-dismiss="modal"
                        aria-label="Close">Close window
                </button>
                <?php
                break;
            } else if ($raceslug == null) {
                echo 'Wrong race';
                break;
            }
        }
    } catch (PDOException $error) {
        $failure = "<br>" . $error->getMessage();
    }
}
?>

