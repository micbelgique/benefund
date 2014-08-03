<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">@lang('app.close')</span></button>
    <h4 class="modal-title">Pledge Edition</h4>
</div>
<div class="modal-body">
    <div class="form-group">
        <label for="panel_title">Title</label>
        <input type="text" class="form-control" id="edit_pledge_title" value="{{ $pledge->title }}">
    </div>
    <div class="form-group">
        <label for="panel_description">Description</label>
        <textarea class="form-control" id="edit_pledge_description">{{ $pledge->description }}</textarea>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="panel_price_min">Min Price</label>
                <input type="text" class="form-control" id="edit_pledge_price_min" value="{{ $pledge->price_min }}">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="panel_price_max">Max Price</label>
                <input type="text" class="form-control" id="edit_pledge_price_max" value="{{ $pledge->price_max }}">
            </div>
        </div>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">@lang('app.close')</button>
    <a href="{{ URL::route('public.pledges.update', [ 'id' => $pledge->id ]) }}" class="btn btn-primary pledge-update" data-loading-text="@lang('campaigns.pledges.buttons.loading')"><i class="glyphicon glyphicon-ok"></i> Update this pledge</button>
</div>