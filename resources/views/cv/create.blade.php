@extends('layouts.app')


@section('content')


<div class="container">
	<div class="row">
		<div class="col-md-12">
			<form action="{{ url('cvs') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}

				<div class="form-group @if($errors->get('titre')) has-error @endif">
					<label for="">Titre</label>
					<input type="text" name="titre" class="form-control" value="{{ old('titre') }}">
			    @if($errors->get('titre'))
			    <div class="alert alert-danger" role="alert">
                    <ul>
                    @foreach($errors->get('titre') as $message)
                      <li>{{ $message }}</li>
                    @endforeach
                     </ul>
                </div>
                @endif
				</div>

				<div class="form-group has-error">
					<label for="">Presentation</label>
					<textarea type="text" name="presentation" class="form-control">{{ old('presentation') }}
					</textarea>
			    @if($errors->get('presentation'))
			    <div class="alert alert-danger" role="alert">
                    <ul>
                    @foreach($errors->get('presentation') as $message)
                      <li>{{ $message }}</li>
                    @endforeach
                     </ul>
                     </div>
                @endif
				</div>

				<div class="form-group">
					<label>Image</label>
					<input class="form-control" type="file" name="photo">
				</div>
                <hr>
				<div class="from-group">
					<input type="submit" class="form-control btn btn-primary" value="Enregistrer">
				</div>
			</form>
		</div>
	</div>
</div>

@endsection