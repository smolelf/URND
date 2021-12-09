<table border="1">
    <tr>
        <th>ID</th>
        <th>Name</th>
    </tr>
    @foreach ($datau as $data)
    <tr>
        <td>{{$data['id']}}</td>
        <td>{{$data['name']}}</td>
    </tr>
    @endforeach
</table>