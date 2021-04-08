@extends('layouts.app')


@section('content')

<div class="container" id="app">
<div class="row">
	<div class="col-md-12">

		<h1>@{{ message }}</h1>

		<div class="card-primary">
			<div class="card-header" style="background-color: #0404B4;">
				<div class="row">
					<div class="col-md-10">
						<h3 class="card-title">Experience</h3>	
					</div>
					<div class="col-md-2 text-right">
				<button class="btn btn-success" @click="open = true">Ajouter</button>
					</div>
				</div>
			
			</div>
			<div class="card-body">

				<div v-if='open'>
					<div class="form-group">
						<label>Titre</label>
					<input type="text" class="form-control" name="" placeholder="Titre" v-model="experience.titre">
					</div>
					<div class="form-group">
					<label>body</label>
					<textarea type="text"  class="form-control" name="" placeholder="Body" v-model="experience.body"></textarea>
					</div>

					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
							<label>date debut</label>
			      <input type="date"  class="form-control" name="" placeholder="fin" v-model="experience.debut">
						</div>
							
						</div>
						<div class="col-md-6">
						<div class="form-group">
						<label>date fin</label>
			      <input type="date"  class="form-control" name="" placeholder="debut" v-model="experience.fin">
						</div>
							
						</div>

					</div>
					
					<button class="btn btn-info btn-block">Ajouter</button>
				</div>
				<ul class="list-group">
					<li class="list-group-item" v-for="experience in experiences">
						<div class="pull-right text-right">
							<button class="btn btn-warning btn-sm">Editer</button>
						</div>
						<h3>@{{ experience.titre }}</h3>
						<p>@{{  experience.body}}</p>
						<small>@{{ experience.debut }} - @{{ experience.fin }}</small>
					</li>
				</ul> 
			</div>
		</div>

		<div class="card card-primary">
			<div class="card-header">
				<div class="row">
					<div class="col-md-10"></div>
					<div class="col-md-2"></div>
				</div>
			<h3 class="card-title">Formation</h3>	
			</div>
			<div class="card-body">
				je suis abderrahim akarid j'ai 25 ans je suis origine. 
				je suis abderrahim akarid j'ai 25 ans je suis origine. 
			</div>
		</div>

	    <div class="card card-primary">
			<div class="card-header">
				<div class="row">
					<div class="col-md-10"></div>
					<div class="col-md-2"></div>
				</div>
			<h3 class="card-title">PortFlio</h3>	
			</div>
			<div class="card-body">
				je suis abderrahim akarid j'ai 25 ans je suis origine. 
				je suis abderrahim akarid j'ai 25 ans je suis origine. 
			</div>
		</div>

		<div class="card card-primary">
			<div class="card-header">
				<div class="row">
					<div class="col-md-10"></div>
					<div class="col-md-2"></div>
				</div>
			<h3 class="card-title">competence</h3>	
			</div>
			<div class="card-body">
				je suis abderrahim akarid j'ai 25 ans je suis origine. 
				je suis abderrahim akarid j'ai 25 ans je suis origine. 
			</div>
		</div>

		<div class="card card-primary">
			<div class="card-header">
				<div class="row">
					<div class="col-md-10"></div>
					<div class="col-md-2"></div>
				</div>
			<h3 class="card-title">Experience</h3>	
			</div>
			<div class="card-body">
				je suis abderrahim akarid j'ai 25 ans je suis origine. 
				je suis abderrahim akarid j'ai 25 ans je suis origine. 
			</div>
		</div>

	</div>
</div>
</div>

@endsection


@section('javascripts')
     <script src="{{ asset('js/vue.js') }}"></script>
     <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
     <script>window.laravel = {!! json_encode([
     	'csrfToken' => csrf_token(),
     	'idExperinece' => $id,
     	'url' => url('/')
     	]) !!};
     </script>
<script>
	var app = new Vue({
		el : '#app',
		data : {
			message : 'je suis abderrahim Akarid',
			experiences : [],
			open : false
			experience :{
				id : 0,
				cv_id : 0,
				titre : '',
				body : '',
				debut : '',
				fin : ''


			}
 		},
		methods : {
			getExperiences : function()
			{
				axios.get(window.laravel.url+'/getExperiences/'+window.laravel.id)
			   .then(response => {
			   	this.experiences = response.data;
                })
			    .catch(err => console.log(err))
		}
	},
	mounted : function(){
		this.getExperiences();
	}
	});
	
</script>
@endsection