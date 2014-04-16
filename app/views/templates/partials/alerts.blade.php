@if(Session::has('error'))
<div class="alert alert-danger">
	<h4><i class="glyphicon glyphicon-exclamation-sign"></i> Oh snap!</h4>
	<p>{{Session::get('error')}}</p>
</div>
@endif
@if(Session::has('message'))
<div class="alert alert-info">
	<h4><i class="glyphicon glyphicon-info-sign"></i> Heads up!</h4>
	<p>{{Session::get('message')}}</p>
</div>
@endif