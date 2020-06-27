<script>

    function setCookie(name, value, expirehours) {
        var todayDate = new Date();
        todayDate.setHours(todayDate.getHours() + expirehours);
        document.cookie = name + "=" + escape(value) + "; path=/; expires=" + todayDate.toGMTString() + ";"
    }

    function todaycloseWin() {
        setCookie("ncookie", "done", 24);
        document.getElementById('pop_up').style.visibility = "hidden";
    }

    function forclose() {
        document.getElementById('pop_up').style.visibility = "hidden";
    }

</script>

<div id="pop_up" style=" margin-left: 150px; margin-top:60px;position:fixed; z-index:9999; visibility:done;">
    <div style="position: relative;">
        <img src="../image/popup.png" width="400" height="500"/>
        <div>
            <a href="#" onclick="todaycloseWin()"
               style="background-color: white; color: black; font-size: 15px;
                position: absolute;">오늘하루동안 열지않기</a>
            <a href="#" onclick="forclose()"
               style="background-color: white; color: black; font-size: 15px;
               position:absolute;margin-left: 160px">닫기</a>
        </div>
    </div>
</div>

<script>
    cookiedata = document.cookie;
    if (cookiedata.indexOf("ncookie=done") < 0) {
        document.getElementById('pop_up').style.visibility = "visible";
    } else {
        document.getElementById('pop_up').style.visibility = "hidden";
    }
</script>