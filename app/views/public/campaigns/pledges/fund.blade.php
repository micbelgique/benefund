<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">@lang('app.close')</span></button>
    <h4 class="modal-title">{{ $pledge->title }}</h4>
</div>
<div class="modal-body">
    <h4 class="page-header">{{ $pledge->price_min }} or more</h4>
    <blockquote>{{ $pledge->description }}</blockquote>

    <div class="row">
        <div class="col-md-12">
            <label for="fund_amount">Amount:</label>
            <input type="text" class="form-control" name="fund_amount" id="fund_amount" value="{{ round( $pledge->price_min / 100, 2) }}">
        </div>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">@lang('app.close')</button>
    <a href="{{ URL::route('public.pledges.buy', [ 'id' => $pledge->id ]) }}" class="btn btn-primary pledge-buy" data-loading-text="@lang('campaigns.pledges.buttons.loading')">@lang('campaigns.pledges.buttons.fund')</button>
</div>