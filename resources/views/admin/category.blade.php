<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Kategoriler
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <button
                        class="bg-blue-500 hover:bg-blue-700 text-white italic float-right py-2 px-2 rounded-full mb-4">
                        <a href="{{ route('category.create') }}" class="btn btn-sm btn-success"><i class="fa fa-plus""></i>
                            Kategori Oluştur</a>
                    </button>
                    <table class="w-full text-sm text-left text-gray-500  dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="py-3 px-6">
                                    Id
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Kategori Adı
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Fotoğraf
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    İşlemler
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr class="bg-white dark:bg-gray-800">
                                    <th scope="row"
                                        class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $category->id }}
                                    </th>
                                    <td class="py-4 px-6">
                                        {{ $category->name }}
                                    </td>
                                    <td> @if ($category->image)
                                        <a href="{{ $category->image }}" target="_blank" class="btn btn-sm btn-light">Görüntüle</a>
                                    @endif
    </td>
                                    <td class="py-4 px-6 mx-4">
                                        <a href="{{ route('category.destroy', $category->id) }}" class="p-2 m-2">Sil<i
                                                class="fa fa-times"></i></a>
                                        <a href="{{ route('category.edit', $category->id) }}" style="float:left;">Düzenle<i
                                                class="fa fa-pen"></i></a>
                                        <a href="{{ route('menu.index',$category->id)}}"><i class="fa fa-info">İçerik</i></a>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
