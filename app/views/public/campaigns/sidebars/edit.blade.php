<div class="panel panel-default">
    <div class="panel-heading">
        <h3>@lang('campaigns.sidebar.pledges.title')</h3>
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
                <td colspan="2"><input type="text" class="pledge_title form-control"></td>
            </tr>
            <tr>
                <th colspan="2">Description</th>
            </tr>
            <tr>
                <td colspan="2"><textarea class="pledge_description form-control"></textarea></td>
            </tr>
            <tr>
                <th>Price Min</th>
                <th>Price Max</th>
            </tr>
            <tr>
                <td><input type="text" class="pledge_price_min form-control"></td>
                <td><input type="text" class="pledge_price_max form-control"></td>
            </tr>
            <tr>
                <td colspan="2"><button class="btn btn-success btn-block"><i class="glyphicon glyphicon-yes"></i> Save new pledge</button></td>
            </tr>
            </form>
        </tfoot>
    </table>
</div>