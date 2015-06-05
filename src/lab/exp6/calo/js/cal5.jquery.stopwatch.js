(function($) {
	jQuery.fn.stopwatch = function() {
		var clock = $(this);
		var timer = 0;
		
		clock.addClass('stopwatch');
		
		// This is bit messy, but IE is a crybaby and must be coddled. 
		clock.html('<div class="display"><span class="sec">00</span></div>');
		clock.append('<input type="button" class="start" value="Start" />');
		clock.append('<input type="button" class="stop" value="Stop" />');
		clock.append('<input type="button" class="reset" value="Reset" />');
		
		// We have to do some searching, so we'll do it here, so we only have to do it once.

		var s = clock.find('.sec');
		var start = clock.find('.start');
		var stop = clock.find('.stop');
		var reset = clock.find('.reset')
		
		stop.hide();

		start.bind('click', function() {
			timer = setInterval(do_time, 1000);
			stop.show();
			start.hide();
		 document.getElementById('b').style.display = 'inline';
		document.getElementById('be').style.display = 'none';
   
		});
		
		stop.bind('click', function() {
			clearInterval(timer);
			timer = 0;
			start.show();
			stop.hide();
		});
		
		reset.bind('click', function() {
			clearInterval(timer);
			timer = 0;
		
			s.html("00");
			stop.hide();
			start.show();
			document.getElementById('be').style.display = 'inline';
			document.getElementById('b').style.display = 'none';
		});
		
		function do_time() {
			// parseInt() doesn't work here...
		
			second = parseFloat(s.text());
			
			second = second +10;  // Increase clock speed
			
			
			
			
		
			s.html("0".substring(second >= 10) + second);

			document.time.timer.value= "".substring(second >= 10) + second ;
			time = "".substring(second >= 10) + second ;
							
			i = 0.5;
			v = 10;
			rho = 0.8765;
	
			vol = 100;
			cp = document.volu.cp.value;// values frm the interface
			k = parseFloat(document.time.kal.value);
			t_amb = parseFloat(document.time.itemp.value);  // values frm the interface
      			del_t = (i*v)/(k+ rho*vol*cp)*time;
			o_temp = del_t + t_amb;  
			o_temp1 = o_temp * 10;
		xo = Math.round(o_temp1)/10;
			if ((xo - Math.round(xo)) ==0)
			{			
			document.volu.vol.value = xo.toString() + ".0";
			}
			else 
			{
			document.volu.vol.value  = xo.toString();
			}
			
			
		}
	}
})(jQuery);
