<script>
    function getTimeRemaining(endtime) {
        const total = Date.parse(endtime) - Date.parse(new Date());
        const minutes = Math.floor((total / 1000 / 60) % 60);
        const hours = Math.floor((total / (1000 * 60 * 60)) % 24);
        const days = Math.floor(total / (1000 * 60 * 60 * 24));

        return {
            total,
            days,
            hours,
            minutes
        };
    }

    function initializeClock(id, endtime) {
        const clock = document.getElementById(id);
        const daysSpan = clock.querySelector('.days');
        const hoursSpan = clock.querySelector('.hours');
        const minutesSpan = clock.querySelector('.minutes');

        function updateClock() {
            const t = getTimeRemaining(endtime);

            daysSpan.innerHTML = t.days;
            hoursSpan.innerHTML = ('0' + t.hours).slice(-2);
            minutesSpan.innerHTML = ('0' + t.minutes).slice(-2);
            if (t.total < 0) {
                document.getElementById(id).innerHTML = "RACE STARTED";
                if (t.total < -540000) {
                    document.getElementById(id).innerHTML = "RACE FINISHED";
                }
            }
        }

        updateClock();
        setInterval(updateClock, 1000);

    }

    initializeClock('clockdiv', deadline);
    initializeClock('clockdivF2', deadlineF2);
</script>
<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>
<!-- Libs JS -->
<script src="dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="dist/js/tabler.min.js"></script>
<script src="dist/js/cookiealert.js"></script>
<script src="dist/js/jquery-ui.min.js"></script>
<script>
    function setCookie(cname, cvalue, exdays) {
        const d = new Date();
        d.setTime(d.getTime() + (exdays*24*60*60*1000));
        let expires = "expires="+ d.toUTCString();
        document.cookie = cname + "=" + cvalue + ";" + expires + ";SameSite=Strict; Secure;" + "path=/";
    }
</script>
<script>
    $(document).ready(function () {
        $(".modalshowracedetail").on('click', function (e) { //trigger when link clicked
            e.preventDefault();
            $('#raceBox').modal('show'); //force modal to show
            $('.modal-content').load($(this).attr('href')); //load content from link's href
        });
    });
</script>
<script>
    $(document).ready(function () {
        $('#themeModeButton').click(function() {
            if($('body').hasClass('theme-dark')){
                setCookie("myTheme", "", -1);
                $('#themeModeButton').html("<i class='fas fa-moon fa-2x'></i>");
                $('body').switchClass( "theme-dark", "", 400, "swing" );
            } else {
                setCookie("myTheme", "theme-dark", 30);
                $('#themeModeButton').html("<i class='fas fa-lightbulb fa-2x'></i>");
                $('body').switchClass( "", "theme-dark", 400, "swing" );
            }
        });
    });
</script>
</body>
</html>