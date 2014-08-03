<div class="panel panel-default">
    <div class="panel-heading">
        <h4>@lang('campaigns.sidebar.pledges.title')</h4>
    </div>
    <div class="panel-body">
        <p>@lang('campaigns.sidebar.pledges.description')</p>
    </div>
    <div id="pledges-list">
        @include( 'public.campaigns.pledges.list' )
    </div>
</div>
<div id="pledge-modal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
        </div>
    </div>
</div>