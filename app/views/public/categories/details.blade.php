<img class="thumbnail" src="{{ $category->get_cover(1000, 300) }}">
<hr>
@if( Session::has( 'message' ) )
<div class="alert alert-{{ $errors->has() ? 'danger' : 'success' }} alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">@lang('app.close')</span></button>
    {{ Session::get('message') }}
</div>
@endif

<div class="well well-lg">{{ $category->description }}</div>
<h2>@lang('categories.active_campaigns')</h2>
@if( count( $campaigns ) > 0 )
    @foreach( $campaigns as $index => $campaign )
        @include('public.campaigns.parts.whole-width')
    @endforeach
@else
<div class="alert alert-warning" role="alert">@lang('categories.details.no_campaign')</div>
@endif