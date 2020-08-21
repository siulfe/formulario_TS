<!DOCTYPE html>
<html>
<head>
	<title></title>

	<style type="text/css">
		.bg-title-form{
			background-color: #c2e8f4!important
		}

		.table-img{
			max-height: 50px !important
		}

		h2{
		    text-align: center!important;
		}
		.mb-2, .my-2 {
		    margin-bottom: .5rem!important;
		}
		.mt-1, .my-1 {
		    margin-top: .25rem!important;
		}

		.table{
			width: 100%
		}

		.text-center {
		    text-align: center!important;
		}

		header {
		    position: fixed;
		    top: 0cm;
		    left: 0cm;
		    right: 0cm;
		    height: 3cm;
		}

		header img{
			width: 100%;
		}

		main{
			margin: 0 !important;
			padding:  0 !important;
		}
		           

        body {
                margin-top: 3cm;
                margin-left: 0.5cm;
                margin-right: 0.5cm;
                margin-bottom: 2cm;
            }
	</style>
</head>
<body>

	<header>
		<img src="{{$data->headerIMG}}" alt="Calculo de Proyecto de Bandejas Portable Tipo Malla">
	</header>

	<main>
		<p>
			A nombre de: <b>{{$data->user["name"]}}</b>
		</p>
		<p>
			Email: <b>{{$data->user["email"]}}</b> 
		</p>
		<p>
			Teléfono: <b>{{$data->user["phone"]}}</b>
		</p>
		<p>
			Tipo de Instalación: <b>{{$data->instalation["description"]}}</b> 
			<span style="float:right">Resultado <b>{{$data->count_total}} </b>items</span>
		</p>
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
			<tbody>
				@foreach($data->products as $v)
				<tr>
					<td>{{$v["code"]}}</td>
					<td>{{$v["description"]}}</td>
					<td class="text-center">{{$v["count_total"]}}</td>
					<td class="text-center">
						@if(array_key_exists("long_total",$v))
							{{$v["long_total"]}}
						@endif
						{{$v["unit"]}}
					</td>
					<td class="text-center"><img src="{{$v['photo']}}" class="table-img" alt="sin foto"></td>
				</tr>
				@endforeach
			</tbody>
		</table>
		
	</main>
</body>
</html>