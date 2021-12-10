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
        Users
    </div>
    {{-- <a href="{{url('/adduser')}}" class="text-gray-500 hover:text-gray-900 text-right text-l sm:text-right sm:ml-0">
        New Users
    </a> --}}
</x-slot>
<div class="relative flex items-top justify-center bg-gray-100 dark:bg-gray-900 sm:items-center py-10">
    <div class="max-w-9xl mx-auto sm:px-6 lg:px-10">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-md sm:rounded-lg">
            <table>
                <tr>
                    <th>Name</th>
                    <th>Phone Number</th>
                    <th>Department</th>
                    <th>Projects Involved</th>
                    <th>Action</th>
                </tr>
                @foreach ($data as $data)
                <tr>
                    <td>{{$data['name']}}</td>
                    <td>{{$data['phone_no']}}</td>
                    <td>{{$data['dept']}}</td>
                    <td>None</td>
                    <td><a href="/edituser/{{$data['id']}}" class="text-blue-300 hover:text-blue-600">Edit</a></td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
</x-app-layout>