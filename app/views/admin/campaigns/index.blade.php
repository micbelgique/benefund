@if( Session::has('message') )
<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<div class="row">
    <div class="col-xs-12">
        @if( Input::get('s', '') != '' )
        <div class="pull-left">
            <h4>@lang('campaigns.search.title', [ 'search' => Input::get('s') ])</h4>
        </div>
        @endif
    </div>
</div>

<div class="row">
    <div class="col-xs-12">
        <div class="pull-left">
            <p><a href="{{ URL::route('admin.campaigns.new') }}" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> @lang('campaigns.form.buttons.new')</a></p>
        </div>
        <div class="pull-right">
            <p>
                <form action="{{ URL::route('admin.campaigns') }}" type="get" class="form-inline">
                    <div class="input-group">
                        <input type="text" class="form-control" name="s" id="s" placeholder="@lang('campaigns.form.search.placeholder')" value="{{ Input::get('s', '') }}">
                        <span class="input-group-btn">
                            <button class="btn btn-primary"><i class="glyphicon glyphicon-search"></i> @lang('campaigns.form.search.button')</button>
                        </span>
                    </div>
                </form>
            </p>
        </div>
    </div>
</div>

<table id="campaigns" class="table table-bordered">
    <tbody>
    @if( count( $campaigns ) > 0 )
    @foreach( $campaigns as $campaign )
        <tr>
            <th>@lang('campaigns.manage.table.title')</th>
            <td>{{ $campaign->title }}</td>
        </tr>
        <tr>
            <td colspan="2">{{ $campaign->description }}</td>
        </tr>
        <tr>
            <td colspan="2">
                <form action="{{ URL::route('admin.campaigns.delete', [$campaign->id]) }}" method="post">
                    <div class="btn-group btn-group-justified">
                        <div class="btn-group">
                            <a href="{{ URL::route('admin.campaigns.edit', [ 'id' => $campaign->id ]) }}" class="btn btn-primary"><i class="glyphicon glyphicon-edit"></i> @lang('campaigns.buttons.edit')</a>
                        </div>
                        <div class="btn-group">
                            <button class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i> @lang('campaigns.buttons.delete')</button>
                        </div>
                    </div>
                </form>
            </td>
        </tr>
    @endforeach
    @else
        <tr class="danger">
            <td>@lang('campaigns.empty')</td>
        </tr>
    @endif
    </tbody>
</table>

<div class="row">
    <div class="col-xs-12">
        <div class="pull-left">
            <p><a href="{{ URL::route('admin.campaigns.new') }}" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> @lang('campaigns.form.buttons.new')</a></p>
        </div>
    </div>
</div>