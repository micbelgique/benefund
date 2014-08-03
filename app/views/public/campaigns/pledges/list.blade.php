<table class="table table-bordered">
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