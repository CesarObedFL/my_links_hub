<div>

    <div class="relative p-4 w-full max-w-2xl">

        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
            <h3 class="text-xl font-semibold text-gray-900 uppercase">
                save link
            </h3>
            <button wire:click="close" type="button" class="text-slate-600 bg-transparent duration-300 hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="default-modal">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
        </div>

        <!-- Modal body -->
        <form wire:submit.prevent="save" action="#" method="POST" role="form">
            @csrf
            <div class="p-4 md:p-5 space-y-4">
                <div class="col-span-2">
                    <label for="url" class="block mb-2 text-sm font-medium text-gray-900">Link</label>
                    <input wire:model="url" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Type the link to save...">
                    <div style="color: red;">@error('url') {{ $message }} @enderror</div>
                </div>
            </div>
            <div class="p-4 md:p-5 space-y-4">
                <label for="small" class="block mb-2 text-sm font-medium text-gray-900">List</label>
                <select wire:model="link_list_id" class="block w-full p-2 mb-6 text-sm text-slate-600 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500">
                    <option>Select a list...</option>
                    @foreach ( $link_list as $list )
                        <option  wire:key="{{ $list->id }}" value="{{ $list->id }}">{{ $list->list_name }}</option>
                    @endforeach
                </select>
                <div style="color: red;">@error('link_list_id') {{ $message }} @enderror</div>
            </div>

            <hr>
            <div class="p-4 md:p-5 space-y-4">
                <div class="relative">
                    <input wire:model="tag" list="tag-list" placeholder="Choose at least a tag..." class="block w-full p-4 text-sm text-slate-600 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500"/>
                    <datalist id="tag-list">
                        @foreach ( $tag_list as $t )
                            <option wire:key="{{ $t->id }}" value="{{ $t->id }}">{{ $t->title }}</option>
                        @endforeach
                    </datalist>
                    <button wire:click="add_tag" type="button" class="text-white absolute end-2.5 bottom-2.5 bg-blue-300 duration-300 hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2">Add Tag</button>
                </div>
            </div>
            @if ( count($tags) > 0 )
                <div class="p-3 m-2">
                    <h2 class="mb-2 text-xs font-semibold text-gray-900">Tag List</h2>
                    <ul class="flex flex-wrap items-center justify-center text-gray-900">
                        @foreach ($tags as $t)
                            <li class="me-4 hover:underline md:me-6">{{ $t->title }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Modal footer -->
            <div class="flex items-center p-4 md:p-5 border-t border-slate-300 rounded-b">
                <button type="submit" data-modal-hide="default-modal" class="bg-green-300 text-white text-sm text-center font-medium rounded-lg px-5 py-2.5 duration-300 hover:bg-green-600 focus:ring-4 focus:outline-none focus:ring-green-600">Save</button>
                <button wire:click="close" type="button" data-modal-hide="default-modal" class="bg-red-300 text-white ms-3 text-sm text-center font-medium rounded-lg px-5 py-2.5 duration-300 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-600 focus:z-10">Cancel</button>
            </div>

            <span wire:loading>Saving...</span> 
        </form>

    </div> <!-- /. class="relative p-4 w-full max-w-2xl" -->
    
</div>
