<div>

    <div class="relative p-4 w-full max-w-2xl">
        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
            <h3 class="text-xl font-semibold text-gray-900">
                Create List
            </h3>
            <button wire:click="close" type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="default-modal">
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
                    <label for="url" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">List Name</label>
                    <input wire:model="list_name" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type the name of the list to create...">
                    <div style="color: red;">@error('list_name') {{ $message }} @enderror</div>
                </div>
            </div>
            <div class="p-4 md:p-5 space-y-4">
                <div class="col-span-2">
                    <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                    <textarea wire:model="list_description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write the description here..."></textarea>
                    <div style="color: red;">@error('list_description') {{ $message }} @enderror</div>
                </div>
            </div>
            <div class="p-4 md:p-5 space-y-4">
                <div class="col-span-2">
                    <label for="list_image" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description Image</label>
                    <input wire:model="list_image" type="file" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" >
                    <div wire:loading wire:target="list_image">Loading image...</div>
                    @error('list_image') <span class="error" style="color: red;">{{ $message }}</span> @enderror
                </div>
            </div>

            <!-- Modal footer -->
            <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                <button type="submit" data-modal-hide="default-modal" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"> Create </button>
                <button wire:click="close" type="button" data-modal-hide="default-modal" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700"> Cancel </button>
            </div>

            <span wire:loading>Saving...</span> 
        </form>
    </div>

</div>
