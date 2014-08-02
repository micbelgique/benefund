@if( Session::has( 'message' ) )
<div class="alert alert-{{ $errors->has() ? 'danger' : 'success' }} alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">@lang('app.close')</span></button>
    {{ Session::get('message') }}
</div>
@endif

<div class="well well-lg">{{ $category->description }}</div>
{{ count($campaigns) }}
@if( count( $campaigns ) > 0 )
    @foreach( $campaigns as $index => $campaign )
        @if($index == 0)
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
        @else
            @if($index == 1)
            <div class="row">
            @endif
            
            <div class="col-xs-4 col-md-4 col-sm-4">
                <div class="thumbnail">
                    <a href="{{ URL::route('public.campaigns.details', [ 'id' => $campaign->id ]) }}" title="{{ $campaign->title }}">
                        <img src="http://placehold.it/350x250" alt="@lang('campaigns.view.invite', ['name'=>$campaign->title])">
                    </a>
                    <div class="caption">
                        <h3 style="height: 60px">
                            <a href="{{ URL::route('public.campaigns.details', [ 'id' => $campaign->id ]) }}" title="{{ $campaign->title }}">{{ $campaign->title }}</a>
                        </h3>
                        <hr>
                        <p style="height: 100px">{{ strlen($campaign->description) > 123 ? substr($campaign->description, 0, 120) . '...' : $campaign->description }}</p>
                        <hr>
                        <p>@lang('campaigns.index.current_progress', ['current' => '1.270', 'max' => '<strong>12.765</strong>'])</p>
                        <div class="progress progress-striped active">
                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
                        </div>
                    </div>
                    <div class="btn-group btn-group-justified">
                        <a href="#" class="btn btn-sm btn-danger" role="button"><i class="glyphicon glyphicon-heart"></i> @lang('campaigns.index.like')</a>
                        <a href="#" class="btn btn-sm btn-primary" role="button"><i class="glyphicon glyphicon-credit-card"></i> @lang('campaigns.index.fund')</a>
                        <a href="{{ URL::route('public.campaigns.details', [ 'id' => $campaign->id ]) }}" class="btn btn-sm btn-info" role="button"><i class="glyphicon glyphicon-eye-open"></i> @lang('campaigns.index.view')</a>
                    </div>
                </div>
            </div>        
            @if($index % 3 == 0)
            </div>
            <div class="row">
            @endif

            @if($index == count($campaigns))
            </div>
            @endif
            
        @endif
    @endforeach
@else
<div class="alert alert-warning" role="alert">@lang('categories.details.no_campaign')</div>
@endif