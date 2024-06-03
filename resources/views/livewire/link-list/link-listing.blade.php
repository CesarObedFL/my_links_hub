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
                                        <option value="1">10 per page</option>
                                        <option value="2">25 per page</option>
                                        <option value="5">50 per page</option>
                                    </select>
                                </th>
                                <th colspan="3" scope="colgroup" class="px-6 py-3"> 
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
                                <th scope="col" class="px-6 py-3">
                                    <span class="sr-only">Actions</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach( $link_list as $link )
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">                                    
                                    <td class="p-4">
                                        <img src="{{ asset('thumbnails/'.$link->thumbnail) }}" class="w-16 md:w-32 max-w-full max-h-full" alt="">
                                    </td>
                                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white" >
                                        {{ $link->platform }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $link->title }}
                                    </td>
                                    <td class="px-6 py-4 text-right">
                                        <a href="{{ $link->url }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline" target="_blank">GO</a>
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
