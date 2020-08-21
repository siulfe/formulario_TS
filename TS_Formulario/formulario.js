try{
		var dataProducts = {}
		var sendPetitionCalculator = false

		

		window.addEventListener("load",function (){
			var divPage = $("#div_calculator");
			var imgLoad = `data:image/gif;base64,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`

			

			if (divPage != null){
				divPage.html(`
					<form id="form_products">
						<div class="row mt-2 mb-1">
							<div class="col-lg-12 col-md-12 col-sm-12 bg-title-form pt-2 pb-1" >
								<h5>Tipo de Instalación</h5>
							</div>
						</div>

						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12 mt-2">
								<input type="radio" class="ml-2" name="type_instalation" value="1" id="type_instalation_1" checked="true">
								<label for="type_instalation_1">Suspension Aérea</label>

								<input type="radio" class="ml-2" name="type_instalation" value="2" id="type_instalation_2">
								<label for="type_instalation_2">Piso Falso</label>

								<input type="radio" class="ml-2" name="type_instalation" value="3" id="type_instalation_3">
								<label for="type_instalation_3">Pared</label>
							</div>
						</div>

						<div class="row mt-3 mb-1 bs-t-1">
							<div class="col-lg-12 col-md-12 col-sm-12 bg-title-form pt-2 pb-1">
								<h5>Medidas de Bandejas Portables Tipo Malla</h5>
							</div>
						</div>

						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-12 mt-2">
								<ol class="list-style-none m-0">
									<li>
										<label for="ladder_1">
											<input type="radio" class="ml-2" name="ladder" value="1" id="ladder_1" checked="true">
											Escalerilla PTM (0.05m x 0.10m x 2.4m)
										</label>
									</li>

									<li>
										<label for="ladder_2">
											<input type="radio" class="ml-2" name="ladder" value="2" id="ladder_2" >
											Escalerilla PTM (0.05m x 0.15m x 2.4m)
										</label>
									</li>

									<li>
										<label for="ladder_3">
											<input type="radio" class="ml-2" name="ladder" value="3" id="ladder_3" >
											Escalerilla PTM (0.05m x 0.20m x 2.4m)
										</label>
									</li>
								</ol>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-12 mt-md-2">
								<ol class="list-style-none m-0">
									<li>
										<label for="ladder_4">
											<input type="radio" class="ml-2" name="ladder" value="4" id="ladder_4" >
											Escalerilla PTM (0.05m x 0.30m x 2.4m)
										</label>
									</li>

									<li>
										<label for="ladder_5">
											<input type="radio" class="ml-2" name="ladder" value="5" id="ladder_5" >
											Escalerilla PTM (0.05m x 0.40m x 2.4m)
										</label>
									</li>
								</ol>
							</div>
						</div>

						<div class="row mt-2 mb-1 bs-t-1">
							<div class="col-lg-12 col-md-12 col-sm-12 bg-title-form pt-2 pb-1">
								<h5>Detalles del Proyecto</h5>
							</div>
						</div>

						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12">
								<ol class="list-style-none m-0">
									<li class="mt-2">
										Distancia de recorrido de la escalerilla en metros lineales: 
										<label>
											<input type="text" id="distance" name="distance" required minlength="1" class="w-4-r ml-md-4 ml-sm-2 bg-gray" onblur="setTwoNumberDecimal(event)" change="setTwoNumberDecimal">&nbsp;&nbsp;m
										</label>
									</li>

									<li class="mt-2">
										Cantidad de curvas a usar: 
										<label >
											<input type="number" id="curves" name="curves" min="1" class="w-3-r ml-md-4 ml-sm-2 bg-gray">&nbsp;&nbsp;
										</label>
									</li>

									<li class="mt-2">
										Cantidad Cascada o llegada de cable a rack: 
										<label>
											<input type="number" id="cascade" name="cascade" min="1" class="w-3-r ml-md-4 ml-sm-2 bg-gray">&nbsp;&nbsp;
										</label>
									</li>
								</ol>
							</div>
						</div>

						<div class="row mt-3 mb-1">
							<div class="col-lg-12 col-md-12 col-sm-12 bg-title-form pt-2 pb-1">
								<h5>Opcionales</h5>
							</div>
						</div>

						<div class="row mt-2 mb-1">
							<div class="col-lg-6 col-md-6 col-sm-12">
								<div class="row">
									<div class="col-md-8 col-xl-5 col-sm-8">
										Ramplus expansible 3/8: 
									</div>
									<div class="col-md-2 col-xl-7 col-sm-2 p-0 ">
										<input type="number" name="count_ramplus" id="optionals1" min="1" class="w-3-r ml-4 bg-gray">
									</div>
								</div>
								<div class="row mt-2">
									<div class="col-md-8 col-xl-5 col-sm-8">
										Arandela estructural 3/8: 
									</div>
									<div class="col-md-2 col-xl-7 col-sm-2 p-0">
										<input type="number" name="count_nuts" id="optionals3" min="1" class="w-3-r ml-4 bg-gray">
									</div>
								</div>

							</div>

							<div class="col-lg-6 col-md-6 col-sm-12">
								<div class="row pt-sm-2 pt-md-0">
										<div class="col-md-8 col-xl-7 col-sm-8">
											Barra roscada 3/8 2m: 
										</div>
										<div class="col-md-2 col-xl-5 col-sm-2 p-0">
											<input type="number" name="count_bars" id="optionals2" min="1" class="w-3-r ml-4 bg-gray">
										</div>
									</div>
									<div class="row mt-2">
										<div class="col-md-8 col-xl-7 col-sm-8">
											Barra perforadora para curvas de 90°: 
										</div>
										<div class="col-md-2 col-xl-5 col-sm-2 p-0">
											<input type="number" name="count_unistruts" id="optionals4" min="1" class="w-3-r ml-4 bg-gray">
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="row mt-3 pt-4 bs-t-2">
							<div class="col-lg-12 col-md-12 col-sm-12 text-center">
								<button class="btn btn-primary" id="button_calculator">Calcular</button>
							</div>
						</div>
					</form>

					<div id="div_table_calculator" style="display:none">
						<div class="row mt-1">
							<div class="col-md-12 col-lg-12 col-sm-12">
								<p class="text-right" id="text_results"></p>
							</div>
						</div>

						<div class="row mt-1 bs-b-2">
							<div class="col-md-12 col-lg-12 col-sm-12 mb-3 p-0">
								<table id="result_products" class="table table-borderless">
									<thead class="bg-title-form">
										<tr>
											<th>Código</th>
											<th>Descripción</th>
											<th class="text-center">Cantidad</th>
											<th class="text-center">Unidad</th>
											<th class="text-center">Fotos</th>
										</tr>
									</thead>
									<tbody id="body_table_products">
										
									</tbody>
								</table>
							</div>
						</div>

						<div class="row mt-3 mb-3">
							<div class="col-md-12 col-lg-12 col-sm-12 text-center">
								<button class="btn btn-primary" id="button_budget">Presupuestar</button>
							</div>
						</div>
					</div>


					<div class="modal fade" id="modal_budget" tabindex="-1">
					  <div class="modal-dialog">
					    <div class="modal-content">

							<div class="modal-header">
								<h4 class="modal-title text-center title-modal">¡Ingresa tus datos!</h4>
								<button type="button" class="close" data-dismiss="modal">&times;</button>
							</div>

					        <div class="modal-body">
					        	<h3 class="text-center">Para Presupuestar</h3>

						        <form id="form_budget">
							        <div class="row mt-5 justify-content-center">
							        	<div class="col-lg-8 col-md-8 col-sm-10">
							        		<input type="text" class="form-control" id="name_budget" name="name" required placeholder="A nombre de:" minlength="4">
							        	</div>
							        </div>


							        <div class="row mt-3 justify-content-center">
							        	<div class="col-lg-8 col-md-8 col-sm-10">
							        		<input type="email" class="form-control" id="email_budget" name="email" required placeholder="Email:" minlength="10" pattern="^[a-z0-9!#$%&'*+/=?^_\`{|}~-]+(?:\\.[a-z0-9!#$%&'*+/=?^_\`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$">
							        	</div>
							        </div>


							        <div class="row mt-3 justify-content-center">
							        	<div class="col-lg-8 col-md-8 col-sm-10">
							        		<input type="text" class="form-control" id="phone_budget" pattern="[0-9]{4}[-][0-9]{7,}" onkeypress=" return checkInputForLetters(event)" name="phone" required placeholder="Telefono:" minlength="12" maxlength="14" >
							        	</div>
							        </div>

							        <div class="row mt-4 mb-3">
							        	<div class="col-lg-12 col-md-12 col-sm-12 text-center">
							        		<button class="btn btn-primary" id="button_form_budget" type="submit">Recibir Presupuesto</button>
							        	</div>
							        </div>
						        </form>

					        </div>
					    </div>
					  </div>
					</div>
				`) 
				
				var input = $('#phone_budget');
					
				input.bind("invalid", function(event){
					if(input.val() != null && input.val().length >= 12){
						if(!input.val().match(/((\+[0-9]{2})|[0-9]{4})[-][0-9]{7,}/) ){
							event.target.setCustomValidity('Formato invalido. (0416-3006578)');
						}else{
							event.target.setCustomValidity('');	
						}

		    		}
				})

				var distance = $('#distance')

				distance.bind("keypress", checkInputDistance)
	
				$("#button_budget").click(()=>{
					$("#modal_budget").modal('show').css("margin-top","5rem");
					$(".modal-backdrop").hide()
				})
			}

			$("#form_products").on('submit', function(evt){
			    evt.preventDefault();  

			    if(sendPetitionCalculator){
			    	return
			    }

			    var data = {}

			    data.type_instalation = $('input:radio[name=type_instalation]:checked').val()

			    data.ladder = $('input:radio[name=ladder]:checked').val()

			    data.distance = $('#distance').val().replace(/[^\d\,]/g, "").replace(",", ".")

			    console.log(data.distance)

			    data.curves = $('#curves').val()

			    data.cascade = $('#cascade').val()

			    data.optionals = []


			    var aux = $('#optionals1').val()

			    if(aux != ""){
			   		data.optionals.push({id:7, count:aux});
			    }


			    aux = $('#optionals2').val()

			    if(aux != ""){
			   		data.optionals.push({id:8, count:aux});
			    }


			    aux = $('#optionals3').val()

			    if(aux != ""){
			   		data.optionals.push({id:9, count:aux});
			    }


			    aux = $('#optionals4').val()

			    if(aux != ""){
			   		data.optionals.push({id:10, count:aux});
			    }

				sendPetitionCalculator = true
				$("#button_calculator").html("<img src='"+imgLoad+"' style='max-height: 48px'>")
			    $.ajax({ 
			    	url: 'http://127.0.0.1:8000/api/products', 
			    	type:'POST', 
			    	dataType:'json',
			    	data:data,
			    	success: fillTable,
			    	error: function(resp){
						$("#button_calculator").html("Calcular")
						console.log(resp)
			    		sendPetitionCalculator = false
			    		toastr.info("No se ha podido obtener el listado de productos");
			    	}

				})

			 });


			$("#form_budget").on('submit', function(evt){
				evt.preventDefault();
				
				if(sendPetitionCalculator){
					return
				}

				user = {}

				user.name = $("#name_budget").val()
				user.email = $("#email_budget").val()
				user.phone = $("#phone_budget").val()

				dataProducts.user = user
				sendPetitionCalculator = true

				toastr.info("Enviando el registro, espere un momento por favor.")
				$("#button_form_budget").html("<img src='"+imgLoad+"' style='max-height: 48px'>")
				$.ajax({ 
			    	url: 'http://127.0.0.1:8000/api/products/pdf', 
			    	type:'POST', 
			    	dataType:'json',
			    	data:dataProducts,
			    	success: function(resp){
						$("#button_form_budget").html("Presupuestar")
			    		if(resp.error != null){
				    		sendPetitionCalculator = false
			    			toastr.info("No se ha podido registrar su solicitud, intente nuevamente.")
			    			return
			    		}

			    		if(resp.result){
			    			toastr.success("Su petición a sido registrada con exito")

			    			$("#form_products")[0].reset()
			    			$("#form_budget")[0].reset()
	    					$("#div_table_calculator").css("display","none")
							$("#modal_budget").modal('hide');
				    		sendPetitionCalculator = false
			    			return
			    		}

				    	toastr.info("Se ha detectado problemas para obtener la respuesta del servidor")
			    	},
			    	error: function(resp){
						$("#button_form_budget").html("Presupuestar")
			    		sendPetitionCalculator = false
			    		toastr.info("No se ha podido registrar su solicitud.");
			    	}

				})
			})

		})

		function fillTable(resp){
    		try{
    			$("#button_calculator").html("Calcular")
	    		sendPetitionCalculator = false
	    		if(resp.error != null){
	    			toastr.info("No se ha podido obtener el listado de productos, intente nuevamente.")
	    			return
	    		}

	    		$("#text_results").html("Resultado "+resp.count_total+" items")

	    		$("#body_table_products").html("")

	    		$("#div_table_calculator").css("display","")

	    		resp.products.map(data=>{
	    			var long = ""

	    			if(typeof data.long_total !== 'undefined' && data.long_total != null){
	    				long = data.long_total+" "
	    			}

	    			var html = `<tr>
	    				<td>`+data.code+`</td>
						<td>`+data.description+`</td>
						<td class="text-center">`+data.count_total+`</td>
						<td class="text-center">`+long+``+data.unit+`</td>
						<td class="text-center"><img src="`+data.photo+`" class="table-img" alt="sin foto"></td>
	    			</tr>`

	    			$("#body_table_products").append(html)
	    		})

	    		dataProducts = resp;
    		}catch(e){
    			console.error("Error: a ocurrido un error inesperado al llenar la tabla. "+e)
    		}	
    	}


    	function checkInputForLetters(e) {
		    tecla = (document.all) ? e.keyCode : e.which;

		    //Tecla de retroceso para borrar, siempre la permite
		    if (tecla == 8) {
		        return true;
		    }

		    // Patron de entrada, en este caso solo acepta numeros y letras
		    patron = /[0-9\+\-]/;
		    tecla_final = String.fromCharCode(tecla);

		    var res = patron.test(tecla_final)

		    if (res && e.target.value.length == 4){
		    	e.target.value = e.target.value + "-";
		    }

		    return res;
		}

		function checkInputDistance(e) {
		    tecla = (document.all) ? e.keyCode : e.which;

		    //Tecla de retroceso para borrar, siempre la permite
		    if (tecla == 8) {
		        return true;
		    }

		    // Patron de entrada, en este caso solo acepta numeros y letras
		    patron = /[0-9\,\.]/;
		    tecla_final = String.fromCharCode(tecla);
		    return patron.test(tecla_final);
		}

    	function setTwoNumberDecimal(event){

    		if(event.target.value == null || event.target.value == "") return

    		var monto =  event.target.value.replace(/[^\d\,]/g, "").replace(",", ".")
    		var luegoComa = ""

    		monto = parseFloat(monto).toLocaleString("es-VE",{maximumFractionDigits: 2});

    		var verificacion = monto.split(",")

    		if(verificacion[0].length != 4){
    			event.target.value = monto
    			return
    		}
    		if (verificacion.length > 1) {
		        luegoComa = verificacion[1]
		        verificacion = verificacion[0]
		    } else {
		        verificacion = verificacion[0]
		    }

		    monto = verificacion[0] + "." + verificacion[1] + "" + verificacion[2] + "" + verificacion[3]

		    if (luegoComa != '') monto += "," + luegoComa

    		event.target.value = monto
    	}
	}catch(e){
		console.error("calculator: "+e)
	}