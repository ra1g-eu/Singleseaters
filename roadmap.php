<?php
require "cookies.php";
$title = "Development roadmap";
include_once("header.php"); ?>
<div class="page">
    <?php include_once("nav.php"); ?>
    <div class="content">
        <div class="container-xl">
            <!-- Page title -->
            <div class="page-header">
                <div class="row">
                    <h2 class="page-title text-center">
                        Roadmap for Singleseaters.net development
                    </h2>
                    <p class="small text-muted text-center">Last update: 04.10.2021</p>
                </div>
            </div>
            <div class="card">
                <div class="list list-row">
                    <div class="list-item">
                        <div><i class="fas fa-caret-square-right fa-2x text-info"></i></div>
                        <div class="text-wrap flex-sm-wrap">
                            <span>Next release progress</span>
                            <small class="d-block text-muted text-wrap flex-sm-wrap mt-n1">90% completed</small>
                            <small class="d-block text-muted text-wrap flex-sm-wrap mt-n1">Updated 04.10.2021</small>
                        </div>
                    </div>
                    <div class="progress">
                        <div class="progress-bar rounded-0" style="width: 90%" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100">
                            <span class="sr-only"> 90% Complete</span>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col-auto">
                        <p class="small text-muted">These will be released as soon as possible.</p>
                        <h2 class="page-title">
                            Features planned in the next release
                        </h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="card">
                    <div class="list list-row">
                        <div class="list-item">
                            <div><i class="fas fa-question fa-2x text-success"></i></div>
                            <div class="text-wrap flex-sm-wrap">
                                <span>Articles & news</span>
                                <small class="d-block text-muted text-wrap flex-sm-wrap mt-n1">So you can know if that race is getting cancelled or postponed</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col-auto">
                        <p class="small text-muted">These are not top priority. Will be release when they are bug-free.</p>
                        <h2 class="page-title">
                            Features planned in future releases
                        </h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="card">
                    <div class="list list-row">
                        <div class="list-item">
                            <div><i class="fas fa-caret-square-right fa-2x text-secondary"></i></div>
                            <div class="text-wrap flex-sm-wrap">
                                <span>Create IndyCar calendar page</span>
                                <small class="d-block text-muted text-wrap flex-sm-wrap mt-n1">Similar to other calendar pages</small>
                            </div>
                        </div>
                        <div class="list-item">
                            <div><i class="fas fa-caret-square-right fa-2x text-secondary"></i></div>
                            <div class="text-wrap flex-sm-wrap">
                                <span>Create Super Formula calendar page</span>
                                <small class="d-block text-muted text-wrap flex-sm-wrap mt-n1">Similar to other calendar pages</small>
                            </div>
                        </div>
                        <div class="list-item">
                            <div><i class="fas fa-caret-square-right fa-2x text-secondary"></i></div>
                            <div class="text-wrap flex-sm-wrap">
                                <span>Create Competing Teams & Race Results page</span>
                                <small class="d-block text-muted text-wrap flex-sm-wrap mt-n1">Similar to other pages</small>
                            </div>
                        </div>
                        <div class="list-item">
                            <div><i class="fas fa-caret-square-right fa-2x text-secondary"></i></div>
                            <div class="">
                                <span>Design a logo</span>
                                <small class="d-block text-muted text-wrap flex-sm-wrap mt-n1">Something simple to represent Singleseaters.net</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col-auto">
                        <p class="small text-muted">These might or might not be ever released.</p>
                        <h2 class="page-title">
                            Features that might be implemented one day
                        </h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="card">
                    <div class="list list-row">
                        <div class="list-item">
                            <div><i class="fas fa-caret-square-right fa-2x text-gray"></i></div>
                            <div class="">
                                <span>Create a forum to discuss races</span>
                                <small class="d-block text-muted text-wrap flex-sm-wrap mt-n1">Simple forum to talk about racing</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col-auto">
                        <p class="small text-muted">Live features that you are using right now</p>
                        <h2 class="page-title">
                            Published features
                        </h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="card">
                    <div class="list list-row">
                        <div class="list-item">
                            <div><i class="fas fa-caret-square-right fa-2x text-primary"></i></div>
                            <div class="">
                                <span>Formula 1 calendar page</span>
                                <small class="d-block text-muted text-wrap flex-sm-wrap mt-n1">All races in one place</small>
                            </div>
                        </div>
                        <div class="list-item">
                            <div><i class="fas fa-caret-square-right fa-2x text-primary"></i></div>
                            <div class="">
                                <span>Formula 2 calendar page</span>
                                <small class="d-block text-muted text-wrap flex-sm-wrap mt-n1">All races in one place</small>
                            </div>
                        </div>
                        <div class="list-item">
                            <div><i class="fas fa-caret-square-right fa-2x text-primary"></i></div>
                            <div class="">
                                <span>Privacy Policy page</span>
                                <small class="d-block text-muted text-wrap flex-sm-wrap mt-n1">That legal stuff</small>
                            </div>
                        </div>
                        <div class="list-item">
                            <div><i class="fas fa-caret-square-right fa-2x text-primary"></i></div>
                            <div class="">
                                <span>Roadmap page</span>
                                <small class="d-block text-muted text-wrap flex-sm-wrap mt-n1">This is it</small>
                            </div>
                        </div>
                        <div class="list-item">
                            <div><i class="fas fa-caret-square-right fa-2x text-primary"></i></div>
                            <div class="">
                                <span>Main page</span>
                                <small class="d-block text-muted text-wrap flex-sm-wrap mt-n1">Home page with upcoming races and news</small>
                            </div>
                        </div>
                        <div class="list-item">
                            <div><i class="fas fa-caret-square-right fa-2x text-primary"></i></div>
                            <div class="">
                                <span>Light/Dark mode</span>
                                <small class="d-block text-muted text-wrap flex-sm-wrap mt-n1">For if you need a change in your life</small>
                            </div>
                        </div>
                        <div class="list-item">
                            <div><i class="fas fa-caret-square-right fa-2x text-primary"></i></div>
                            <div class="">
                                <span>Timezones</span>
                                <small class="d-block text-muted text-wrap flex-sm-wrap mt-n1">We welcome everyone from every place in the world</small>
                            </div>
                        </div>
                        <div class="list-item">
                            <div><i class="fas fa-caret-square-right fa-2x text-primary"></i></div>
                            <div class="">
                                <span>FAQ page</span>
                                <small class="d-block text-muted text-wrap flex-sm-wrap mt-n1">Questions and answers</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include_once ("footer.php");?>
    </div>
</div>
<?php include_once ("scriptsfooter.php");?>
