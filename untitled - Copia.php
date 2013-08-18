<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">  
<html lang="en" xmlns="http://www.w3.org/1999/xhtml"> 
	<head> 
    <link rel="stylesheet" media="all" type="text/css" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
    <link rel="stylesheet" media="all" type="text/css" href="app/css/jquery-ui-timepicker-addon.css" />
    
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/ui/1.10.3/jquery-ui.min.js"></script>
    <script type="text/javascript" src="app/js/jquery-ui-timepicker-addon.js"></script>
    <script type="text/javascript">
    $(function(){
        $('.example-container > pre').each(function(i){
            eval($(this).text());
        });
    });
    </script>
	</head> 
	<body> 
	<!-- ============= example -->
	<div class="example-container">
		<p>Add only a timepicker:</p>
		<div>
	 		<input type="text" name="basic_example_2" id="basic_example_2" value="" />
		</div>					
<pre>
$('#basic_example_2').timepicker();
</pre>
	</div>
	<!-- ============= example -->
	</body> 
</html>