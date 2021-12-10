<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{-- {{ __('Landing') }} --}}
            Edit Existing User
        </h2>
    </x-slot>

    <x-jet-authentication-card>
        <x-slot name="logo">
        </x-slot>
        <form method="POST" action="{{ url('updateuser') }}">
            @csrf

            <div class="hidden">
                <x-jet-label for="id" value="{{ __('ID Number') }}" />
                <x-jet-input id="id" class="block mt-1 w-full" type="text" name="id" value="{{$data['id']}}" required />
            </div>

            <div>
                <x-jet-label for="name" value="{{ __('Name') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{$data['name']}}" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('E-mail') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" value="{{$data['email']}}" required  />
            </div>

            <div class="mt-4">
                <x-jet-label for="phone_no" value="{{ __('Phone Number') }}" />
                <x-jet-input id="phone_no" class="block mt-1 w-full" type="text" name="phone_no" value="{{$data['phone_no']}}" />
            </div>

            <div class="mt-4">
                <x-jet-label for="dept" value="{{ __('Department') }}" />
                <x-jet-input id="dept" class="block mt-1 w-full" type="text" name="dept" value="{{$data['dept']}}" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-jet-button>
                    {{ __('Update User Details') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-app-layout>