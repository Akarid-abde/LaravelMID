@extends('layouts.app')


@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">


			<h1> List des Cvs </h1>
             <div style="margin-left: 80%;">
             	<a href="{{ url('cvs/create') }}" class="btn btn-warning"> Nouveau CV </a>
             </div>
 <!--             
			<table class="table">
				<head>
				<tr>
					<th>Titre</th>
					<th>Presentation</th>
					<th>Date</th>
					<th>Action</th>
				</tr>
				</head>
				
                <body>
                	@foreach($cvs as $cv)
                <tr>
					<td>{{ $cv->titre }}  </br> {{ $cv->user->name }} </td>
					<td>{{ $cv->presentation }}</td>
					<td>{{ $cv->created_at }}</td>
					<td>

						<form action="{{ url('cvs/'.$cv->id) }}" method="post">
						{{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <a href="" class="btn btn-primary">Details</a>
						<a href="{{ url('cvs/'.$cv->id.'/edit') }}" class="btn btn-default">edit</a>
						<button type="submit"  class="btn btn-danger">Delete</button>
						</form>
					</td>
				</tr>
				@endforeach
                </body>
			</table> -->

	

<div class="row">
@foreach($cvs as $cv)
<div class="col-sm-6 col-md-4">

	
	 <div class="card" style="width: 18rem;">
  <img class="card-img-top" src="{{ asset('storage/'.$cv->photo) }}"  alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title">{{ $cv->titre }} </h5>
    <p class="card-text">{{ $cv->presentation }}</p>
    <p class="card-text">{{ $cv->user->name }}</p>
      <p class="card-text">{{ $cv->created_at }}</p>
    	<form action="{{ url('cvs/'.$cv->id) }}" method="post">
						{{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <a href="" class="btn btn-primary">Details</a>
						<a href="{{ url('cvs/'.$cv->id.'/edit') }}" class="btn btn-default">edit</a>
	@can('delete',$cv)
   <button type="submit"  class="btn btn-danger">Delete</button>
    @endcan
						</form>
  </div>

</div>
</div>
@endforeach
</div>
		</div>
	</div>
</div>
@endsection




