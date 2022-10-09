<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>


    <div class="py-6">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <h3>Article Details</h3>
                    <h1 class="font-semibold text-xl text-gray-800 leading-tight">Category Name : {{ $article->category->name }}</h1>
                </div>

            </div>
        </div>
    </div>
    <div class=" max-w-7xl mx-auto sm:px-6 lg:px-8">

        <div class="col-md-12 p-6 bg-white    mb-2">
            <h3 class="font-semibold text-xl text-gray-800 leading-tight"> Title :  {{ $article->name }}</h3>
            <p class="font-semibold text-xl text-gray-800 leading-tight">Details  : <br>{{ $article->description }}</p>

        </div>


            <h1 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Comments') }}</h1>
            @if(!empty($comments) && $comments->count())
                @foreach($comments as $key => $comment)
                    <div class="bg-white">
                        <span class="font-semibold text-xl text-gray-800 leading-tight  p-3">  Visitor Name: {{ $comment->name }}
                        </span>
                        <p class="font-semibold text-xl text-gray-800 p-3 mt-1">   Comment:   {{ $comment->comment }}</p><br>
                    </div>
                <hr>
                @endforeach
            @endif


        <form method="POST" action="{{ route('add_comment') }}">
        {{ __('Add Your Comment On Article') }}
        @csrf
            <input type="hidden" name="article_id" value="{{ $article->id }}">
            <div>

                <input id="title" class="block mt-1 w-full" type="text" name="name"
                       required autofocus placeholder="Your Name" />
                @if ($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
            </div>
            <div>
                <textarea name="comment" class="block  w-full" placeholder="Your Comment" required></textarea>
                @if ($errors->has('description'))
                    <span class="text-danger">{{ $errors->first('comment') }}</span>
                @endif

            </div>

            <div class="flex items-center justify-end mt-4">

                <x-primary-button class="ml-4">
                    {{ __('Add Comment') }}
                </x-primary-button>
            </div>
        </form>

    </div>
</x-app-layout>

