@if( Session::has( 'message' ) )
<div class="alert alert-{{ $errors->has() ? 'danger' : 'success' }} alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">@lang('app.close')</span></button>
    {{ Session::get('message') }}
</div>
@endif

<div class="row">
    <div class="col-xs-12">
        <div class="thumbnail">
            <img src="{{ $campaign->get_cover(740, 263) }}" alt="@lang('campaigns.view.invite', ['name'=>$campaign->title])">
            <div class="caption">
                <div style="height: 100px">{{ $campaign->description }}</div>
                <div class="row">
                    <div class="col-xs-4 col-md-4 col-sm-4">
                        <a href="#" class="btn btn-sm btn-danger btn-block" role="button"><i class="glyphicon glyphicon-heart"></i> @lang('campaigns.index.like')</a>
                    </div>
                    <div class="col-xs-8 col-md-8 col-sm-8">
                        <div class="progress progress-striped active" style="height: 33px">
                            <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="height: 33px; width: 60%;">
                                <span style="font-size: 12px; line-height: 33px">@lang('campaigns.index.current_progress', ['current' => '1.270', 'max' => '<strong>12.765</strong>'])</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@if( Auth::check() && ( $campaign->vendor->id == Auth::user()->id || Auth::user()->role->name_tag == 'admin' ) )
<div class="pull-right">
    <a href="{{ URL::route('public.campaigns.edit', [ 'id' => $campaign->id ]) }}" class="btn btn-primary">Edit this campaign</a>
</div>
<br><br><br>
@endif
<div class="row">
    <div class="col-md-12">
        <div class="thumbnail" style="padding: 12px">
            <h4>@lang('campaigns.pledges.title')</h4>
            <div class="row caption">
                @if( 0 < count($campaign->pledges) )
                @foreach( $campaign->pledges as $pledge )
                <div class="col-md-4">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <h3 class="panel-title">{{ $pledge->title }}</h3>
                        </div>
                        <div class="panel-body">
                            <div style="height: 100px">{{ strlen($pledge->description) > 253 ? substr($pledge->description, 0, 250) . '...' : $pledge->description }}</div>
                        </div>
                        <div class="panel-footer">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="pull-left">
                                        <a href="#" class="btn btn-primary btn-sm">Buy</a>
                                    </div>
                                    <div class="pull-right">
                                        <span class="label label-warning">Limited 7/7</span><br />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                @else
                <div class="alert alert-warning">
                    <p>@lang('campaigns.pledges.empty')</p>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <h4>@lang('campaigns.details.vendor')</h4>
        <div class="row">
            <div class="col-md-3">
                <p class="text-center">
                    {{ $campaign->vendor->get_avatar_url() ? '<img src="' . $campaign->vendor->get_avatar_url() . '" alt="' . Lang::get('user.avatar') . '" class="img-circle" width="150px">' : '<span class="glyphicon glyphicon-user icon-size"></span>' }}
                </p>
            </div>
            <div class="col-md-9">
                <p class="text-left"><strong>{{ $campaign->vendor->first_name . ' ' . $campaign->vendor->last_name }}</strong></p>
                <p>{{ $campaign->vendor->bio }}</p>
                <div class="btn-group pull-left">
                    <a href="{{ URL::route('public.member', [$campaign->vendor->id]) }}" class="btn btn-sm btn-info" role="button"><i class="glyphicon glyphicon-eye-open"></i> @lang('members.profile.view')</a>
                    <a href="mailto:{{ $campaign->vendor->email }}" class="btn btn-sm btn-primary" role="button"><i class="glyphicon glyphicon-inbox"></i> @lang('members.profile.mail')</a>
                </div>
            </div>
        </div>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-md-4">
        <h4>@lang('campaigns.details.address')</h4>
        <div class="vcard well">
            <a class="fn org url" href="#"><strong>{{ $campaign->target_title }}</strong></a>
            <div class="adr">
                <div class="street-address">{{ $campaign->target_adress_street }}</div>
                <div class="street-address">{{ $campaign->target_adress_street2 }}</div>
                <span class="postal-code">{{ $campaign->target_adress_zip }}</span> <span class="locality">{{ $campaign->target_adress_city }}</span>
                <div class="country-name">{{ $campaign->target_adress_city }}</div>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="panel panel-default">
            <div class="panel-heading">@lang('campaigns.details.geolocation')</div>
            <div class="panel-body">
                <div id="google-map" data-latitude="{{ $campaign->target_lat }}" data-longitude="{{ $campaign->target_long }}" style="height: 150px; width: 100%; position: relative; overflow: hidden; -webkit-transform: translateZ(0px);"></div>
            </div>
        </div>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-md-12">
        <p>{{ $campaign->target_description }}</p>
    </div>
</div>