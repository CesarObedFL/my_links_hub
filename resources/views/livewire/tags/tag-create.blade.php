<div>
    
    <div class="relative p-4 w-full max-w-2xl">

        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
            <h3 class="text-xl font-semibold text-gray-900 uppercase">
                create tag
            </h3>
            <button wire:click="close" type="button" class="text-slate-300 bg-transparent duration-300 hover:bg-slate-300 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="default-modal">
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
                    <label for="title" class="block mb-2 text-sm font-medium text-gray-900">Tag Title</label>
                    <input wire:model="title" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Type the tag title to save...">
                    <div style="color: red;">@error('title') {{ $message }} @enderror</div>
                </div>
            </div>
            <!-- Modal footer -->
            <div class="flex items-center p-4 md:p-5 border-t border-slate-300 rounded-b">
                <button type="submit" data-modal-hide="default-modal" class="bg-green-300 text-white text-center text-sm font-medium rounded-lg px-5 py-2.5 duration-300 hover:bg-green-600 focus:ring-4 focus:outline-none focus:ring-green-800">Save</button>
                <button wire:click="close" type="button" data-modal-hide="default-modal" class="bg-red-300 text-white text-center text-sm font-medium rounded-lg px-5 py-2.5 ms-3 duration-300 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-800 focus:z-10">Cancel</button>
            </div>

            <span wire:loading class="p-3">Saving...</span> 
        </form>

    </div> <!-- /. class="relative p-4 w-full max-w-2xl" -->

</div>
