@extends('.admin/layout/cpanel/content')

@section('page')
<div class="product-sales-chart">
<div class="portlet-title">
<div class="row">
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
<div class="caption pro-sl-hd">
<span class="caption-subject"><b>University Earnings</b></span>
</div>
</div>
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
<div class="actions graph-rp graph-rp-dl">
<p>All Earnings are in million $</p>
</div>
</div>
</div>
</div>
<ul class="list-inline cus-product-sl-rp">
<li>
<h5><i class="fa fa-circle" style="color: #006DF0;"></i>CSE</h5>
</li>
<li>
<h5><i class="fa fa-circle" style="color: #933EC5;"></i>Accounting</h5>
</li>
<li>
<h5><i class="fa fa-circle" style="color: #65b12d;"></i>Electrical</h5>
</li>
</ul>
<article class="clock" style="">
  <div class="hours-container">
    <div class="hours"></div>
  </div>
  <div class="minutes-container">
    <div class="minutes"></div>
  </div>
  <div class="seconds-container">
    <div class="seconds"></div>
  </div>
</article>
</div>
@endsection
@section('script')

function initLocalClocks() {
	
  // Get the local time using JS
  var date = new Date;
  var seconds = date.getSeconds();
  var minutes = date.getMinutes();
  var hours = date.getHours();

  // Create an object with each hand and it's angle in degrees
  var hands = [
    {
      hand: 'hours',
      angle: (hours * 30) + (minutes / 2)
    },
    {
      hand: 'minutes',
      angle: (minutes * 6)
    },
    {
      hand: 'seconds',
      angle: (seconds * 6)
    }
  ];

  // Loop through each of these hands to set their angle
  for (var j = 0; j < hands.length; j++) {
    var elements = document.querySelectorAll('.' + hands[j].hand);
    for (var k = 0; k < elements.length; k++) {
        elements[k].style.webkitTransform = 'rotateZ('+ hands[j].angle +'deg)';
        elements[k].style.transform = 'rotateZ('+ hands[j].angle +'deg)';
        // If this is a minute hand, note the seconds position (to calculate minute position later)
        if (hands[j].hand === 'minutes') {
          elements[k].parentNode.setAttribute('data-second-angle', hands[j + 1].angle);
        }
    }
  }
}
initLocalClocks();
@endsection
@section("style")
  .clock {
  border-radius: 50%;
  background: #fff url({{asset('ios_clock.svg')}}) no-repeat center;
  background-size: 88%;
  height: 20em;
  padding-bottom: 31%;
  position: relative;
  width: 20em;
}

.clock.simple:after {
  background: #000;
  border-radius: 50%;
  content: "";
  position: absolute;
  left: 50%;
  top: 50%;
  transform: translate(-50%, -50%);
  width: 5%;
  height: 5%;
  z-index: 10;
}
.minutes-container, .hours-container, .seconds-container {
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
}
.hours {
  background: #000;
  height: 15%;
  left: 51%;
  position: absolute;
  top: 35%;
  transform-origin: 50% 100%;
  width: 2.5%;
}
.minutes {
  background: #000;
  height: 17%;
  left: 49%;
  position: absolute;
  top: 33%;
  transform-origin: 50% 100%;
  width: 2%;
}
.seconds {
  background: #000;
  height: 19%;
  left: 49.5%;
  position: absolute;
  top: 35%;
  transform-origin: 50% 80%;
  width: 1%;
  z-index: 8;
}
@keyframes rotate {
  100% {
    transform: rotateZ(360deg);
  }
}
.hours-container {
  animation: rotate 43200s infinite linear;
}
.minutes-container {
  animation: rotate 3600s infinite linear;
}
.seconds-container {
  animation: rotate 60s infinite linear;
}
@endsection