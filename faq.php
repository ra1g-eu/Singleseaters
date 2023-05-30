<?php
require "cookies.php";
$title = "Frequently Asked Questions";
$rawJsonFaq = file_get_contents("dist/faq.json");
$faqJson = json_decode($rawJsonFaq, true);
include_once("header.php"); ?>
<div class="page">
    <?php include_once("nav.php"); ?>
    <div class="content">
        <div class="container-xl">
            <!-- Page title -->
            <div class="page-header">
                <div class="row">
                    <h2 class="page-title text-center">
                        Questions you might ask frequently
                    </h2>
                </div>
            </div>
            <hr>
            <div class="row justify-content-center">
                <div class="accordion" id="faqAcc">
                    <?php foreach ($faqJson as $key => $faqItem){ ?>
                    <div class="accordion-item">
                            <div class="card bg-transparent border-0 shadow-none" id="<?= $faqItem['faq-accordion-id'] ?>Heading">
                                <div class="list list-row">
                                    <div class="list-item">
                                        <div><i class="fas fa-question-circle fa-2x text-info"></i></div>
                                        <div class="text-wrap flex-sm-wrap">
                                            <button class="btn btn-info collapsed stretched-link visually-hidden" type="button" data-bs-toggle="collapse" data-bs-target="#<?= $faqItem['faq-accordion-id'] ?>Collapse" aria-expanded="false" aria-controls="<?= $faqItem['faq-accordion-id'] ?>Collapse">
                                                <span><?= $faqItem['faq-question'] ?></span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <div id="<?= $faqItem['faq-accordion-id'] ?>Collapse" class="accordion-collapse collapse" aria-labelledby="<?= $faqItem['faq-accordion-id'] ?>Heading" data-bs-parent="#faqAcc">
                            <div class="card">
                                <div class="list list-row">
                                    <div class="list-item">
                                        <div><i class="fas fa-caret-square-right fa-2x text-info"></i></div>
                                        <div class="text-wrap flex-sm-wrap">
                                            <?= $faqItem['faq-answer'] ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <?php include_once ("footer.php");?>
    </div>
</div>
<?php include_once ("scriptsfooter.php");?>
