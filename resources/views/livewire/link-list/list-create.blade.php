<div>

    <div class="relative p-4 w-full max-w-2xl">
        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
            <h3 class="text-xl font-semibold text-slate-800 uppercase">
                create list
            </h3>
            <button wire:click="close" type="button" class="text-slate-600 bg-transparent duration-300 hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="default-modal">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
        </div>
        <!-- Modal body -->
        <form wire:submit.prevent="store" action="#" method="POST" role="form">
            @csrf

            <div class="p-4 md:p-5 space-y-4">
                <div class="col-span-2">
                    <label for="url" class="block mb-2 text-sm font-medium text-gray-900">List Name</label>
                    <input wire:model="list_name" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Type the name of the list to create...">
                    <div style="color: red;">@error('list_name') {{ $message }} @enderror</div>
                </div>
            </div>
            <div class="p-4 md:p-5 space-y-4">
                <div class="col-span-2">
                    <label for="description" class="block mb-2 text-sm font-medium text-gray-900">Description</label>
                    <textarea wire:model="list_description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Write the description here..."></textarea>
                    <div style="color: red;">@error('list_description') {{ $message }} @enderror</div>
                </div>
            </div>
            <div class="p-4 md:p-5 space-y-4">
                <div class="col-span-2">
                    <label for="list_image" class="block mb-2 text-sm font-medium text-gray-900">Description Image</label>
                    <input wire:model="list_image" type="file" class="block w-full text-sm text-slate-600 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none duration-300 appearance-none
                                                                        file:mr-4 file:py-2 file:px-4 file:border-lg file:border-0 file:text-sm file:font-semibold file:bg-blue-300 file:text-white hover:file:bg-blue-600">
                    <div wire:loading wire:target="list_image">Loading image...</div>
                    @error('list_image') <span class="error" style="color: red;">{{ $message }}</span> @enderror
                </div>
            </div>

            <!-- Modal footer -->
            <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b">
                <button type="submit" data-modal-hide="default-modal" class="bg-green-300 text-white text-sm text-center font-medium rounded-lg px-5 py-2.5 duration-300 hover:bg-green-600 focus:ring-4 focus:outline-none focus:ring-green-300"> Create </button>
                <button wire:click="close" type="button" data-modal-hide="default-modal" class="bg-red-300 text-white text-sm text-center font-medium rounded-lg px-5 py-2.5 ms-3 duration-300 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-300 focus:z-10"> Cancel </button>
            </div>

            <span wire:loading class="p-3">Saving...</span> 
        </form>
    </div>

</div>
