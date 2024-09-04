<div>

    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-3 px-4 sm:px-6 lg:px-8">
            <h2 class="font-semibold text-sm md:text-xl text-slate-800 leading-tight"">
                {{ $list_name->list_name }}
            </h2>
        </div>
    </header>

    <div class="py-12 px-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">

                    <!-- md, lg xl screen size table -->
                    <table class="w-full hidden sm:block text-sm text-left table-auto rtl:text-right text-gray-500">
                        <thead class="text-xs text-gray-700 uppercase bg-sky-200">
                            <tr>
                                <th colspan="1" scope="colgroup" class="px-2 py-3"> 
                                    <select wire:model.live="per_page"  class="block w-full p-2 mt-6 mb-6 text-sm text-slate-900 bg-white rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500">
                                        <option value="3">10 per page</option>
                                        <option value="6">25 per page</option>
                                        <option value="10">50 per page</option>
                                    </select>
                                </th>
                                <th colspan="4" scope="colgroup" class="px-6 py-3"> 
                                    <input wire:model.live="search" type="search" placeholder="search by..." class="block w-full p-2.5 text-sm text-slate-900 bg-white rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500">
                                </th>
                            </tr>
                            <tr>
                                <th scope="col" class="px-6 py-3"> 
                                    Thumbnail
                                </th>
                                <th scope="col" class="px-6 py-3" role="button" wire:click="order('platform')">
                                    <div class="flex items-center">
                                        Platform &nbsp;
                                        @if ( $order_by == 'platform' )
                                            @if ( $sort_direction == 'asc' )  
                                                <svg class="w-4 h-4 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 8">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 5.326 5.7a.909.909 0 0 0 1.348 0L13 1"/>
                                                </svg>                                                 
                                            @else 
                                                <svg class="w-4 h-4 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 8">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7 7.674 1.3a.91.91 0 0 0-1.348 0L1 7"/>
                                                </svg>
                                            @endif
                                        @else 
                                            <svg class="w-4 h-4 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z"/>
                                            </svg>                                         
                                        @endif
                                    </div>
                                </th>
                                <th scope="col" class="px-6 py-3" role="button" wire:click="order('title')">
                                    <div class="flex items-center">
                                        title &nbsp;
                                        @if ( $order_by == 'title' )
                                            @if ( $sort_direction == 'asc' )  
                                                <svg class="w-4 h-4 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 8">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 5.326 5.7a.909.909 0 0 0 1.348 0L13 1"/>
                                                </svg>                                                
                                            @else 
                                                <svg class="w-4 h-4 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 8">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7 7.674 1.3a.91.91 0 0 0-1.348 0L1 7"/>
                                                </svg>
                                            @endif
                                        @else 
                                            <svg class="w-4 h-4 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z"/>
                                            </svg>                                         
                                        @endif

                                    </div>
                                </th>
                                <th scope="col" class="px-6 py-3" role="button" wire:click="order('created_at')">
                                    <div class="flex items-center">
                                        created at &nbsp;
                                        @if ( $order_by == 'created_at' )
                                            @if ( $sort_direction == 'asc' )  
                                                <svg class="w-4 h-4 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 8">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 5.326 5.7a.909.909 0 0 0 1.348 0L13 1"/>
                                                </svg>                                                
                                            @else 
                                                <svg class="w-4 h-4 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 8">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7 7.674 1.3a.91.91 0 0 0-1.348 0L1 7"/>
                                                </svg>
                                            @endif
                                        @else 
                                            <svg class="w-4 h-4 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z"/>
                                            </svg>                                         
                                        @endif

                                    </div>
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    <span class="sr-only">Actions</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach( $link_list as $link )
                                <tr wire:key="{{ $link->id }}" class="bg-white border-b">                                    
                                    <td class="p-4">
                                        @if ( $link->thumbnail )
                                            <img src="{{ asset('thumbnails/'.$link->thumbnail) }}" class="w-16 md:w-32 max-w-full max-h-full" alt="{{ $link->thumbnail }}">
                                        @else 
                                            <img src="{{ asset('images/app/default_image.png') }}" class="w-16 md:w-32 max-w-full max-h-full" alt="default image">
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 text-xs lg:text-base text-gray-900 whitespace-nowrap" >
                                        {{ $link->platform }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="w-full p-2 text-left">
                                            <h5 class="mb-1 text-xs font-bold text-gray-900 lg:text-base">{{ $link->title }}</h5>
                                            <p class="mb-2 text-xs text-slate-500 lg:text-base"> @foreach ($link->tags as $tag ) {{ '#'.$tag->title.' ' }} @endforeach </p>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-xs lg:text-base">
                                        {{ date_format($link->created_at, "d-m-Y") }}
                                    </td>
                                    <td class="px-6 py-4 text-right flex items-center justify-center space-x-2 min-h-12">
                                        <div class="flex p-5 md:pt-8 lg:pt-12">
                                            <div class="flex flex-col justify-center space-y-4">
                                                <a href="{{ $link->url }}" target="_blank">
                                                    <svg class="flex-grow-0 flex-shrink-0 text-slate-400 w-3 h-3 md:w-5 md:h-5 mx-auto duration-300 hover:text-blue-800 hover:translate-x-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 16">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 8h11m0 0L8 4m4 4-4 4m4-11h3a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-3"/>
                                                    </svg>
                                                </a> 
                                                <button wire:click="delete_link('{{ $link->id }}')">
                                                    <svg class="flex-grow-0 flex-shrink-0 text-slate-400 w-3 h-3 md:w-5 md:h-5 mx-auto duration-300 hover:text-red-800 hover:scale-125" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="3" scope="colgroup" class="px-6 py-3">
                                    @if ( $link_list->count() )
                                        {{ $link_list->links() }}
                                    @else
                                        <p>There isn't results searching "{{ $search }}" in the page {{ $page }} showing {{ $per_page }} per page...</p>
                                    @endif
                                </td>
                            </tr>   
                        </tfoot>
                    </table>

                    <!-- mobile table responsive -->
                    <div class="block sm:hidden">
                        <div class="grid grid-cols-3 gap-4 items-center">
                            <div class="px-2 py-3 col-span-1"> 
                                <select wire:model.live="per_page"  class="block w-full p-2 mt-6 mb-6 text-sm text-slate-900 bg-white rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500">
                                    <option value="3">10 per page</option>
                                    <option value="6">25 per page</option>
                                    <option value="10">50 per page</option>
                                </select>
                            </div>
                            <div class="px-2 py-3 col-span-2"> 
                                <input wire:model.live="search" type="search" placeholder="search by..." class="block w-full p-2.5 text-sm text-slate-900 bg-white rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500">
                            </div>
                        </div>
                        <div class="grid grid-cols-1 gap-3">
                            @foreach( $link_list as $link )
                                <article class="bg-white h-100 w-200 grid grid-cols-2 shadow-lg rounded overflow-hidden">
                                    <div class="h-25 w-25">
                                        @if ( $link->thumbnail )
                                            <img src="{{ asset('thumbnails/'.$link->thumbnail) }}" class="h-full w-full object-cover object-center" alt="{{ $link->thumbnail }}">
                                        @else 
                                            <img src="{{ asset('images/app/default_image.png') }}" class="h-full w-full object-cover object-center" alt="default image">
                                        @endif
                                    </div>
                                    <div>
                                        <div class="p-5 space-y-3 flex-1">
                                            <h3 class="text-sm font-semibold text-slate-400">{{ $link->platform }}</h3>
                                            <div class="w-full p-2 text-left">
                                                <h5 class="mb-1 text-xs font-bold text-gray-900 lg:text-base">{{ $link->title }}</h5>
                                                <p class="mb-2 text-xs text-slate-500 lg:text-base"> @foreach ($link->tags as $tag ) {{ '#'.$tag->title.' ' }} @endforeach </p>
                                            </div>
                                            <span>{{ date_format($link->created_at, "d-m-Y") }}</span>
                                        </div>
                                        <div class="flex justify-between p-5">
                                            <a href="{{ $link->url }}" target="_blank">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 text-slate-400 duration-300 hover:text-blue-800 hover:translate-x-3">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 9V5.25A2.25 2.25 0 0 1 10.5 3h6a2.25 2.25 0 0 1 2.25 2.25v13.5A2.25 2.25 0 0 1 16.5 21h-6a2.25 2.25 0 0 1-2.25-2.25V15M12 9l3 3m0 0-3 3m3-3H2.25" />
                                                </svg>
                                            </a>
                                            <button wire:click="delete_link('{{ $link->id }}')">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 text-slate-400 duration-300 hover:text-red-800 hover:scale-125">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </article>
                            @endforeach
                            <div class="p-3 m-2">
                                @if ( $link_list->count() )
                                    {{ $link_list->links() }}
                                @else
                                    <p>There isn't results searching "{{ $search }}" in the page {{ $page }} showing {{ $per_page }} per page...</p>
                                @endif
                            </div>
                        </div>
                    </div>
                    <!-- /. mobile table responsive -->

                    <div wire:loading.table role="status" class="ml-3 mb-3">
                        <span>Loading...</span>
                    </div> <!-- /. div wire:loading.table -->
                    <!-- /. md, lg xl screen size table -->

                </div> <!-- /. class="relative overflow-x-auto shadow-md sm:rounded-lg" -->
            </div> <!-- /. class="bg-white overflow-hidden shadow-xl sm:rounded-lg" -->
        </div> <!-- /. class="max-w-7xl mx-auto sm:px-6 lg:px-8" -->
    </div> <!-- /. class="py-12" -->

</div>
