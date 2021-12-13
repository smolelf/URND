<style>
    tr th, tr td{
        padding: 1rem 1rem;
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
        Users
    </div>
    @if (Auth::user()->usertype == 1)
    <a href="{{url('/adduser')}}" class="text-gray-500 hover:text-gray-900 text-right text-l sm:text-right sm:ml-0">
        New User
    </a>
    @endif
</x-slot>
<div class="relative flex items-top justify-center bg-gray-100 dark:bg-gray-900 sm:items-center py-10">
    <div class="max-w-9xl mx-auto sm:px-6 lg:px-10">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-md sm:rounded-lg">
            <table>
                <tr>
                    <th>Name</th>
                    <th>Phone Number</th>
                    <th>Department</th>
                    <th>Project(s) Lead</th>
                    <th @if (Auth::user()->usertype == 1) colspan="2" @endif>Action</th>
                </tr>
                @foreach ($data as $data)
                <div class="hidden">
                    {{$check = DB::table('projects')->where('leader', '=', $data->id)->get();}}
                    {{$count = $check->count();}}
                </div>
                <tr>
                    <td>{{$data['name']}}</td>
                    <td>{{$data['phone_no']}}</td>
                    <td>{{$data['dept']}}</td>
                    <td>
                    @if ($count != '[]')
                        @if ($count > 1)
                            {{$count}} Projects
                        @else
                            {{$count}} Project
                        @endif
                    @else
                        N/A
                    @endif
                    </td>
                    @if ($data['id'] == Auth::user()->id OR Auth::user()->usertype == 1)
                        <td><a href="/edituser/{{$data['id']}}">Edit</a></td>
                    @else
                    <td><h1 class="text-gray-400">Edit</h1></td>
                    @endif
                    @if (Auth::user()->usertype == 1)
                        @if ($data['usertype'] == 1 OR $count != '[]')
                            <td><h1 class="text-gray-400">Delete</h1></td>
                        @else
                            <td><a href="/deluser/{{$data['id']}}">Delete</a></td>
                        @endif
                    @endif
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
</x-app-layout>
            {{-- // ->leftJoin('users','projects.leader','=','users.id')
            // ->leftJoin('proj_statuses','projects.proj_status','=','proj_statuses.id')
            // ->leftJoin('proj_stages','projects.proj_stage','=','proj_stages.id')
            // ->where('projects.leader', '=', $user['id'])
            // ->select('projects.*','users.name','proj_statuses.stat_desc AS stat','proj_stages.stage_desc AS stage')
            ->get();}} --}}