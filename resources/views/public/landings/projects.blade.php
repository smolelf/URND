<style>
    tr th, tr td{
        padding: 1rem 1.5rem;
        /*background-color: rgba(253, 150, 150, 0.644);*/
        text-align: center;
        border: 1px solid rgb(218, 218, 218);
        border-radius: 0.5rem;
    }
</style>
<x-app-layout>
<x-slot name="header">
    <div class="text-left sm:text-left font-semibold text-xl text-gray-800">
        {{-- {{ __('Landing') }} --}}
        Projects
    </div>
    @if (Auth::user()->usertype == 1)
    <a href="{{url('/addproject')}}" class="text-gray-500 hover:text-gray-900 text-right text-l sm:text-right sm:ml-0">
        New Project
    </a>
    @endif
</x-slot>
<div class="relative flex items-top justify-center bg-gray-100 dark:bg-gray-900 sm:items-center py-10">
    <div class="max-w-9xl mx-auto sm:px-6 lg:px-10">
            @if (Auth::user()->usertype == 1)
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-md sm:rounded-lg">
                <table border="1">
                    <tr>
                        <th>Project Name</th>
                        <th>Leader</th>
                        <th>Stage</th>
                        <th>Status</th>
                        <th colspan="2">Operations</th>
                    </tr>
                    @foreach ($data as $data)
                    <tr>
                        <td>{{$data->proj_name}}</td>
                        <td>{{$data->name}}</td>
                        <td>{{$data->stage}}</td>
                        <td>{{$data->stat}}</td>
                        @if ($data->proj_stage == '6' AND $data->proj_status == '5')
                            <td><h1 class=" text-gray-400">Closed</h1></td>
                        @else
                            <td><a href="/editproj/{{$data->id}}" class="text-blue-300 hover:text-blue-600">View Detail</a></td>
                        @endif
                        @if ($data->proj_stage == '6' AND $data->proj_status == '5')
                            <td><h1 class=" text-gray-400">Closed</h1></td>
                        @elseif($data->proj_mem_num != null OR $data->proj_mem_num != "0")
                            <td><a href="/editmember/{{$data->id}}" class="text-blue-300 hover:text-blue-600">Manage Member</a></td>
                        @else
                            <td><h1 class=" text-gray-400">No Member</h1></td>
                        @endif
                    </tr>
                    @endforeach
                </table>
            @elseif($check != '[]')
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-md sm:rounded-lg">
                <table border="1">
                    <tr>
                        <th>Project Name</th>
                        <th>Leader</th>
                        <th>Stage</th>
                        <th>Status</th>
                        <th colspan="2">Operations</th>
                    </tr>
                    @foreach ($check as $check)
                    <tr>
                        <td>{{$check->proj_name}}</td>
                        <td>{{$check->name}}</td>
                        <td>{{$check->stage}}</td>
                        <td>{{$check->stat}}</td>
                        @if ($check->proj_stage == '6' AND $check->proj_status == '5')
                            <td><h1 class=" text-gray-400">Closed</h1></td>
                        @else
                            <td><a href="/editproj/{{$check->id}}" class="text-blue-300 hover:text-blue-600">View Detail</a></td>
                        @endif
                        @if ($check->proj_stage == '6' AND $check->proj_status == '5')
                            <td><h1 class=" text-gray-400">Closed</h1></td>
                        @elseif($check->proj_mem_num != null)
                            <td><a href="/editmember/{{$check->id}}" class="text-blue-300 hover:text-blue-600">Manage Member</a></td>
                        @else
                            <td><h1 class=" text-gray-400">No Member</h1></td>
                        @endif
                    </tr>
                    @endforeach
                </table>
            @else
            <div class="mt-8 pt-8">
                <h1 class="text-4xl font-semibold"> No Project Involved </h1>
            @endif
        </div>
    </div>
</div>
</x-app-layout>