<div class="panel panel-default">
    <div class="panel-heading">
        <h4>@lang('campaigns.sidebar.pledges.title')</h4>
    </div>
    <div class="panel-body">
        <p>@lang('campaigns.sidebar.pledges.description')</p>
    </div>

    <table class="table table-bordered">
        <tbody>
            @if( 0 < count( $campaign->pledges ) )
            @foreach( $campaign->pledges as $pledge )
            <tr>
                <th>Title</th>
                <td>{{ $pledge->title }}</td>
            </tr>
            <tr>
                <td colspan="2">{{ $pledge->description }}</td>
            </tr>
            <tr>
                <td colspan="2" class="text-center">{{ round($pledge->price_min/100, 2) }}€ or more</td>
            </tr>
            <tr>
                <td colspan="2"><a href="#" class="btn btn-info btn-block">Edit</a></td>
            </tr>
            @endforeach
            @endif
        </tbody>
        <tfoot>
            <form action="{{ URL::route('public.campaigns.pledges.create', [ 'id' => $campaign->id ]) }}" method="post">
            <tr>
                <th colspan="2">Title</th>
            </tr>
            <tr>
                <td colspan="2">
                    <div class="form-group {{ 'create_pledge' == Input::old('action', '') && $errors->has('title') ? 'has-error' : '' }}">
                        <input type="text" name="title" id="pledge_title" class="form-control" value="{{ 'create_pledge' == Input::old('action', '') ? Input::old('title', '') : '' }}">
                        @if( 'create_pledge' == Input::old('action', '') && $errors->has('title' ) )
                        <span class="help-block">{{ $errors->first('title') }}</span>
                        @endif
                    </div>
                </td>
            </tr>
            <tr>
                <th colspan="2">Description</th>
            </tr>
            <tr>
                <td colspan="2">
                    <div class="form-group {{ 'create_pledge' == Input::old('action', '') && $errors->has('description') ? 'has-error' : '' }}">
                        <textarea name="description" id="pledge_description" class="form-control {{ 'create_pledge' == Input::old('action', '') && $errors->has('description') ? 'has-error' : '' }}">{{ 'create_pledge' == Input::old('action', '') ? Input::old('description', '') : '' }}</textarea>
                        @if( 'create_pledge' == Input::old('action', '') && $errors->has('description' ) )
                        <span class="help-block">{{ $errors->first('description') }}</span>
                        @endif
                    </div>
                </td>
            </tr>
            <tr>
                <th>Price Min</th>
                <th>Price Max</th>
            </tr>
            <tr>
                <td>
                    <div class="form-group {{ 'create_pledge' == Input::old('action', '') && $errors->has('price_min') ? 'has-error' : '' }}">
                        <input type="number" min="0" name="price_min" id="pledge_price_min" class="form-control {{ 'create_pledge' == Input::old('action', '') && $errors->has('price_min') ? 'has-error' : '' }}" value="{{ 'create_pledge' == Input::old('action', '') ? Input::old('price_min', '0') : '0' }}">
                        @if( 'create_pledge' == Input::old('action', '') && $errors->has('price_min' ) )
                        <span class="help-block">{{ $errors->first('price_min') }}</span>
                        @endif
                    </div>
                </td>
                <td>
                    <div class="form-group {{ 'create_pledge' == Input::old('action', '') && $errors->has('price_max') ? 'has-error' : '' }}">
                        <input type="number" min="0" name="price_max" id="pledge_price_max" class="form-control {{ 'create_pledge' == Input::old('action', '') && $errors->has('price_max') ? 'has-error' : '' }}" value="{{ 'create_pledge' == Input::old('action', '') ? Input::old('price_max', '') : '' }}">
                        @if( 'create_pledge' == Input::old('action', '') && $errors->has('price_max' ) )
                        <span class="help-block">{{ $errors->first('price_max') }}</span>
                        @endif
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="2"><button type="submit" class="btn btn-success btn-block" name="action" value="create_pledge"><i class="glyphicon glyphicon-yes"></i> @lang('pledges.buttons.add')</button></td>
            </tr>
            </form>
        </tfoot>
    </table>
</div>