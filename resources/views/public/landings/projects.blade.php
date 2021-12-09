<style>
    tr th, td{
        padding: 10px;
        background-color: rgba(253, 150, 150, 0.644);
        text-align: center;
    }
</style>
<x-app-layout>
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{-- {{ __('Landing') }} --}}
        Projects
    </h2>
</x-slot>
<div>
<table border="1">
    <tr>
        <th>Project Name</th>
        <th>Leader</th>
    </tr>
    @foreach ($data as $data)
    <tr>
        <td>{{$data['proj_name']}}</td>
        <td>{{$data['leader']}}</td>
    </tr>
    @endforeach
    <tr>
        <td>Dummy ID</td>
        <td>Dummy Val</td>
    </tr>
</table>
</div>
</x-app-layout>