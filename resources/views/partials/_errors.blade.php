 @if(count($errors->all()))
	 <div class="row">
		<div class="col-md-12">
			<div class="alert alert-danger">
			<h5>There were errors in your submission</h5>
				<ul>
					@foreach($errors->all() as $error)
						<li>{{$error}}</li>
					@endforeach
				</ul>
			</div>
		</div>
	</div>
@endif