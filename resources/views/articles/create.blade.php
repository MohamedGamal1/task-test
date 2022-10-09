<style>
    .text-danger{
        color: #ff1c1c;
    }
</style>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if(session()->has('message'))
                        <div class="alert alert-success">
                            {{ session()->get('message') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('store_article') }}">
                    {{ __('Add Article') }}
                    @csrf

                    <!-- Name -->

                        <div class="form-group">
                            <label for="assigned_by_id">Categories</label>
                                <select class="block mt-1 w-full" name="category_id">
                                    @foreach($data['categories'] as  $category)
                                        <option value="{{$category->id}}">
                                            {{$category->name}}
                                        </option>
                                    @endforeach
                                </select>
                            @if ($errors->has('category_id'))
                                <span class="text-danger">{{ $errors->first('category_id') }}</span>
                            @endif

                        </div>
                        <div>
                            <label for="">Article Title</label>

                            <input id="title" class="block mt-1 w-full" type="text" name="name"
                                     required autofocus />
                            @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                        <div>
                            <label for="">Article Description</label>
                            <textarea name="description" class="block mt-1 w-full">

                            </textarea>
                            @if ($errors->has('description'))
                                <span class="text-danger">{{ $errors->first('description') }}</span>
                            @endif

                        </div>
                        <div>
                            <label for="">Article Publish</label>

                            <select class="block mt-1 w-full" name="status">
                                <option value="published">
                                    Publish
                                </option>
                                <option value="unpublished">
                                   UnPublish
                                </option>
                            </select>
                            @if ($errors->has('status'))
                                <span class="text-danger">{{ $errors->first('status') }}</span>
                            @endif
                        </div>

                        <div class="flex items-center justify-end mt-4">

                            <x-primary-button class="ml-4">
                                {{ __('Add Article') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
