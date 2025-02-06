<div>
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

                    <h3 class="text-lg font-semibold mb-4">Users List</h3>
                    <ul class="list-disc pl-5">
                        @if (request('search'))
                            @if ($users->isEmpty())
                                <li class="text-red-500">User  not found</li>
                            @else
                                @foreach ($users as $user)
                                    <li class="py-2 flex justify-between items-center">
                                        <span>{{ $user->name }}</span>
                                        {{-- <form action="{{ route('add.friend', $user->id) }}" method="POST">
                                            @csrf --}}
                                            <button type="submit" class="ml-2 bg-green-500 text-white rounded-lg p-1 hover:bg-green-600">
                                                Add Friend
                                            </button>
                                        {{-- </form> --}}
                                    </li>           
                                @endforeach
                            @endif
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>