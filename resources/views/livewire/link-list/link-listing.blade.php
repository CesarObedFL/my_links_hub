<div>

    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ $list_name->name }}
            </h2>
        </div>
    </header>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">

                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3"> 
                                    <label for="small" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Per Page</label>
                                    <select wire:model.live="per_page" class="block w-full p-2 mb-6 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option value="10">10 per page</option>
                                        <option value="25">25 per page</option>
                                        <option value="50">50 per page</option>
                                    </select>
                                </th>
                                <th colspan="4" scope="colgroup" class="px-6 py-3"> 
                                    <input wire:model.live="search" type="search" placeholder="search by..." class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                </th> <!-- /. div col-md-9 -->
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
                                                <svg class="w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 8">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 5.326 5.7a.909.909 0 0 0 1.348 0L13 1"/>
                                                </svg>                                                 
                                            @else 
                                                <svg class="w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 8">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7 7.674 1.3a.91.91 0 0 0-1.348 0L1 7"/>
                                                </svg>
                                            @endif
                                        @else 
                                            <svg class="w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
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
                                                <svg class="w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 8">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 5.326 5.7a.909.909 0 0 0 1.348 0L13 1"/>
                                                </svg>                                                
                                            @else 
                                                <svg class="w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 8">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7 7.674 1.3a.91.91 0 0 0-1.348 0L1 7"/>
                                                </svg>
                                            @endif
                                        @else 
                                            <svg class="w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
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
                                                <svg class="w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 8">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 5.326 5.7a.909.909 0 0 0 1.348 0L13 1"/>
                                                </svg>                                                
                                            @else 
                                                <svg class="w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 8">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7 7.674 1.3a.91.91 0 0 0-1.348 0L1 7"/>
                                                </svg>
                                            @endif
                                        @else 
                                            <svg class="w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
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
                                <tr wire:key="{{ $link->id }}" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">                                    
                                    <td class="p-4">
                                        @if ( $link->thumbnail )
                                            <img src="{{ asset('thumbnails/'.$link->thumbnail) }}" class="w-16 md:w-32 max-w-full max-h-full" alt="{{ $link->thumbnail }}">
                                        @else 
                                            <img src="{{ asset('images/app/default_image.png') }}" class="w-20 md:w-40 max-w-full max-h-full" alt="default image">
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white" >
                                        {{ $link->platform }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $link->title }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ date_format($link->created_at, "d-m-Y") }}
                                    </td>
                                    <td class="px-6 py-4 mt-5 text-right flex items-center flex-nowrap">
                                        <a href="{{ $link->url }}" target="_blank">
                                            <svg class="flex-grow-0 flex-shrink-0 mr-2 text-gray-400 dark:text-gray-500 w-5 h-5 mx-auto" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 16">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 8h11m0 0L8 4m4 4-4 4m4-11h3a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-3"/>
                                            </svg>
                                        </a> 
                                        &nbsp;
                                        <button wire:click="delete_link('{{ $link->id }}')">
                                            <svg class="flex-grow-0 flex-shrink-0 text-gray-400 dark:text-gray-500 w-5 h-5 mx-auto" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                            </svg>
                                        </button>
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

                    <div wire:loading.table role="status">
                        <span>Loading...</span>
                    </div> <!-- /. div wire:loading.table -->
                    

                </div> <!-- /. class="relative overflow-x-auto shadow-md sm:rounded-lg" -->
            </div> <!-- /. class="bg-white overflow-hidden shadow-xl sm:rounded-lg" -->
        </div> <!-- /. class="max-w-7xl mx-auto sm:px-6 lg:px-8" -->
    </div> <!-- /. class="py-12" -->

</div>
