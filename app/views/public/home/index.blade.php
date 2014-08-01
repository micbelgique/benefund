<h2 class="page-header">@lang('home.title')</h2>

@if( Session::has( 'message' ) )
<div class="alert alert-success alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">@lang('app.close')</span></button>
    {{ Session::get('message') }}
</div>
@endif