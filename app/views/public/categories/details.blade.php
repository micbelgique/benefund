@if( Session::has( 'message' ) )
<div class="alert alert-{{ $errors->has() ? 'danger' : 'success' }} alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">@lang('app.close')</span></button>
    {{ Session::get('message') }}
</div>
@endif

<div class="well well-lg">{{ $category->description }}</div>
<h2>@lang('public.categories.active_campaigns')</h2>
@if( count( $campaigns ) > 0 )
    @foreach( $campaigns as $index => $campaign )
        <div class="row">
            <div class="col-xs-12">
                <div class="thumbnail">
                    <img src="http://placehold.it/1000x350" alt="@lang('campaigns.view.invite', ['name'=>$campaign->title])">
                    <div class="caption">
                        <h3>
                            <a href="{{ URL::route('public.campaigns.details', [ 'id' => $campaign->id ]) }}" title="{{ $campaign->title }}">{{ $campaign->title }}</a>
                        </h3>
                        <p style="height: 100px">{{ strlen($campaign->description) > 253 ? substr($campaign->description, 0, 250) . '...' : $campaign->description }}</p>
                        <div class="row">
                            <div class="col-xs-4 col-md-4 col-sm-4">
                                <div class="btn-group pull-left">
                                    <a href="#" class="btn btn-sm btn-danger" role="button"><i class="glyphicon glyphicon-heart"></i> @lang('campaigns.index.like')</a>
                                    <a href="#" class="btn btn-sm btn-primary" role="button"><i class="glyphicon glyphicon-credit-card"></i> @lang('campaigns.index.fund')</a>
                                    <a href="{{ URL::route('public.campaigns.details', [ 'id' => $campaign->id ]) }}" class="btn btn-sm btn-info" role="button"><i class="glyphicon glyphicon-eye-open"></i> @lang('campaigns.index.view')</a>
                                </div>
                            </div>
                            <div class="col-xs-8 col-md-8 col-sm-8">
                                <div class="progress progress-striped active" style="height: 33px">
                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="height: 33px; width: 60%;">
                                        <span style="font-size: 12px; line-height: 33px">@lang('campaigns.index.current_progress', ['current' => '1.270', 'max' => '<strong>12.765</strong>'])</span>
                                    </div>
                                </div>                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@else
<div class="alert alert-warning" role="alert">@lang('categories.details.no_campaign')</div>
@endif