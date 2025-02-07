<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Friendlist') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- Search User -->
                    <form action="#">
                        <div class="mb-4 flex">
                            <input type="text" name="search" placeholder="Search user..." class="border rounded-lg p-2 w-full" />
                            <button type="submit" class="ml-2 bg-blue-500 text-white rounded-lg p-2 hover:bg-blue-600">
                                Search
                            </button>
                        </div>
                    </form>

                    <a href="{{ route('addfriend') }}">
                    <div class="flex justify-end mb-4">
                        <button class="bg-blue-500 text-white rounded-lg px-4 py-2">Add Friend</button>
                    </div>
                    </a>

                    <!-- Friend List -->
                    <h3 class="text-lg font-semibold mb-4">Your Friends</h3>
                    <ul class="list-disc pl-5">
                        @if (request('search'))
                        @if ($friendlist->isEmpty())
                            <li class="text-red-500">User not found</li>
                        @endif
                    @endif

                        @foreach ($friendlist as $friend)
                        <li class="py-2">{{ $friend->fromUser->name }}</li>
                        @endforeach

                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>