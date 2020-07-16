try{
		var dataProducts = {}
		var sendPetitionCalculator = false

		window.addEventListener("load",function (){
			var divPage = $("#div_calculator");


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
											Escalerilla PTM (0.05m x 0.35m x 2.4m)
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
											<input type="number" id="distance" name="distance" required min="1" class="w-3-r ml-md-4 ml-sm-2 bg-gray">&nbsp;&nbsp;mts
										</label>
									</li>

									<li class="mt-2">
										Cantidad de curvas a usar: 
										<label>
											<input type="number" id="curves" name="curves" min="1" class="w-3-r ml-md-4 ml-sm-2 bg-gray">&nbsp;&nbsp;mts
										</label>
									</li>

									<li class="mt-2">
										Cantidad Cascada o llegada de cable a rack: 
										<label>
											<input type="number" id="cascade" name="cascade" min="1" class="w-3-r ml-md-4 ml-sm-2 bg-gray">&nbsp;&nbsp;mts
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
									<div class="col-md-2 col-xl-7 col-sm-2 p-0">
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
						        		<input type="text" class="form-control" id="phone_budget" id="user_telephone" name="phone" required placeholder="Telefono:" minlength="11" pattern="[0-9]{11,}">
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

	
				let input = $('#user_telephone');

			
				input.bind("invalid", function(event){
					if(input.val() != null && input.val().length >= 11){
			    		event.target.setCustomValidity('Formato invalido, el número telefonico no acepta letras');
					}
				})

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

			    data.distance = $('#distance').val()

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

			    data.token = 'bc3b2003-dab0-4d91-86c6-b0f70eb16781';

				sendPetitionCalculator = true
			    $.ajax({ 
			    	url: 'http://127.0.0.1:8000/api/products', 
			    	type:'POST', 
			    	dataType:'json',
			    	data:data,
			    	success: fillTable,
			    	error: function(resp){
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
			    dataProducts.token = 'bc3b2003-dab0-4d91-86c6-b0f70eb16781';
				sendPetitionCalculator = true
				toastr.info("Enviando el registro, espere un momento por favor.")
				
				$.ajax({ 
			    	url: 'http://127.0.0.1:8000/api/products/pdf', 
			    	type:'POST', 
			    	dataType:'json',
			    	data:dataProducts,
			    	success: function(resp){
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
			    		sendPetitionCalculator = false
			    		toastr.info("No se ha podido registrar su solicitud.");
			    	}

				})
			})
		})

		function fillTable(resp){
    		try{
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

	}catch(e){
		console.error("calculator: "+e)
	}