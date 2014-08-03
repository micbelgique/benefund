<div class="panel panel-default">
    <div class="panel-heading">
        <h4>@lang('campaigns.sidebar.pledges.title')</h4>
    </div>
    <div class="panel-body">
        <p>@lang('campaigns.sidebar.pledges.description')</p>
    </div>
    <table id="pledges-list" class="table table-bordered">
        <tbody>
            @if( 0 < count( $pledges ) )
            @foreach( $pledges as $pledge )
                @include( 'public.campaigns.pledges.item' )
            @endforeach
            @endif
        </tbody>
        <tfoot>
            @include( 'public.campaigns.pledges.create' )
        </tfoot>
    </table>
</div>
<div id="pledge-modal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
        </div>
    </div>
</div>