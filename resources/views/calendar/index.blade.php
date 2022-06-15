<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Calendar') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    @include('messages')

                    <!-- Index Post -->
                    <div class="container max-w-7xl mx-auto mt-8">
                        <div class="mb-4">
                            <h1 class="text-2xl text-xl leading-tight"> Calendar events</h1>
                            <div class="flex justify-end">
                                <a href="{{ route('events.create') }}" class="px-4 py-2 rounded-md bg-sky-500 text-sky-100 hover:bg-sky-600">Add Event</a href="">
                            </div>
                        </div>
                        <div class="flex flex-col">
                            <div class="overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
                                <div class="inline-block min-w-full overflow-hidden align-middle border-b border-gray-200 shadow sm:rounded-lg">
                                    <table class="min-w-full">
                                        <thead>
                                            <tr>
                                                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                                    ID
                                                </th>
                                                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                                    <a href="{{ Request::fullUrlWithQuery(['sort' => 'title']) }}">
                                                        Title
                                                        <svg class="inline h-4 w-4 @if(request()->get('sort') == 'title') text-gray-900 @else text-gray-300 @endif"  viewBox="0 0 20 20" fill="currentColor">  <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/></svg>
                                                    </a>
                                                </th>
                                                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                                    Body
                                                </th>
                                                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                                    <a href="{{ Request::fullUrlWithQuery(['sort' => 'due_at']) }}">
                                                        Due Date
                                                        <svg class="inline h-4 w-4 @if(request()->get('sort') == 'due_at') text-gray-900 @else text-gray-300 @endif"  viewBox="0 0 20 20" fill="currentColor">  <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/></svg>
                                                    </a>
                                                </th>
                                                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                                    <a href="{{ Request::fullUrlWithQuery(['sort' => 'created_at']) }}">
                                                        Created Date
                                                        <svg class="inline h-4 w-4 @if(request()->get('sort') == 'created_at') text-gray-900 @else text-gray-300 @endif"  viewBox="0 0 20 20" fill="currentColor">  <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/></svg>
                                                    </a>
                                                </th>
                                                <th class="px-6 py-3 text-sm text-left text-gray-500 border-b border-gray-200 bg-gray-50" colspan="3">
                                                    Action
                                                </th>
                                            </tr>
                                        </thead>

                                        <tbody class="bg-white">
                                            @if($events->count() > 0)
                                                @foreach($events as $event)
                                                    <tr>
                                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                                            <div class="flex items-center">
                                                                {{ $event->id }}
                                                            </div>

                                                        </td>

                                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                                            <div class="text-sm leading-5 text-gray-900">
                                                                {{ $event->title }}
                                                            </div>
                                                        </td>

                                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                                            {{Str::limit($event->body, 100)}}
                                                        </td>

                                                        <td class="px-6 py-4 text-sm leading-5 text-gray-500 whitespace-no-wrap border-b border-gray-200">
                                                            <span>{{ $event->due_at }}</span>
                                                        </td>

                                                        <td class="px-6 py-4 text-sm leading-5 text-gray-500 whitespace-no-wrap border-b border-gray-200">
                                                            <span>{{ $event->created_at }}</span>
                                                        </td>

                                                        <td class="text-sm font-medium leading-5 text-center whitespace-no-wrap border-b border-gray-200 ">
                                                            <a href="{{ route('events.edit', $event->id) }}" class="text-indigo-600 hover:text-indigo-900">
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                                </svg>
                                                            </a>

                                                            <td class="text-sm font-medium leading-5 text-center whitespace-no-wrap border-b border-gray-200 ">
                                                            <a href="{{ route('events.show', $event->id) }}" class="text-gray-600 hover:text-gray-900">
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                                </svg>
                                                            </a>
                                                        </td>

                                                        </td>
                                                        <td class="text-sm font-medium leading-5 whitespace-no-wrap border-b border-gray-200 ">

                                                            <form action="{{ route('events.destroy', $event->id) }}" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-red-600 hover:text-red-800" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                                    </svg>
                                                                </button>
                                                            </form>

                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @else
                                            <tr>
                                                <td class="px-4 py-12 whitespace-no-wrap border-b border-gray-200" colspan="7">
                                                    <p class="text-center text-3xl text-gray-500 leading-tight">There are currently no events to show!</p>
                                                </td>
                                            </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="p-4">
                        {!! $events->appends(Request::query())->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>