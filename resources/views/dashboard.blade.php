<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-2xl font-bold mb-4">Friend List</h1>
                    <ul class="space-y-4">
                    @foreach ($users as $user)
                        <li class="flex items-center p-4 border-b border-gray-200 hover:bg-gray-100 transition">
                            <img src="{{ asset('img/user.png') }}" alt="" class="w-12 h-12 rounded-full mr-4">
                            <div class="flex-1">
                                <a class="text-lg font-semibold text-gray-800" href="{{ route('chat', $user->fromUser ->id) }}">{{ $user->fromUser ->name }}</a>
                                <p class="text-gray-600 text-sm">{{ $user->last_message }}</p>
                            </div>
                            <span class="text-gray-500 text-sm">{{ $user->last_message_time }}</span>
                        </li>
                    @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>