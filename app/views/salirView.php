<?php 
	session_start();
	session_destroy();
?>
<script>
	alert('...Ha sido Desconectado.');
	window.close();
	document.location=('../../index.php');
</script>