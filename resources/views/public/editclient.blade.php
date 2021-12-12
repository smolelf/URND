<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{-- {{ __('Landing') }} --}}
            View/Edit Client Details
        </h2>
    </x-slot>
    
    <x-jet-authentication-card>
        <x-slot name="logo">
        </x-slot>
        <form method="POST" action="{{ url('updateclient') }}">
            @csrf

            <div class="hidden">
                <x-jet-label for="id" value="{{ __('ID') }}" />
                <x-jet-input id="id" class="block mt-1 w-full" type="text" name="id" value="{{$data->id}}" required />
            </div>
            
            <div>
                <x-jet-label for="cl_name" value="{{ __('Client Name') }}" />
                <x-jet-input id="cl_name" class="block mt-1 w-full" type="text" name="cl_name" value="{{$data->cl_name}}" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="cl_email" value="{{ __('Client E-mail') }}" />
                <x-jet-input id="cl_email" class="block mt-1 w-full" type="email" name="cl_email" value="{{$data->cl_email}}" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="cl_phone_no" value="{{ __('Client Phone Number') }}" />
                <x-jet-input id="cl_phone_no" class="block mt-1 w-full" type="text" name="cl_phone_no" value="{{$data->cl_phone_no}}" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="cl_address" value="{{ __('Client Address') }}" />
                <textarea id="cl_address" name="cl_address" rows="5"
                class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1 w-full"
                style="resize: none" required>{{$data->cl_address}}</textarea>
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-jet-button>
                    {{ __('Edit Client Details') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-app-layout>