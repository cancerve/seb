///////////////////////////////////////CAMPOS FECHA RESTRINTIVAS////////////////////////
  $(function() {
    $( "#F1_FechaDesde" ).datepicker({
		showAnim: 'slide',
		dateformat: 'dd-mm-yy',
		defaultDate: "+1w",
		changeMonth: false,
		numberOfMonths: 2,
		onClose: function( selectedDate ) {
			$( "#F1_FechaHasta" ).datepicker( "option", "minDate", selectedDate );
      	}		
    });
    $( "#F1_FechaHasta" ).datepicker({
		showAnim: 'slide',
		dateformat: 'dd-mm-yy',
		defaultDate: "+1w",
		changeMonth: false,
		numberOfMonths: 2,
		onClose: function( selectedDate ) {
			$( "#F2_FechaDesde" ).datepicker( "option", "minDate", selectedDate );
      	}		
    });	
    $( "#F2_FechaDesde" ).datepicker({
		showAnim: 'slide',
		dateformat: 'dd-mm-yy',
		defaultDate: "+1w",
		changeMonth: false,
		numberOfMonths: 2,
		onClose: function( selectedDate ) {
			$( "#F2_FechaHasta" ).datepicker( "option", "minDate", selectedDate );
      	}		
    });
    $( "#F2_FechaHasta" ).datepicker({
		showAnim: 'slide',
		dateformat: 'dd-mm-yy',
		defaultDate: "+1w",
		changeMonth: false,
		numberOfMonths: 2,
		onClose: function( selectedDate ) {
			$( "#F3_FechaDesde" ).datepicker( "option", "minDate", selectedDate );
      	}		
    });	
    $( "#F3_FechaDesde" ).datepicker({
		showAnim: 'slide',
		dateformat: 'dd-mm-yy',
		defaultDate: "+1w",
		changeMonth: false,
		numberOfMonths: 2,
		onClose: function( selectedDate ) {
			$( "#F3_FechaHasta" ).datepicker( "option", "minDate", selectedDate );
      	}		
    });
    $( "#F3_FechaHasta" ).datepicker({
		showAnim: 'slide',
		dateformat: 'dd-mm-yy',
		defaultDate: "+1w",
		changeMonth: false,
		numberOfMonths: 2,
		onClose: function( selectedDate ) {
			$( "#F4_FechaDesde" ).datepicker( "option", "minDate", selectedDate );
      	}		
    });	
    $( "#F4_FechaDesde" ).datepicker({
		showAnim: 'slide',
		dateformat: 'dd-mm-yy',
		defaultDate: "+1w",
		changeMonth: false,
		numberOfMonths: 2,
		onClose: function( selectedDate ) {
			$( "#F4_FechaHasta" ).datepicker( "option", "minDate", selectedDate );
      	}		
    });
    $( "#F4_FechaHasta" ).datepicker({
		showAnim: 'slide',
		dateformat: 'dd-mm-yy',
		defaultDate: "+1w",
		changeMonth: false,
		numberOfMonths: 2,
		onClose: function( selectedDate ) {
			$( "#F5_FechaDesde" ).datepicker( "option", "minDate", selectedDate );
      	}		
    });	
    $( "#F5_FechaDesde" ).datepicker({
		showAnim: 'slide',
		dateformat: 'dd-mm-yy',
		defaultDate: "+1w",
		changeMonth: false,
		numberOfMonths: 2,
		onClose: function( selectedDate ) {
			$( "#F5_FechaHasta" ).datepicker( "option", "minDate", selectedDate );
      	}		
    });
    $( "#F5_FechaHasta" ).datepicker({
		showAnim: 'slide',
		dateformat: 'dd-mm-yy',
		defaultDate: "+1w",
		changeMonth: false,
		numberOfMonths: 2,
		onClose: function( selectedDate ) {
			$( "#FE_Fecha_Desde" ).datepicker( "option", "minDate", selectedDate );
      	}
    });	

    $( "#FE_Fecha_Desde" ).datepicker({
		showAnim: 'slide',
		dateformat: 'dd-mm-yy',
		defaultDate: "+1w",
		changeMonth: false,
		numberOfMonths: 2,
		onClose: function( selectedDate ) {
			$( "#FE_Fecha_Hasta" ).datepicker( "option", "minDate", selectedDate );
      	}
    });
    $( "#FE_Fecha_Hasta" ).datepicker({
		showAnim: 'slide',
		dateformat: 'dd-mm-yy',
		defaultDate: "+1w",
		changeMonth: false,
		numberOfMonths: 2,
    });
	
});
/////////////////////////PESTANAS //////////////////////////		
	$(function() {
		$( "#tabs" ).tabs();
	});
////////////////////////ARBOL CODIGO ARANCELARIO //////////////////////////	
$(document).ready(function(){
		
	// first example
	$("#navigation").treeview({
		collapsed: true,
		unique: true,
		persist: "location",
		animated: "normal"
	});

	
	// second example
	$("#browser").treeview({
		animated:"normal",
		persist: "cookie"
	});

	$("#samplebutton").click(function(){
		var branches = $("<li><span class='folder'>New Sublist</span><ul>" + 
			"<li><span class='file'>Item1</span></li>" + 
			"<li><span class='file'>Item2</span></li></ul></li>").appendTo("#browser");
		$("#browser").treeview({
			add: branches
		});
	});


	// third example
	$("#red").treeview({
		animated: "fast",
		collapsed: true,
		control: "#treecontrol"
	});
});
////////////////////////////AGREGAR CONTACTOS EMPRESAS ///
var nextinput = 0;
var inicial = 0;
function asignar(obj,valor){
    cmp = document.getElementById(obj);
    cmp.value = valor;
}
function AgregarCampos(cant){
	if(inicial==0){
		nextinput = cant-1;
		inicial = 1;	
	}
	nextinput++;
	asignar('cant_contac',nextinput);
		campo = '<table width="100%" border="0" cellpadding="2" cellspacing="2" class="Textonegro"><tr><td>&nbsp;'+(nextinput+1)+'&nbsp;</td><td><input type="text" name="NU_Cedula'+nextinput+'"></td><td><input type="text" name="AL_Nombre'+nextinput+'"></td><td><input type="text" name="AL_Apellido'+nextinput+'"></td><td><input type="text" name="AF_Cargo'+nextinput+'"></td></tr></table>';
		$("#campos").append(campo);
}
