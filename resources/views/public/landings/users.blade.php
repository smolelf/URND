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
        Users
    </h2>
</x-slot>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Name</th>
    </tr>
    @foreach ($data as $data)
    <tr>
        <td>{{$data['id']}}</td>
        <td>{{$data['name']}}</td>
    </tr>
    @endforeach
</table>
</x-app-layout>