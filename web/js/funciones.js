

var img = new Array()
	var i=0

	img[0]="noticias/noticia1.JPG"
	img[1]="noticias/noticia2.JPG"
	img[2]="noticias/noticia3.JPG"
	img[3]="noticias/noticia4.JPG"
	img[4]="noticias/noticia5.JPG"
	img[5]="noticias/noticia6.JPG"


	function backward(){
		if (i>0){
			window.status=''
			i--
			document.images.galeria.src=img[i]
		}else{
			i = 5
			document.images.galeria.src=img[i]
		}
	}

	function forward(){
		 
		if (i<img.length-1){
			i++
			document.images.galeria.src=img[i]
		}else
			i = 0
			document.images.galeria.src=img[i]
	}
	
	function automatico()  
	{  
			forward();
			timeoutID = window.setTimeout('automatico()', 3000,true);
	}
	
	
	function validar(){
			var select = document.formulario.horarios;
			if (select.options[select.selectedIndex].value == ""){
				//alert("Seleccione horario");
				$( "#alerta" ).dialog( "open" );
				return false;
			}else{
				if(!(document.formulario.s1.checked || document.formulario.s2.checked || document.formulario.s3.checked)){
					$( "#dialog-confirm" ).dialog( "open" );
					//return confirm("Seguro q no deseasolicitar un servicio?")
					return false;
				}else{
					return true;
				}
			}
		}
//----------------------------------------------------------------------

jQuery.validator.addMethod("lettersonly", function(value, element) {
  return this.optional(element) || /^[a-z]+$/i.test(value);
}, "Por favor ingrese solo letras"); 

    $.validator.addMethod("loginRegex", function(value, element) {
        return this.optional(element) || /^[a-z0-9]+$/i.test(value);
    }, "El nombre de usuario solo debe contener letras y numeros.");
	
	
	$.validator.addMethod("numTel", function(value, element) {
        return this.optional(element) || /^[0-9]{4,5}-? ?[0-9]{6,8}$/i.test(value);
    }, "Por favor ingrese un numero de telefono valido ejemplo: 1234-123456");

	$.validator.addMethod("formatfecha", function(value, element) {
		return value.match(/^(0[1-9]|[12][0-9]|3[01])[- //.](0[1-9]|1[012])[- //.](19\d\d|2000)$/);
       
    }, "Por favor ingrese formato dd/mm/yyyy");
    

//-------------------------

$().ready(function() {
	$("#formulario1").validate({});
		$("#formulario2").validate({});
			$("#formulario3").validate({});
		$("#formulario4").validate({});
			$("#formulario5").validate({});
		
$("#formulario").validate({
rules: {

	nomb: {
	
	lettersonly: true,
	maxlength: 25
	
	},
	
	ape: {
	
	lettersonly: true,
	maxlength: 25
	
	},
	cuenta: {
	
	formatfecha:true
	},
	
	localidad:{
		required: true
	},
	
	telnum: {
	numTel: true

	
	},
	
	usuario: {
	
	loginRegex: true,
	maxlength: 25,
	minlength: 4
	
	},
	
	pass1: {
	
	minlength: 4
	
	},

	pass2: {
		required: true,
		equalTo: "#pass1",
		minlength: 4

	}
	
}
});


//fecha

$(function() {
	
		$(function() {
			$( 'a.link' ).button();
			$( 'a.Pisado').button({disabled: true});
		});
//----------------------------------------------------------------------
		var total=0;
		$( "#progressbar" ).progressbar({
			value:total
		});

		function barUpdate(total){
			$( "#progressbar" ).progressbar( "option", "value", total );
		}
//----------------------------------------------------------------------
		var arrayValoresAutocompletar = [
			"Rawson",
			"Trelew",
			"Madryn",
			"Dolavon",
			"..."
		];
//----------------------------------------------------------------------
		$( "#cuenta" ).datepicker({
			//showOn: "button",
			//buttonImage: "javascript/css/ui-lightness/images/calendar.gif",
			//buttonImageOnly: true,
			changeMonth: true,
			changeYear: true,
			yearRange: "-80:-18"
			

		});

		$('#cuenta').datepicker($.datepicker.regional['es']);
//-----------------------------------------------------------------------
		$('#button').click(function(){
			
			while(total<100){
			total=total+10;
			//window.setTimeout('barUpdate(total)', 3000);
	 
			
			}
			
			});
//----------------------------------------------------------------------
		$("#localidad").autocomplete({
			source: arrayValoresAutocompletar
		});
//-----------------------------------------------------------------------

		$("#accordion").accordion({
			 animated: "bounceslide",
			collapsible: true,
			autoHeight: false,
			autoWidth: false,
			 active: false
			
		});
		
		$( 'img.producto').click(function() {
			$( "#dialog" ).dialog( "open" );
			return false;
		});
		
		
		$( "#dialog" ).dialog({
			autoOpen: false,
			show: "fold",
			hide: "scale",
			modal: true,
			resizable: false
		});

		
		$( "#alerta" ).dialog({
			autoOpen: false,
			show: "fold",
			hide: "scale",
			modal: true,
			resizable: false
		});
		
		
	
		$( "#dialog-confirm" ).dialog({
			autoOpen: false,
			resizable: false,
			hide:"explode",
			height:140,
			modal: true,
		});
		
		$( "#tabs" ).tabs();
		});
		
		$( "#calendario" ).datepicker({
			changeMonth: true,
			changeYear: true,
			yearRange: "-2:+5"
		});
		
		

});





