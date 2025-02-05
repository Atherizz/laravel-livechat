<div>
  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
              <div wire:poll class="p-6 text-gray-900">
                  Chat
                  @foreach ($messages as $message)
                  <div class="chat {{ $message->from_user_id == auth()->User()->id ? 'chat-end' : 'chat-start' }}">
                      <div class="chat-image avatar">
                        <div class="w-10 rounded-full">
                          <img
                            alt="Tailwind CSS chat bubble component"
                            src="https://img.daisyui.com/images/stock/photo-1534528741775-53994a69daeb.webp" />
                        </div>
                      </div>
                      <div class="chat-header">
                        {{ $message->fromUser->name }}
                        <time class="text-xs opacity-50">12:45</time>
                      </div>
                      <div class="chat-bubble">{{ $message->message }}</div>
                    </div>
                    {{-- <div class="chat chat-end">
                    </div> --}}
                    @endforeach



                    <!-- Textarea dan Tombol Send -->
                    <form wire:submit="sendMessage"> 
                    <div class="mt-6 flex items-center gap-2">
                      <textarea wire:model="message"
                        class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 resize-none"
                        rows="2"
                        placeholder="Type your message..."
                      ></textarea>
                      <div>@error('message') {{ $message }} @enderror</div>
                      <button type="submit"
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
</div>