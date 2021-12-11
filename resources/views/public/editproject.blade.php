<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{-- {{ __('Landing') }} --}}
            View/Edit Project Details
        </h2>
    </x-slot>
    {{$data->client}}
    <x-jet-authentication-card>
        <x-slot name="logo">
        </x-slot>
        <form method="POST" action="{{ url('updateproj') }}">
            @csrf
            <div class="hidden">
                <x-jet-label for="id" value="{{ __('ID') }}" />
                <x-jet-input id="id" class="block mt-1 w-full" type="text" name="id" value="{{$data->id}}" required />
            </div>

            <div>
                <x-jet-label for="proj_name" value="{{ __('Project Name') }}" />
                <x-jet-input id="proj_name" class="block mt-1 w-full" type="text" name="proj_name" value="{{$data->proj_name}}" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="leader1" value="{{ __('Project Leader') }}" />
                <x-jet-input id="leader1" class="block mt-1 w-full" type="text" name="leader1" value="{{$data->name}}" readonly disabled />
            </div>

            <div class="hidden">
                <x-jet-label for="leader" value="{{ __('Project Leader') }}" />
                <x-jet-input id="leader" class="block mt-1 w-full" type="text" name="leader" value="{{$data->leader}}"  />
            </div>

            <div class="mt-4">
                <x-jet-label for="proj_members" value="{{ __('Project Members') }}" />
                <x-jet-input id="proj_members" class="block mt-1 w-full" type="text" name="proj_members" value="{{$data->proj_members}}" />
            </div>

            <div class="mt-4">
                <x-jet-label for="start_date" value="{{ __('Start Date') }}" />
                <x-jet-input id="start_date" class="block mt-1 w-full" type="date" name="start_date" value="{{$data->start_date}}" />
            </div>

            <div class="mt-4">
                <x-jet-label for="end_date" value="{{ __('End Date') }}" />
                <x-jet-input id="end_date" class="block mt-1 w-full" type="date" name="end_date" value="{{$data->end_date}}" />
            </div>

            <div class="mt-4">
                <x-jet-label for="duration" value="{{ __('Duration (Months)') }}" />
                <x-jet-input id="duration" class="block mt-1 w-full" type="text" name="duration" value="{{$data->duration}}" />
            </div>

            <div class="mt-4">
                <x-jet-label for="cost" value="{{ __('Cost (RM)') }}" />
                <x-jet-input id="cost" class="block mt-1 w-full" type="text" name="cost" value="{{$data->cost}}" />
            </div>

            {{-- <div class="mt-4">
                <x-jet-label for="client" value="{{ __('Client') }}" />
                <x-jet-input id="client" class="block mt-1 w-full" type="text" name="client" value="{{$data->client}}" />
            </div> --}}

            <div class="mt-4">
                <x-jet-label for="client" value="{{ __('Client') }}" />
                <select id="client" 
                class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1 w-full" 
                name="client" required >
                    @foreach ($client as $client)
                        <option value="{{$client['id']}}" @if ($client['id'] == $data->client)
                            {{{'selected'}}}
                        @endif>{{$client['cl_name']}}</option>
                    @endforeach
                </select>
            </div>

            <div class="mt-4">
                <x-jet-label for="proj_stage" value="{{ __('Project Stage') }}" />
                <select id="proj_stage" 
                class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1 w-full" 
                name="proj_stage" required >
                    @foreach ($stage as $stage)
                        <option value="{{$stage['id']}}" @if ($stage['id'] == $data->proj_stage)
                            {{{'selected'}}}
                        @endif>{{$stage['stage_desc']}}</option>
                    @endforeach
                </select>
            </div>

            <div class="mt-4">
                <x-jet-label for="proj_status" value="{{ __('Project Status') }}" />
                <select id="proj_status" 
                class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1 w-full" 
                name="proj_status" required >
                    @foreach ($stat as $stat)
                    <option value="{{$stat['id']}}" @if ($stat['id'] == $data->proj_status)
                        {{{'selected'}}}
                    @endif>{{$stat['stat_desc']}}</option>
                    @endforeach
                </select>
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-jet-button>
                    {{ __('Update User Details') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
    <div class="py-12"></div>
</x-app-layout>