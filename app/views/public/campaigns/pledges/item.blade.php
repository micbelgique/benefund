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
    <td colspan="2"><a href="{{ URL::route('public.pledges.edit', [ 'id' => $pledge->id ]) }}" class="btn btn-info btn-block pledge-edit">Edit</a></td>
</tr>