<footer class="footer footer-transparent">
    <div class="container">
        <div class="row text-center align-items-center flex-row-reverse">
            <div class="col-lg-auto ml-lg-auto">
                <ul class="list-inline list-inline-dots mb-0">
                    <li class="list-inline-item"><a href="privacy" class="link-secondary">Privacy
                            Policy</a></li>
                    <li class="list-inline-item"><a href="faq" class="link-secondary">FAQ</a></li>
                    <li class="list-inline-item"><a href="roadmap" class="link-<?php if (preg_match("~\broadmap.php\b~", $_SERVER['PHP_SELF'])) { echo 'primary'; } else { echo 'secondary'; } ?>">Roadmap</a></li>
                    <li class="list-inline-item"><a href="https://ra1g.eu/" target="_blank"
                                                    class="link-secondary">Author</a></li>
                    <?php if(isset($_COOKIE['myLoginToken'])){ ?>
                    <li class="list-inline-item"><a href="admin/"
                                                    class="link-secondary">Dashboard</a></li>
                    <?php } else { ?>
                        <li class="list-inline-item"><a href="signin"
                                                        class="link-secondary">Sign In</a></li>
                    <?php } ?>
                </ul>
            </div>
            <div class="col-12 col-lg-auto mt-3 mt-lg-0">
                <a href="." class="link-secondary">© 2020 Theme by Tabler</a>.
            </div>
        </div>
    </div>
</footer>
<?php include_once ("dist/incl/cookie_modal.php");?>
