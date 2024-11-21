<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            個別表示
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto px-6">
        {{-- @if (session('message'))
            <div class="text-red-600 font-bold">
                {{ session('message') }}
            </div>
        @endif --}}
        <x-message :message="session('message')" />
        <div class="bg-white w-full rounded-2xl">
            <div class="mt-4 p-4">
                <h1 class="text-lg font-semibold">
                    {{ $post->title }}
                </h1>
                @if(Auth::id() === $post->user_id)
                    <div class="text-right flex">
                        <a href="{{ route('post.edit', $post) }}" class="flex-1">
                            <x-primary-button>
                                編集
                            </x-primary-button>
                        </a>
                        <x-primary-button id="js-delete-button" class="bg-red-700 ml-2 flex-2">
                            削除
                        </x-primary-button>
                    </div>
                    <div id="js-delete-modal" class="hidden top-60 left-1/2 -translate-x-1/2 bg-white rounded-2xl fixed z-10">
                        <div class="p-4">
                            <p class="pb-4">本当に削除してよろしいですか？</p>
                            <div class="text-right flex">
                                <form method="post" action="{{ route('post.destroy', $post) }}" class="flex-1">
                                    @csrf
                                    @method('delete')
                                    <x-primary-button class="bg-red-700 ml-2">
                                        はい
                                    </x-primary-button>
                                </form>
                                <x-primary-button id="js-cancel-button" class="ml-2">
                                    キャンセル
                                </x-primary-button>
                            </div>
                        </div>
                    </div>
                @endif
                <hr class="w-full">
                <p class="mt-4 whitespace-pre-line">
                    {{ $post->body }}
                </p>
                <div class="text-sm font-semibold flex flex-row-reverse">
                    <p> {{ $post->created_at }}</p>
                </div>
            </div>
        </div>
    </div>

    <div id="js-overlay" class="hidden top-0 left-0 w-full h-full bg-black/60 fixed z-9"></div>

    <script src="{{ asset('js/modal.js') }}"></script>
</x-app-layout>
