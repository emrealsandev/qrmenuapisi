<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            İçerik Düzenle
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <div class="justify-center items-center ">
                        <form action="{{ route('menu.update', ['category_id' => $category_id, 'menu' => $menu]) }}" method="POST">
                            @method('PUT')
                            @csrf
                            <label for="name"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Ürün
                                Adı</label>
                            <input type="text" id="name" name="name"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required value="{{ $menu->name }}">
                            <label for="price"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Ürün
                                Fiyatı</label>
                            <input type="number" id="price" name="price"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required value="{{ $menu->price }}">
                            <label for="description"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Ürün
                                Açıklaması</label>
                            <textarea name="description" id="description" cols="30" rows="5" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{ $menu->description }}</textarea>
                            <button type="submit"
                                class="bg-blue-500 hover:bg-blue-700 text-white italic mt-3 flex  mx-auto py-2 px-2 rounded-full ">Kaydet</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
