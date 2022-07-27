<x-app-layout>
    <div class="overflow-auto h-screen pb-24 pt-2 pr-2 pl-2 md:pt-0 md:pr-0 md:pl-0">
        <div class="mb-4 w-full">
            {{ Breadcrumbs::render() }}

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
                                        <img alt="profil" src="https://picsum.photos/id/{{ $user->id }}/300/300" class="mx-auto object-cover rounded-full h-20 w-20 " />
                                    </a>
                                </div>
                                <div class="mt-2 text-center flex flex-col">
                                    <span class="text-gray-600 dark:text-white text-lg font-medium">
                                        {{ $user->name }}
                                    </span>
                                    <span class="text-gray-400 text-xs">
                                        Designer
                                    </span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
</x-app-layout>