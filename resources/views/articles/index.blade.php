<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js">

</script>
<x-app-layout>
{{--    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>--}}


    <div class="py-6">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="text-center">

                        <x-primary-button class="ml-4">
                            <a href="{{ route('create_article') }}">
                                {{ __('Add Article') }}
                            </a>
                        </x-primary-button>
                    </div>
                    @if(session()->has('message'))
                        <div class="alert alert-success">
                            {{ session()->get('message') }}
                        </div>
                    @endif
                    <h3>All Articles </h3>

                </div>

            </div>
        </div>
    </div>
    <div class="container ">
        <div class="row">
        @if(!empty($articles) && $articles->count())
            @foreach($articles as $key => $value)
                <div class="col-md-12 p-6 bg-white   text-center mb-2">
                    <h1 class="font-semibold text-xl text-gray-800 leading-tight">{{ $value->name }}</h1>
                    <x-primary-button class="ml-4">
                        <a href="{{URL::to('/articles/'.$value->id. '')}}">
                            {{ __('View Article') }}
                        </a>
                    </x-primary-button>
                </div>

            @endforeach
        @else
            <h1>There are no data.</h1>
        @endif
        </div>

    </div>
</x-app-layout>

