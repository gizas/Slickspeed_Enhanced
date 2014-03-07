<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" debug="true">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	
	<script type="text/javascript" src="../frameworks/<?php echo $_GET['include']; ?>"></script>
	
	<script type="text/javascript">
		
		var get_length = function(elements){
			return (typeof elements.length == 'function') ? elements.length() : elements.length;
		}

		function test(selector){
			try {
				var start = new Date().getTime();
				
				elements = <?php echo $_GET['function']; ?>(selector);
				var end = new Date().getTime() - start;
				return {'time': Math.round(end), 'found': get_length(elements)};
			} catch(err){
				if (elements == undefined) elements = {length: -1};
				return ({'time': new Date().getTime() - start, 'found': get_length(elements), 'error': err});
			}
		}

/* MYFUNCTION		
		function test(selector){
		    var count_of_loops = 1,st,en,start;
			var total,times = new Array();
			try {

				start = new Date().getTime();
			
				var elements, i; // sot
				for (i=0;i<count_of_loops;i++) // sot
				{ st = new Date().getTime();
				  elements = <?php echo $_GET['function']; ?>(selector);
				  en = new Date().getTime();
				  times[i] = en-st;
				  //setTimeout(function(){},50);
				} 
				total = 0;
				for (i=count_of_loops-1;i>=0;i--) // sot
				  total+=times[i];
 
			
				//return {'time': Math.round(end), 'found': get_length(elements)};
				return {'times': times.join('+'), 'time': total, 'found': get_length(elements)};
			} catch(err){
				if (elements == undefined) elements = {length: -1};
				return ({'time': new Date().getTime() - start, 'found': get_length(elements), 'error': err});
			}
		}
*/	
	</script>
	
</head>

<body>  
	
	<?php include('template.html');?>

</body>
</html>