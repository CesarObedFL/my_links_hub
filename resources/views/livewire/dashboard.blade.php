<div>
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto flex flex-cols-2 justify-between items-center py-3 px-4 sm:px-6 lg:px-8">
            <div>
                <h2 class="font-semibold text-sm md:text-xl text-slate-800 leading-tight">
                    {{ __('Dashboard') }}
                </h2>
            </div>
            <div class="flex justify-end">
                <div class="relative w-36 md:w-96">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </div>
                    <input wire:model.live="search" type="search" class="block w-full pl-10 text-sm text-gray-900 bg-white border border-slate-400 rounded-lg focus:ring-blue-500 focus:border-blue-500" placeholder="search by list name...">
                </div>
            </div>
        </div>
    </header>

    <div class="py-12 px-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden sm:rounded-lg">

                @if ( $lists->count() > 0 )
                    <div class="grid gap-4 md:grid-cols-3 md:gap-6">
                        @foreach( $lists as $list )
                        <article class="bg-white h-200 w-130 flex flex-col shadow-lg rounded overflow-hidden">
                            <div class="h-60">
                                <img src="{{ asset('list_images/'.$list->list_image) }}" alt="{{ $list->list_image }}" class="h-full w-full object-cover object-center">
                            </div>
                            <div class="p-5 space-y-3 flex-1">
                                <h3 class="text-sm font-semibold text-slate-400">{{ $list->list_name }}</h3>
                                <h2 class="text-md font-semibold text-slate-800 leading-tight">{{ $list->list_description }}</h2>
                            </div>
                            <div class="flex justify-between p-5">
                                <a href="{{ route('link-list', [ 'id' => $list->id ]) }}" class="has-tooltip">
                                    <span class='tooltip rounded shadow-lg p-1 bg-gray-300 text-blue-800 -mt-[30px]'>View List</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 text-slate-400 duration-300 hover:text-slate-800 hover:translate-x-3">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 9V5.25A2.25 2.25 0 0 1 10.5 3h6a2.25 2.25 0 0 1 2.25 2.25v13.5A2.25 2.25 0 0 1 16.5 21h-6a2.25 2.25 0 0 1-2.25-2.25V15M12 9l3 3m0 0-3 3m3-3H2.25" />
                                    </svg>
                                </a>
                                <button onclick="Livewire.dispatch('openModal', { component: 'link-list.list-delete', arguments: { list_id: {{ $list->id }} }})" class="has-tooltip">
                                    <span class='tooltip rounded shadow-lg p-1 bg-gray-300 text-red-800 -mt-[30px] -ml-[50px]'>Delete List</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 text-slate-400 duration-300 hover:text-red-800 hover:scale-125">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                    </svg>
                                </button>
                            </div>
                        </article>
                        @endforeach
                    </div>
                    <br>
                @else
                    <br>
                    <div id="alert-4" class="flex items-center p-4 mb-4 text-yellow-800 rounded-lg bg-yellow-50" role="alert">
                        <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                        </svg>
                        <span class="sr-only">Info</span>
                        <div class="ms-3 text-sm font-medium">
                            There is no registered list
                        </div>
                        <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-yellow-50 text-yellow-500 rounded-lg focus:ring-2 focus:ring-yellow-400 p-1.5 hover:bg-yellow-200 inline-flex items-center justify-center h-8 w-8" data-dismiss-target="#alert-4" aria-label="Close">
                            <span class="sr-only">Close</span>
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                        </button>
                    </div>
                @endif

            </div>
        </div>
    </div>


</div>
