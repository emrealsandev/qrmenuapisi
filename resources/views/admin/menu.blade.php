<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{$menu->name}}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <button
                    class="bg-slate-500 hover:bg-slate-700 text-white italic  py-2 px-2 rounded-full m-3">
                    <a href="{{ route('category.index') }}" ><i class="fa-solid fa-arrow-left"></i>
                        Geri Dön</a>
                </button>
                    <button
                        class="bg-blue-500 hover:bg-blue-700 text-white italic float-right py-2 px-2 rounded-full m-3">
                        <a href=" {{ route('menu.olustur', $menu->id) }}" >
                            Ürün Oluştur</a>
                    </button>
                    <table class="w-full text-sm text-left text-gray-500  dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="py-3 px-6">
                                    Id
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Ürün Adı
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Fiyatı
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Açıklaması
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    İşlemler
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($menu->menus as $item)
                                <tr class="bg-white dark:bg-gray-800">
                                    <th scope="row"
                                        class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $item->id }}
                                    </th>
                                    <td class="py-4 px-6">
                                        {{ $item->name }}
                                    </td>
                                    <td class="py-4 px-6">
                                        {{ $item->price }}

                                    </td>
                                    <td class="py-4 px-6">
                                        {{ $item->description }}

                                    </td>
                                    <td class="py-4 px-6 mx-4">
                                        <a href="{{ route('menu.silme', ['category_id' => $menu->id  , 'menu_id' => $item->id  ]) }}" class="p-2 m-2"><i
                                                class="fa fa-times"></i>Sil</a>
                                        <a href="{{ route('menu.edit', ['category_id' => $menu->id , 'menu' => $item ]) }}" style="float:left;"><i
                                                class="fa fa-pen"></i>Düzenle</a>
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
