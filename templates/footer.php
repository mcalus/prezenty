</div>

<footer>
    <!-- <p class="text-center text-muted">©Copyright 2020 - Całusy</p> -->
</footer>

<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<?php if(isset($_SESSION['env'])) { ?>
<script src='js/christmasBall.js'></script>
<?php } ?>
<script src='js/konami.js'></script>
<script src='js/easteregg.js'></script>
<!-- <script src='js/snowflakes.js'></script> -->

<script>

    function fadeOutEffect(targetID) {
        var fadeTarget = document.getElementById(targetID);
        var fadeEffect = setInterval(function () {
            if (!fadeTarget.style.opacity) {
                fadeTarget.style.opacity = 1;
            }
            if (fadeTarget.style.opacity > 0) {
                fadeTarget.style.opacity -= 0.05;
            } else {
                clearInterval(fadeEffect);
            }
        }, 100);
    }

    var popup = document.getElementById("drawPopup");
    if(popup) {
        // popup.addEventListener('click', fadeOutEffect('drawPopup'));
        popup.addEventListener('click', () => popup.style.opacity = '0');
        popup.addEventListener('transitionend', () => popup.remove());
    }


    function toggleAudio() {
        var audio = document.getElementById('bgsound');
        if(!audio.paused) {
            audio.pause();
            document.getElementById('musicButton').innerHTML = 'Play';
        }
        else {
            audio.play();
            document.getElementById('musicButton').innerHTML = 'Stop';
        }
    }


    function setCookie(c_name,value,exdays)
    {
        var exdate=new Date();
        exdate.setDate(exdate.getDate() + exdays);
        var c_value=escape(value) + ((exdays==null) ? "" : "; expires="+exdate.toUTCString());
        document.cookie=c_name + "=" + c_value;
    }

    function getCookie(c_name)
    {
        var i,x,y,ARRcookies=document.cookie.split(";");
        for (i=0;i<ARRcookies.length;i++)
        {
        x=ARRcookies[i].substr(0,ARRcookies[i].indexOf("="));
        y=ARRcookies[i].substr(ARRcookies[i].indexOf("=")+1);
        x=x.replace(/^\s+|\s+$/g,"");
        if (x==c_name)
            {
            return unescape(y);
            }
        }
    }

    var song = document.getElementById('bgsound');
    if(song) {
        var played = false;
        var tillPlayed = getCookie('timePlayed');
        function update()
        {
            if(!played){
                if(tillPlayed){
                song.currentTime = tillPlayed;
                song.play();
                played = true;
                }
                else {
                        song.play();
                        played = true;
                }
            }

            else {
            setCookie('timePlayed', song.currentTime);
            }
        }
        setInterval(update,1000);
    }
</script>

</body>
</html>