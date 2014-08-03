@if( 'create_campaign' == Input::old('action', '') && Session::has( 'message' ) )
<div class="alert alert-{{ $errors->has() ? 'danger' : 'success' }} alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">@lang('app.close')</span></button>
    {{ Session::get('message') }}
</div>
@endif

<form action="{{ URL::route('public.campaigns.update', ['id' => $campaign->id]) }}" method="post" enctype="multipart/form-data">
    <h4>@lang('campaigns.form.labels.introduction')</h4>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group {{ 'create_campaign' == Input::old('action', '') && $errors->has('title') ? 'has-error has-feedback' : '' }}">
                <label for="name">@lang('campaigns.form.labels.title')</label>
                <input type="text" class="form-control" name="title" id="title" value="{{ 'create_campaign' == Input::old('action', '') ? Input::old('title', $campaign->title) : $campaign->title }}" placeholder="@lang('campaigns.form.placeholders.title')">
                @if( 'create_campaign' == Input::old('action', '') && $errors->has('title' ) )
                <span class="glyphicon glyphicon-remove form-control-feedback"></span>
                <span class="help-block">{{ $errors->first('title') }}</span>
                @endif
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group {{ 'create_campaign' == Input::old('action', '') && $errors->has('description') ? 'has-error has-feedback' : '' }}">
                <label for="name">@lang('campaigns.form.labels.description')</label>
                <textarea class="form-control summernote" rows="3" name="description" id="description">{{ 'create_campaign' == Input::old('action', '') ? Input::old('description', $campaign->description) : $campaign->description }}</textarea>
                @if( 'create_campaign' == Input::old('action', '') && $errors->has('description' ) )
                <span class="glyphicon glyphicon-remove form-control-feedback"></span>
                <span class="help-block">{{ $errors->first('description') }}</span>
                @endif
            </div>
        </div>
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2">
                    <img class="thumbnail" src="{{ $campaign->get_thumb(64, 64) }}">
                </div>
                <div class="col-md-10">
                    <div class="form-group">
                        <label for="thumb">@lang('campaigns.form.labels.thumb')</label>
                        <input type="file" accept="image/png, image/jpeg, image/gif" name="thumb"/>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="cover">@lang('campaigns.form.labels.cover')</label>
                        <input type="file" accept="image/png, image/jpeg, image/gif" name="cover"/>
                    </div>
                </div>
                <div class="col-md-12 text-center">
                    <img class="thumbnail" src="{{ $campaign->get_cover(740, 263) }}">
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group {{ 'create_campaign' == Input::old('action', '') && $errors->has('date_start') ? 'has-error has-feedback' : '' }}">
                <label for="name">@lang('campaigns.form.labels.date_start')</label>
                <input type="date" class="form-control" name="date_start" id="date_start" value="{{ date('Y-m-d', ( Input::old('date_start', $campaign->date_start) > 0 ? strtotime(Input::old('date_start', $campaign->date_start)) : time())) }}" placeholder="@lang('campaigns.form.placeholders.date_start')">
                @if( 'create_campaign' == Input::old('action', '') && $errors->has('date_start' ) )
                <span class="glyphicon glyphicon-remove form-control-feedback"></span>
                <span class="help-block">{{ $errors->first('date_start') }}</span>
                @endif
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group {{ 'create_campaign' == Input::old('action', '') && $errors->has('date_end') ? 'has-error has-feedback' : '' }}">
                <label for="name">@lang('campaigns.form.labels.date_end')</label>
                <input type="date" class="form-control" name="date_end" id="date_end" value="{{ date('Y-m-d', ( Input::old('date_start', $campaign->date_start) > 0 ? strtotime(Input::old('date_start', $campaign->date_start)) : time() +2592000)) }}" placeholder="@lang('campaigns.form.placeholders.date_end')">
                @if( 'create_campaign' == Input::old('action', '') && $errors->has('date_end' ) )
                <span class="glyphicon glyphicon-remove form-control-feedback"></span>
                <span class="help-block">{{ $errors->first('date_end') }}</span>
                @endif
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group {{ 'create_campaign' == Input::old('action', '') && $errors->has('item_price') ? 'has-error has-feedback' : '' }}">
                <label for="name">@lang('campaigns.form.labels.item_price')</label>
                <input type="text" class="form-control" name="item_price" id="item_price" value="{{ round(Input::old('item_price', $campaign->item_price)/100, 2) }}" placeholder="@lang('campaigns.form.placeholders.item_price')">
                @if( 'create_campaign' == Input::old('action', '') && $errors->has('item_price' ) )
                <span class="glyphicon glyphicon-remove form-control-feedback"></span>
                <span class="help-block">{{ $errors->first('item_price') }}</span>
                @endif
            </div>
        </div>
        @if( count( $categories ) > 0 )
        <div class="col-md-12">
            <div class="form-group {{ 'create_campaign' == Input::old('action', '') && $errors->has('category_id') ? 'has-error has-feedback' : '' }}">
                <label for="name">@lang('campaigns.form.labels.category')</label>
                <select name="category_id" class="form-control">
                @foreach( $categories as $index => $category )
                    <option value="{{ $category->id }}" {{ $category->id == $campaign->category->id ? 'selected="selected"' : '' }}>{{ $category->title }}</option>
                @endforeach
                </select>
                @if( 'create_campaign' == Input::old('action', '') && $errors->has('category_id' ) )
                <span class="glyphicon glyphicon-remove form-control-feedback"></span>
                <span class="help-block">{{ $errors->first('category_id') }}</span>
                @endif
            </div>
        </div>
        @else
        <input type="hidden" name="category_id" id="category_id" value="0">
        @endif
    </div>
    <hr>
    <h4>@lang('campaigns.form.labels.item')</h4>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group {{ 'create_campaign' == Input::old('action', '') && $errors->has('target_title') ? 'has-error has-feedback' : '' }}">
                <label for="name">@lang('campaigns.form.labels.target_title')</label>
                <input type="text" class="form-control" name="target_title" id="target_title" value="{{ Input::old('target_title', $campaign->target_title) }}" placeholder="@lang('campaigns.form.placeholders.target_title')">
                @if( 'create_campaign' == Input::old('action', '') && $errors->has('target_title' ) )
                <span class="glyphicon glyphicon-remove form-control-feedback"></span>
                <span class="help-block">{{ $errors->first('target_title') }}</span>
                @endif
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group {{ 'create_campaign' == Input::old('action', '') && $errors->has('item_description') ? 'has-error has-feedback' : '' }}">
                <label for="name">@lang('campaigns.form.labels.description')</label>
                <textarea class="form-control summernote" rows="3" name="item_description" id="item_description">{{ Input::old('item_description', $campaign->item_description) }}</textarea>
                @if( 'create_campaign' == Input::old('action', '') && $errors->has('item_description' ) )
                <span class="glyphicon glyphicon-remove form-control-feedback"></span>
                <span class="help-block">{{ $errors->first('item_description') }}</span>
                @endif
            </div>
        </div>
    </div>
    <hr>
    <h4>@lang('campaigns.form.labels.recipient')</h4>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group {{ 'create_campaign' == Input::old('action', '') && $errors->has('target_adress_street') ? 'has-error has-feedback' : '' }}">
                <label for="name">@lang('campaigns.form.labels.target_adress_street')</label>
                <input type="text" class="form-control" name="target_adress_street" id="target_adress_street" value="{{ Input::old('target_adress_street', $campaign->target_adress_street) }}" placeholder="@lang('campaigns.form.placeholders.target_adress_street')">
                @if( 'create_campaign' == Input::old('action', '') && $errors->has('target_adress_street' ) )
                <span class="glyphicon glyphicon-remove form-control-feedback"></span>
                <span class="help-block">{{ $errors->first('target_adress_street') }}</span>
                @endif
                <label for="name">@lang('campaigns.form.labels.target_adress_street2')</label>
                <input type="text" class="form-control" name="target_adress_street2" id="target_adress_street2" value="{{ Input::old('target_adress_street2', $campaign->target_adress_street2) }}" placeholder="@lang('campaigns.form.placeholders.target_adress_street2')">
                @if( 'create_campaign' == Input::old('action', '') && $errors->has('target_adress_street2' ) )
                <span class="glyphicon glyphicon-remove form-control-feedback"></span>
                <span class="help-block">{{ $errors->first('target_adress_street2') }}</span>
                @endif
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group {{ 'create_campaign' == Input::old('action', '') && $errors->has('target_adress_zip') ? 'has-error has-feedback' : '' }}">
                        <label for="name">@lang('campaigns.form.labels.target_adress_zip')</label>
                        <input type="text" class="form-control" name="target_adress_zip" id="target_adress_zip" value="{{ Input::old('target_adress_zip', $campaign->target_adress_zip) }}" placeholder="@lang('campaigns.form.placeholders.target_adress_zip')">
                        @if( 'create_campaign' == Input::old('action', '') && $errors->has('target_adress_zip' ) )
                        <span class="glyphicon glyphicon-remove form-control-feedback"></span>
                        <span class="help-block">{{ $errors->first('target_adress_zip') }}</span>
                        @endif
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group {{ 'create_campaign' == Input::old('action', '') && $errors->has('target_adress_city') ? 'has-error has-feedback' : '' }}">
                        <label for="name">@lang('campaigns.form.labels.target_adress_city')</label>
                        <input type="text" class="form-control" name="target_adress_city" id="target_adress_city" value="{{ Input::old('target_adress_city', $campaign->target_adress_city) }}" placeholder="@lang('campaigns.form.placeholders.target_adress_city')">
                        @if( 'create_campaign' == Input::old('action', '') && $errors->has('target_adress_city' ) )
                        <span class="glyphicon glyphicon-remove form-control-feedback"></span>
                        <span class="help-block">{{ $errors->first('target_adress_city') }}</span>
                        @endif
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group {{ 'create_campaign' == Input::old('action', '') && $errors->has('target_adress_country') ? 'has-error has-feedback' : '' }}">
                        <label for="name">@lang('campaigns.form.labels.target_adress_country')</label>
                        <input type="text" class="form-control" name="target_adress_country" id="target_adress_country" value="{{ Input::old('target_adress_country', $campaign->target_adress_country) }}" placeholder="@lang('campaigns.form.placeholders.target_adress_country')">
                        @if( 'create_campaign' == Input::old('action', '') && $errors->has('target_adress_country' ) )
                        <span class="glyphicon glyphicon-remove form-control-feedback"></span>
                        <span class="help-block">{{ $errors->first('target_adress_country') }}</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group {{ 'create_campaign' == Input::old('action', '') && $errors->has('item_target_description') ? 'has-error has-feedback' : '' }}">
                <label for="name">@lang('campaigns.form.labels.target_description')</label>
                <textarea class="form-control summernote" rows="8" name="target_description" id="target_description">{{ Input::old('target_description', $campaign->target_description) }} </textarea>
                @if( 'create_campaign' == Input::old('action', '') && $errors->has('target_description' ) )
                <span class="glyphicon glyphicon-remove form-control-feedback"></span>
                <span class="help-block">{{ $errors->first('target_description') }}</span>
                @endif
            </div>
        </div>
    </div>
    {{ Form::token() }}
    <button type="submit" name="action" value="create_pledge" class="btn btn-primary"><i class="glyphicon glyphicon-ok"></i> @lang('campaigns.form.edit.submit')</button>
    <button type="reset" class="btn">@lang('app.reset')</button>
</form>

<div id="pledge-modal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
        </div>
    </div>
</div>