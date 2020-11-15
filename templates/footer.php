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
    function toggleAudio() {
        if(!song.paused) {
            song.pause();
            setCookie('userPause', 1);
        }
        else {
            // song.play();
            played = false;
            userPause = "0";
            setCookie('userPause', 0);
        }
        songUpdate();
    }

    function songUpdate() {
        if(song.paused) 
            document.getElementById('musicButton').innerHTML = 'Play';
        else 
            document.getElementById('musicButton').innerHTML = 'Stop';
    }

    if(song) {
        var played = false;
        var tillPlayed = getCookie('timePlayed');
        var userPause = getCookie('userPause');
        
        function update()
        {
            if(userPause !== "1") {
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
                    songUpdate();
                }
                else {
                    setCookie('timePlayed', song.currentTime);
                }
            }
        }
        setInterval(update,500);
    }
</script>

</body>
</html>