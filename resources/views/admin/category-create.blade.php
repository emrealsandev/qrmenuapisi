<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <div class="justify-center items-center ">
                        <form action="{{ route('category.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <label for="category"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Kategori
                                Adı</label>
                            <input type="text" id="name" name="name"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required>
                            <label for="formFile" class="form-label inline-block mb-2 text-gray-700">Fotoğraf</label>
                            <input
                                class="form-control
    block
    w-full
    px-3
    text-gray-700
    bg-white bg-clip-padding
    border border-solid border-gray-300
    rounded
    transition
    ease-in-out
    m-0
    focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                type="file" id="formFile" name="image">
                            <button type="submit"
                                class="bg-blue-500 hover:bg-blue-700 text-white italic mt-3 flex  mx-auto py-2 px-2 rounded-full ">Kaydet</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
