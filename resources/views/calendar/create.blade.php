<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Calendar') }}
        </h2>
    </x-slot>

    <!-- Create Event -->
    <div class="py-12">

        <div class="flex flex-col items-center min-h-screen pt-6 bg-gray-100 sm:pt-0">
            <div class="w-full px-16 py-20 pt-10 overflow-hidden bg-white rounded-lg lg:max-w-4xl">
                <div class="mb-4">
                    <h1 class="text-2xl text-xl leading-tight">
                        Create New Calendar Event
                    </h1>
                </div>
    
                <div class="w-full px-6 py-4 bg-white rounded shadow-md ring-1 ring-gray-900/10">
                    <form method="POST" action="{{ route('events.store') }}" >
                        {{ csrf_field() }}
    
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}" />
                        
                        <!-- Title -->
                        <div>
                            <label class="block text-sm font-bold text-gray-700" for="title">
                                Title
                            </label>
                            <input type="text" name="title" value="{{ old('title') }}" placeholder="Title" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 placeholder:text-right focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" />
                            @error('title')
                                    <p class="inline-block mt-2 ml-1 text-xs text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
    
                        <!-- Body -->
                        <div class="mt-4">
                            <label class="block text-sm font-bold text-gray-700" for="body">
                                Body
                            </label>
                            <textarea name="body" placeholder="Body..." class="block w-full mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 placeholder:text-right focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" rows="4" placeholder="400">{{ old('body') }}</textarea>
                            @error('body')
                                    <p class="inline-block mt-2 ml-1 text-xs text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
    
                        <!-- Due Date -->
                        <div class="mt-4">
                            <label class="block text-sm font-bold text-gray-700" for="password">
                                Due Date
                            </label>
                            <input type="date" value="{{ old('due_at') }}" name="due_at"  min="2022-01-01" max="2030-01-01" placeholder="" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 placeholder:text-right focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" />
                            @error('due_at')
                                    <p class="inline-block mt-2 ml-1 text-xs text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
    
                        <div class="flex items-center justify-start mt-4 gap-x-2">
                            <button type="submit" class="px-6 py-2 text-sm font-semibold rounded-md shadow-md text-sky-100 bg-sky-500 hover:bg-sky-700 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300">
                                Save
                            </button>
                            <a href="{{ route('events.index') }}" type="submit" class="px-6 py-2 text-sm font-semibold text-gray-100 bg-gray-400 rounded-md shadow-md hover:bg-gray-600 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300">
                                Cancel
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

</x-app-layout>