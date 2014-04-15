@if(Session::has('error'))
<div class="block block-danger">
	<button type="button" class="close" data-dismiss="block" aria-hidden="true">&times;</button>
	<h4><i class="glyphicon glyphicon-exclamation-sign"></i> Oh snap!</h4>
	<p>{{Session::get('error')}}</p>
</div>
@endif
@if(Session::has('message'))
<div class="block block-info">
	<button type="button" class="close" data-dismiss="block" aria-hidden="true">&times;</button>
	<h4><i class="glyphicon glyphicon-info-sign"></i> Heads up!</h4>
	<p>{{Session::get('message')}}</p>
</div>
@endif