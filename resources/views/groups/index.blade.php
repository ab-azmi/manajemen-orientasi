<x-app-layout>
    <div class="overflow-auto h-screen pb-24 pt-2 pr-2 pl-2 md:pt-0 md:pr-0 md:pl-0">
        <div class="flex flex-wrap sm:flex-row flex-col w-full gap-5 mt-4 md:mt-0">
            <div class="w-full mb-3 flex justify-end">
                <a href="{{ route('groups.create') }}" class="py-2 px-4 flex justify-center items-center w-fit  bg-red-600 hover:bg-red-700 focus:ring-red-500 focus:ring-offset-red-200 text-white  transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg ">
                    <svg width="20" height="20" fill="currentColor" class="mr-2" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1344 1472q0-26-19-45t-45-19-45 19-19 45 19 45 45 19 45-19 19-45zm256 0q0-26-19-45t-45-19-45 19-19 45 19 45 45 19 45-19 19-45zm128-224v320q0 40-28 68t-68 28h-1472q-40 0-68-28t-28-68v-320q0-40 28-68t68-28h427q21 56 70.5 92t110.5 36h256q61 0 110.5-36t70.5-92h427q40 0 68 28t28 68zm-325-648q-17 40-59 40h-256v448q0 26-19 45t-45 19h-256q-26 0-45-19t-19-45v-448h-256q-42 0-59-40-17-39 14-69l448-448q18-19 45-19t45 19l448 448q31 30 14 69z">
                        </path>
                    </svg>
                    Tambah
                </a>
            </div>
            @foreach ($groups as $group)
            <a href="{{ route('groups.show', $group) }}" class="w-full sm:w-[45%] xl:w-[30%]">
                @php
                $hex = '';
                if($group->color == 'yellow'){
                $hex = '#f3c06b';
                }
                if($group->color == 'blue'){
                $hex = '#6da3fb';
                }
                if($group->color == 'purple'){
                $hex = '#a17cf3';
                }
                @endphp
                <div class="flex-shrink-0 relative overflow-hidden bg-{{ $group->color }}-500 rounded-lg w-full shadow-lg">
                    <svg class="absolute bottom-0 left-0 mb-8" viewBox="0 0 375 283" fill="none">
                        <rect x="159.52" y="175" width="152" height="152" rx="8" transform="rotate(-45 159.52 175)" fill="{{ $hex }}">
                        </rect>
                        <rect y="107.48" width="152" height="152" rx="8" transform="rotate(-45 0 107.48)" fill="{{ $hex }}">
                        </rect>
                    </svg>
                    <div class="relative pt-10 px-10 flex items-center justify-center">
                        <div class="block absolute w-48 h-48 bottom-0 left-0 -mb-24 ml-3">
                        </div>
                    </div>
                    <div class="relative text-white px-6 pb-6 mt-6">
                        <span class="block opacity-75 -mb-1">
                            Group
                        </span>
                        <div class="flex justify-between">
                            <span class="block font-semibold text-xl">
                                {{ $group->name }}
                            </span>
                            <span class="bg-white rounded-full text-slate-500 text-xs font-bold px-3 py-2 leading-none flex items-center">
                                {{ $group->users_count }}
                            </span>
                        </div>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</x-app-layout>