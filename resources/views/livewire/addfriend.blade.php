<div>
        @if (session()->has('success'))
        <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
            <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden mb-5">
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative w-full" role="alert">
                    <strong class="font-bold">{{ session('success') }}</strong>
                    <button type="button" class="absolute top-0 bottom-0 right-0 px-4 py-3" data-dismiss="alert">
                        <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <title>Close</title>
                            <path d="M14.348 5.652a1 1 0 10-1.414-1.414L10 7.172 7.066 5.066a1 1 0 00-1.414 1.414l2.934 2.934-2.934 2.934a1 1 0 101.414 1.414l2.934-2.934 2.934 2.934a1 1 0 001.414-1.414L12.414 10l2.934-2.934z"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        @endif

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
                                <li class="text-red-500">User not found</li>
                            @else
                                @foreach ($users as $user)
                                    <li class="py-2 flex justify-between items-center">
                                        <span>{{ $user->name }}</span>
                                        <form wire:click="friendRequest({{ $user->id }})">
                                            <button type="submit" wire:model="status" class="ml-2 bg-green-500 text-white rounded-lg p-1 hover:bg-green-600">
                                                Add Friend
                                            </button>
                                        </form>
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

<script>
    document.querySelectorAll('[data-dismiss="alert"]').forEach((button) => {
        button.addEventListener('click', () => {
            button.parentElement.remove();
        });
    });
</script>
