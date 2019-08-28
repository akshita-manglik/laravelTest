@extends('template.template')

@section('content')
<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<h2 class="text-center">Client Login</h2>

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
			{{ Form::open(array('url' => '/c/login')) }}
			<div class="form-group">
			   <?php echo Form::label('email', 'E-Mail Address'); ?>
			   <?php echo Form::email('email', '', array('placeholder' => "E-Mail Address",'class' => "form-control" ,'required' => 'required')); ?>			
			</div>
			<div class="form-group">
			   <?php echo Form::label('password', 'Password'); ?>
			   <?php echo Form::password('password', array('placeholder' => "Password",'class' => "form-control" ,'required' => 'required' )); ?>			
			</div>
			<div>
				<?php echo Form::submit('Submit', array('class' => 'btn btn-success'));?>
			</div>
			{{ Form::close() }}
		</div>
	</div>
</div>
@endSection
