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
                    <div class="mb-4">
                        <input type="text" placeholder="Search user..." class="border rounded-lg p-2 w-full" />
                    </div>

                    <a href="{{ route('addfriend') }}">
                    <div class="flex justify-end mb-4">
                        <button class="bg-blue-500 text-white rounded-lg px-4 py-2">Add Friend</button>
                    </div>
                    </a>

                    <!-- Friend List -->
                    <h3 class="text-lg font-semibold mb-4">Your Friends</h3>
                    <ul class="list-disc pl-5">
                        <li class="py-2">John Doe</li>
                        <li class="py-2">Jane Smith</li>
                        <li class="py-2">Alice Johnson</li>
                        <li class="py-2">Bob Brown</li>
                        <li class="py-2">Charlie Davis</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>