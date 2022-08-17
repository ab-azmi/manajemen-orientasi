<x-app-layout>
    <div class="overflow-auto h-screen pb-24 pt-2 pr-2 pl-2 md:pt-0 md:pr-0 md:pl-0">
        <div class="mb-4 w-full">
            <div class="w-full flex items-center justify-between">
                {{ Breadcrumbs::render() }}
                <div class="w-fit h-fit flex  gap-4">
                    <form action="{{ route('groups.destroy', $group) }}" method="post" class="w-fit h-fit">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="py-2 px-4 w-40 flex justify-center items-center h-fit  bg-red-600 hover:bg-red-700 focus:ring-red-500 focus:ring-offset-red-200 text-white transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg ">
                           <i class="fa-solid fa-trash mr-2"></i>
                            Hapus Group
                        </button>
                    </form>
                    <a href=""
                        class="py-2 px-4 flex justify-center items-center h-fit  bg-indigo-600 hover:bg-indigo-700 focus:ring-indigo-500 focus:ring-offset-indigo-200 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg ">
                        <i class="fa-solid fa-pen-to-square mr-3"></i>
                        Update Group
                    </a>
                </div>
            </div>

            <div class="p-8 bg-white dark:bg-gray-800 rounded-lg shadow mb-5">
                <p class="text-center text-3xl font-bold text-gray-800 dark:text-white">
                    Penanggung Jawab
                </p>
                <p class="text-center mb-12 text-xl font-normal text-gray-500 dark:text-gray-200">
                    Group {{ $group->name }}
                </p>
                <div class="flex items-center flex-col md:flex-row justify-evenly">
                    @foreach ($group->penanggung_jawabs as $pj)
                    <div class="p-4">
                        <div class="text-center mb-4 opacity-90">
                            <a href="#" class="block relative">
                                <img alt="profil" src="https://picsum.photos/id/254/300/300"
                                    class="mx-auto object-cover rounded-full h-40 w-40 " />
                            </a>
                        </div>
                        <div class="text-center">
                            <p class="text-2xl text-gray-800 dark:text-white">
                                {{ $pj->name }}
                            </p>
                            <p class="text-md text-gray-500 dark:text-gray-200 font-light">
                                {{ $pj->email }}
                            </p>
                            {{-- <p class="text-md text-gray-500 dark:text-gray-400 max-w-xs py-4 font-light">
                                Patrick Sébastien, born November 14, 1953 in Brive-la-Gaillarde, is an imitator.
                            </p> --}}
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="p-8 bg-white dark:bg-gray-800 rounded-lg shadow mb-5">
                <div class="text-slate-800 text-lg font-semibold mb-5">
                    Tambah Anggota
                </div>
                <form class="flex flex-col gap-5" action="{{ route('groups.anggota', $group) }}" method="post"
                    enctype="multipart/form-data" autocomplete="off">
                    @csrf
                    @method('POST')

                    <div class="relative w-full">
                        <select id="select-role" name="anggota[]" multiple placeholder="Select groups..."
                            autocomplete="off"
                            class="block w-full rounded-lg text-base cursor-pointer focus:outline-none " multiple>
                            @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="w-full md:w-1/3">
                        <button type="submit"
                            class="py-2 px-4 flex justify-center items-center  bg-blue-600 hover:bg-blue-700 focus:ring-blue-500 focus:ring-offset-red-200 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg ">
                            <svg width="20" height="20" fill="currentColor" class="mr-2" viewBox="0 0 1792 1792"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M1344 1472q0-26-19-45t-45-19-45 19-19 45 19 45 45 19 45-19 19-45zm256 0q0-26-19-45t-45-19-45 19-19 45 19 45 45 19 45-19 19-45zm128-224v320q0 40-28 68t-68 28h-1472q-40 0-68-28t-28-68v-320q0-40 28-68t68-28h427q21 56 70.5 92t110.5 36h256q61 0 110.5-36t70.5-92h427q40 0 68 28t28 68zm-325-648q-17 40-59 40h-256v448q0 26-19 45t-45 19h-256q-26 0-45-19t-19-45v-448h-256q-42 0-59-40-17-39 14-69l448-448q18-19 45-19t45 19l448 448q31 30 14 69z">
                                </path>
                            </svg>
                            Tambah
                        </button>
                    </div>
                </form>
            </div>
            <div class="w-full flex justify-end">
                <form action="{{ route('groups.removeAll', $group) }}" method="post" class="mb-5">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="py-2 px-4 flex justify-center items-center  bg-red-600 hover:bg-red-700 focus:ring-red-500 focus:ring-offset-red-200 text-white w-fit transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg ">
                        <i class="fa-solid fa-trash mr-3"></i>
                        Hapus Semua Anggota
                    </button>
                </form>
            </div>
            <div class="p-8 bg-white dark:bg-gray-800 rounded-lg shadow">
                <p class="text-center text-3xl font-bold text-gray-800 dark:text-white">
                    Anggota
                </p>
                <p class="text-center mb-12 text-xl font-normal text-gray-500 dark:text-gray-300">
                    Group {{ $group->name }}
                </p>
                <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-4">
                    @foreach ($group->anggota as $user)
                    <div class="p-4">
                        <div class="flex-col  flex justify-center items-center">
                            <div class="flex-shrink-0">
                                <a href="#" class="block relative">
                                    <img alt="profil" src="https://picsum.photos/id/{{ $user->id }}/300/300"
                                        class="mx-auto object-cover rounded-full h-20 w-20 " />
                                </a>
                            </div>
                            <div class="mt-2 text-center flex flex-col">
                                <span class="text-gray-600 dark:text-white text-lg font-medium">
                                    {{ $user->name }}
                                </span>
                                <span class="text-gray-400 text-xs">
                                    Designer
                                </span>
                                <form action="{{ route('groups.removeAnggota',[$group, $user]) }}" method="post"
                                    class="mt-2">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">
                                        <i class="fa-solid fa-trash text-red-500"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
</x-app-layout>