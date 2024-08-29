<div>

    <div class="relative p-4 w-full max-w-2xl">
        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
            <h3 class="text-xl font-semibold text-slate-800 uppercase">
                delete list
            </h3>
            <button wire:click="close" type="button" class="text-slate-600 bg-transparent duration-300 hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="default-modal">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
        </div>
        <!-- Modal body -->
        <form wire:submit.prevent="delete_list" action="#" method="POST" role="form">
            @csrf

            <h2 class="text-lg p-4 flex gap-2">
                </span class="my-3">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 text-yellow-400 duration-300 hover:text-yellow-800 hover:scale-125">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />
                    </svg>
                </span>
                Are you sure to eliminate <i>{{ $list_name }}</i> list?
            </h2>
            <p class="p-4">You are going to remove all of the links stored in this list</p>
            <!-- Modal footer -->
            <div class="flex items-center p-4 md:p-5 border-t border-slate-300 rounded-b">
                <button type="submit" data-modal-hide="default-modal" class="bg-green-300 text-white py-2.5 px-5 text-sm text-center font-medium rounded-lg duration-300 hover:bg-green-600 focus:outline-none focus:ring-4 focus:ring-green-600"> Yes </button>
                <button wire:click="close" type="button" data-modal-hide="default-modal" class="bg-red-300 text-white py-2.5 px-5 ms-3 text-sm font-medium border rounded-lg duration-300 hover:bg-red-600 focus:z-10 focus:outline-none focus:ring-4 focus:ring-red-600"> Cancel </button>
            </div>

            <span wire:loading class="p-3">Loading...</span> 
        </form>
    </div>

</div>
