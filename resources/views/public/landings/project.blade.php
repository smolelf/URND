<table border="1">
    <tr>
        <th>Project Name</th>
        <th>Leader</th>
    </tr>
    @foreach ($datap as $data)
    <tr>
        <td>{{$data['proj_name']}}</td>
        <td>{{$data['leader']}}</td>
    </tr>
    @endforeach
</table>