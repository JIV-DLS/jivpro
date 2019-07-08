<!-- jquery
============================================ -->

<script src="{{ asset('master_/js/vendor/jquery-1.12.4.min.js') }}"></script>
<!-- bootstrap JS
============================================ -->
<script src="{{ asset('master_/js/bootstrap.min.js') }} "></script>
<!-- wow JS
============================================ -->
<script src="{{ asset('master_/js/wow.min.js') }} "></script>
<!-- price-slider JS
============================================ -->
<script src="{{ asset('master_/js/jquery-price-slider.js') }}"></script>
<!-- meanmenu JS
============================================ -->
<script src="{{ asset('master_/js/jquery.meanmenu.js') }} "></script>
<!-- owl.carousel JS
============================================ -->
<script src="{{ asset('master_/js/owl.carousel.min.js') }} "></script>
<!-- sticky JS
============================================ -->
<script src="{{ asset('master_/js/jquery.sticky.js') }} "></script>
<!-- scrollUp JS
============================================ -->
<script src="{{ asset('master_/js/jquery.scrollUp.min.js') }} "></script>
<!-- counterup JS
============================================ -->
<script src="{{ asset('master_/js/counterup/jquery.counterup.min.js') }} "></script>
<script src="{{ asset('master_/js/counterup/waypoints.min.js') }} "></script>
<script src="{{ asset('master_/js/counterup/counterup-active.js') }} "></script>
<!-- mCustomScrollbar JS
============================================ -->
<script src="{{ asset('master_/js/scrollbar/jquery.mCustomScrollbar.concat.min.js') }} "></script>
<script src="{{ asset('master_/js/scrollbar/mCustomScrollbar-active.js') }} "></script>
<!-- metisMenu JS
============================================ -->
<script src="{{ asset('master_/js/metisMenu/metisMenu.min.js') }} "></script>
<script src="{{ asset('master_/js/metisMenu/metisMenu-active.js') }} "></script>
<!-- morrisjs JS
============================================ -->
<script src="{{ asset('master_/js/morrisjs/raphael-min.js') }} "></script>
<script src="{{ asset('master_/js/morrisjs/morris.js') }} "></script>
<script src="{{ asset('master_/js/morrisjs/morris-active.js') }} "></script>
<!-- morrisjs JS
============================================ -->
<script src="{{ asset('master_/js/sparkline/jquery.sparkline.min.js') }} "></script>
<script src="{{ asset('master_/js/sparkline/jquery.charts-sparkline.js') }} "></script>
<script src="{{ asset('master_/js/sparkline/sparkline-active.js') }} "></script>
<!-- calendar JS
============================================ -->
<script src="{{ asset('master_/js/calendar/moment.min.js') }} "></script>
<script src="{{ asset('master_/js/calendar/fullcalendar.min.js') }} "></script>
<script src="{{ asset('master_/js/calendar/fullcalendar-active.js') }} "></script>
<!-- plugins JS
============================================ -->
<script src="{{ asset('master_/js/plugins.js') }} "></script>
<!-- main JS
============================================ -->
<script src="{{ asset('master_/js/main.js') }} "></script>
<!-- tawk chat JS
============================================ -->
<script src="{{ asset('master_/js/tawk-chat.js') }} "></script>
<script>  
	 $.fn.tagName=function()
	 {
	 	return this.get(0).tagName.toLowerCase();
	 }
	 function parent(o,tagN)
	 	{
	 		tagN=tagN.toLowerCase();
	 		return o.tagName()==tagN? o: parent(o.parent(),tagN);
	 	}

	 $.fn.paren=function(par)
	 {
	 	return parent(this,par);
	 }
  @yield('script')
  </script>
  @yield('srcScript')