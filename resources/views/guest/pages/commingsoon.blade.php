<link rel="stylesheet" href="{{ asset('sass/guest/guest.css') }}">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">

<div id="clockdiv" class="han-commingsoon">
    <img class="commingsoon-img" src="{{ asset('image/banner/comingsoon1.png') }}" alt="">
    <div class="col-md-10 background-back" style="height:550px">
    </div>
    <div class="col-md-12">
        <h2 class="text-time">Countdown Clock</h2>
        <div class="row bg-primary time-colum frame-col">
            <div class="col-sm-3">
                <span class="days"></span>
                <div class="smalltext">Days</div>
            </div>
            <div class="col-sm-3">
                <span class="hours"></span>
                <div class="smalltext">Hours</div>
            </div>
            <div class="col-sm-3">
                <span class="minutes"></span>
                <div class="smalltext">Minutes</div>
            </div>
            <div class="col-sm-3">
                <span class="seconds"></span>
                <div class="smalltext">Seconds</div>
            </div>
        </div>
        <div class="col-md-12 button-backhome">
            <a class="" href="{{ route('user/index') }}"> Back Home Page</a>
        </div>
    </div>

</div>

<script type='text/javascript'>
    //<![CDATA[
    function getTimeRemaining(endtime) {
        var t = Date.parse(endtime) - Date.parse(new Date());
        var seconds = Math.floor((t / 1000) % 60);
        var minutes = Math.floor((t / 1000 / 60) % 60);
        var hours = Math.floor((t / (1000 * 60 * 60)) % 24);
        var days = Math.floor(t / (1000 * 60 * 60 * 24));
        return {
            'total': t,
            'days': days,
            'hours': hours,
            'minutes': minutes,
            'seconds': seconds
        };
    }

    function initializeClock(id, endtime) {
        var clock = document.getElementById(id);
        var daysSpan = clock.querySelector('.days');
        var hoursSpan = clock.querySelector('.hours');
        var minutesSpan = clock.querySelector('.minutes');
        var secondsSpan = clock.querySelector('.seconds');

        function updateClock() {
            var t = getTimeRemaining(endtime);

            daysSpan.innerHTML = t.days;
            hoursSpan.innerHTML = ('0' + t.hours).slice(-2);
            minutesSpan.innerHTML = ('0' + t.minutes).slice(-2);
            secondsSpan.innerHTML = ('0' + t.seconds).slice(-2);

            if (t.total <= 0) {
                clearInterval(timeinterval);
            }
        }

        updateClock();
        var timeinterval = setInterval(updateClock, 1000);
    }

    var deadline = new Date(Date.parse(new Date()) + 10 * 24 * 60 * 60 * 1000);
    initializeClock('clockdiv', deadline);
    //]]>
</script>
