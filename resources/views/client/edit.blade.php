@extends('template.template')

@section('content')

<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<h2 class="text-center">Client Sign Up</h2>
		
		@if ($errors->any())
		    <div class="alert alert-danger">
		        <ul>
		            @foreach ($errors->all() as $error)
		                <li>{{ $error }}</li>
		            @endforeach
		        </ul>
		    </div>
		@endif

		<div>
			{{ Form::open(array('url' => route('Client.edit', ['id' => base64_encode( Session::get('id') ) ] ) , 'method' => 'post')) }}
			<div class="form-group">
			   <?php echo Form::label('name', 'Name'); ?>
			   <?php echo Form::text('name', $client->name , array('placeholder' => "Name",'class' => "form-control" ,'required' => 'required' )); ?>			
			</div>
			<div class="form-group">
			   <?php echo Form::label('email', 'E-Mail Address'); ?>
			   <?php echo Form::email('email', $client->email  , array('placeholder' => "E-Mail Address",'class' => "form-control" ,'readonly' => "readonly" ,'required' => 'required')); ?>			
			</div>
			<div>
				<?php echo Form::hidden('id', base64_encode($client->id) ); ?>
				<?php echo Form::submit('Submit', array('class' => 'btn btn-success'));?>
			</div>
			{{ Form::close() }}
		</div>
	</div>
</div>
@endsection

 

