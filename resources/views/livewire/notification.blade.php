<div>
   <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="font-semibold text-lg mb-4">{{ __('Your Notifications') }}</h3>
                    @forelse ($notif as $item)
                    <ul class="space-y-4">
                        <li class="p-4 border border-gray-200 rounded-md flex justify-between items-center">
                            <div>
                                <p class="text-gray-800">{{ $item->message }}</p>
                                <span class="text-gray-500 text-sm">{{ $item['created_at']->diffForHumans() }}</span>
                            </div>
                            <div class="ml-4">
                                <button type="submit" wire:click="requestConfirmation({{ $item->from_user_id }}, 'accept')" class="bg-green-500 text-white px-3 py-1 rounded-md hover:bg-green-600">
                                    Accept
                                </button>
                                <button type="submit" wire:click="requestConfirmation({{ $item->from_user_id }}, 'decline')" class="bg-red-500 text-white px-3 py-1 rounded-md hover:bg-red-600 ml-2">
                                    Decline
                                </button>
                            </div>
                        </form>
                        </li>
                    </ul>
                    @empty
                    <p class="text-gray-500 mt-4">No notifications available.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
