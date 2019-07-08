;
(
	function ($) {
$.fn.closer={function()
{
  alert('here');
  var parent=$(this).parent().parent().parent().parent();
  client.splice(parent.attr('id'),1);
  parent.remove();

}
}
	$.fn.loadinga = function ($Ti) {
		var DEFAULTS = {
			backgroundColor: '#b3cef6',
			progressColor: '#4b86db',
			percent: 75,
			duration: 0,
			hour:$Ti.hour,
			min:$Ti.min,
			sec:$Ti.sec
		};	
		
		//alert('hereis');
		$(this).each(function () {
			var $target  = $(this);
var Tim={
		hour: $target.data('hour') ? $target.data('hour'): DEFAULTS.hour,
        min:  $target.data('min') ? $target.data('min'): DEFAULTS.min,
        sec:  $target.data('sec') ? $target.data('sec'): DEFAULTS.sec};

			var opts = {
			backgroundColor: $target.data('color') ? $target.data('color').split(',')[0] : DEFAULTS.backgroundColor,
			progressColor: $target.data('color') ? $target.data('color').split(',')[1] : DEFAULTS.progressColor,
			percent: $Ti.percent,//$target.data('percent') ? $target.data('percent') : DEFAULTS.percent,
			
			duration: $target.data('duration') ? $target.data('duration') : DEFAULTS.duration
			};
			// console.log(opts);
	
			$target.append('<div class="background"></div><div class="rotate"></div><div class="left"></div><div class="right"></div><div class=""><span>' + Tim.hour+':'+Tim.min+':'+Tim.sec + '</span></div>');
	
			$target.find('.background').css('background-color', opts.backgroundColor);
			$target.find('.left').css('background-color', opts.backgroundColor);
			$target.find('.rotate').css('background-color', opts.progressColor);
			$target.find('.right').css('background-color', opts.progressColor);
	
			var $rotate = $target.find('.rotate');

				
				$rotate.css({
					'transform': 'rotate(' + opts.percent * 3.6 + 'deg)'
				});
			

			if (opts.percent > 50) {
				var animationRight = 'toggle  step-end';
				var animationLeft = 'toggle  step-start';  
				$target.find('.right').css({
					animation: animationRight,
					opacity: 1
				});
				$target.find('.left').css({
					animation: animationLeft,
					opacity: 0
				});
			} 
		});
	}

	
})(jQuery);