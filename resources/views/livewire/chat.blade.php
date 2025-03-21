<div>

    <div class="max-w-7xl mx-auto mt-3">
        <button wire:click="refresh" class="px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal flex gap-2 items-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-refresh-cw"><path d="M3 12a9 9 0 0 1 9-9 9.75 9.75 0 0 1 6.74 2.74L21 8"/><path d="M21 3v5h-5"/><path d="M21 12a9 9 0 0 1-9 9 9.75 9.75 0 0 1-6.74-2.74L3 16"/><path d="M8 16H3v5"/></svg> Yenile
        </button>
    </div>
    
    <div x-data="{ messages: [], message: '', scrollToBottom() { this.$nextTick(() => { this.$refs.messageList.scrollTop = this.$refs.messageList.scrollHeight }) } }">
        <div x-ref="messageList" x-init="scrollToBottom" class="max-w-7xl mx-auto bg-stone-200/50 rounded-lg h-[500px] border border-gray-300 shadow-lg mt-3 p-2 overflow-auto">
            
            <div class="overflow-auto">
            @foreach ($messages as $message)
                <div class="m-3 p-3 bg-stone-100 rounded-lg shadow-lg border border-gray-300 hover:bg-stone-200 transition">
                    <div class="text-sm font-bold flex gap-1 items-center @if ($message->user->id === Auth::id()) flex-row-reverse @else text-left @endif ">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-user-round"><circle cx="12" cy="8" r="5"/><path d="M20 21a8 8 0 0 0-16 0"/></svg>
                        {{ $message->user->name }}
                    </div>

                    <div class="mt-1 @if ($message->user->id === Auth::id()) text-right @endif">
                        <div class="text-sm text-gray-900">{{ $message->message }}</div>
                    </div>

                    <div class="mt-1 @if ($message->user->id === Auth::id()) text-right @endif">
                        <div class="text-xs text-gray-500">{{ $message->created_at->format('d M Y H:i') }}</div>
                    </div>
                </div>
            @endforeach
            </div>
            
        </div>

        <div class="max-w-7xl mx-auto flex mt-3 gap-3" >
            <textarea wire:model="content" x-model="message"  class="w-5/6 bg-stone-100 rounded-lg h-20 border border-gray-300 shadow-lg p-3 text-sm hover:bg-stone-200 transition" placeholder="Mesajınızı yazın.. (Minimum 10 karakter yazmanız gerekmektedir.)"></textarea>

            <button wire:click="sendMessage" :disabled="message.length < 10" :class="{ 'opacity-50 cursor-not-allowed': message.length < 10 }" class="w-1/6 bg-stone-100 rounded-lg h-20 border border-gray-300 shadow-lg p-3 font-bold flex items-center justify-center gap-1 hover:bg-stone-200 transition">
                Gönder
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-send-horizontal"><path d="M3.714 3.048a.498.498 0 0 0-.683.627l2.843 7.627a2 2 0 0 1 0 1.396l-2.842 7.627a.498.498 0 0 0 .682.627l18-8.5a.5.5 0 0 0 0-.904z"/><path d="M6 12h16"/></svg>
            </button>
        </div>

        @if (session()->has('success'))
            <div class="max-w-7xl mx-auto bg-green-400 rounded-lg border border-gray-300 shadow-lg p-3 text-sm mt-3 ">
                <div class="text-white">{{ session('success') }}</div>
            </div>
        @endif
        @if (session()->has('error'))
            <div class="max-w-7xl mx-auto bg-red-400 rounded-lg border border-gray-300 shadow-lg p-3 text-sm mt-3 ">
                <div class="text-white">{{ session('error') }}</div>
            </div>
        @endif

    </div>

</div>
