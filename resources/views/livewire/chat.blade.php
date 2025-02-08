<div>
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <!-- User Information Section -->
        <div class="p-6 bg-gray-100 border-b border-gray-200">
          <div class="flex items-center">
            <div class="chat-image avatar">
              <div class="w-10 rounded-full">
                <img
                  alt="User  Avatar"
                  src="{{ asset('img/user.png') }}"
                />
              </div>
            </div>
            <div class="ml-4">
              <h2 class="text-lg font-bold text-black">{{ $user->name }}</h2>
              <p class="text-sm text-gray-600">Last seen : {{ $user['last_seen']  }}</p>
            </div>
          </div>
        </div>

        <div wire:poll class="p-6 text-gray-900">
          @foreach($messages as $message)
            <div class="relative message-container">
              <div
                class="chat {{ $message->from_user_id == auth()->user()->id ? 'chat-end' : 'chat-start' }} relative"
                x-data="{ showMenu: false }"
                @contextmenu.prevent="showMenu = true"
                @click.away="showMenu = false"
              >
                <div class="chat-image avatar">
                  <div class="w-10 rounded-full">
                    <img
                      alt="Tailwind CSS chat bubble component"
                      src="{{ asset('img/user.png') }}"
                    />
                  </div>
                </div>
                <div class="chat-header">
                  {{ $message->fromUser ->name }}
                  <time class="text-xs opacity-50">{{ $message['created_at']->diffForHumans() }}</time>
                </div>
                <div class="chat-bubble">{{ $message->message }}</div>
                
                @can('edit-chat', $message)
                  <div 
                    x-show="showMenu" 
                    class="absolute right-0 top-0 bg-white shadow-lg rounded-lg p-2 z-10"
                    style="display: none;"
                  >
                    <button 
                      wire:click="editMessage({{ $message->id }})"
                      class="block w-full px-3 py-1 text-sm text-gray-700 hover:bg-gray-100"
                    >
                      Edit
                    </button>
                    <button type="submit"
                      wire:click="deleteMessage({{ $message->id }})"
                      class="block w-full px-3 py-1 text-sm text-red-500 hover:bg-gray-100">
                      Delete
                    </button>
                  </div>
                @endcan
              </div>
            </div>
          @endforeach
        </div>

        <!-- Textarea and Send Button -->
        <form wire:submit="sendMessage">
          <div class="mt-6 flex items-center gap-2">
            <textarea
              wire:model="message"
              class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 resize-none"
              rows="2"
              placeholder="Type your message..."
            ></textarea>
            <div>@error('message') {{ $message }} @enderror</div>
            <button
              type="submit"
              class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500"
            >
              Send
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>