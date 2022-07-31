<x-app-layout>
    <div class="overflow-auto h-screen pb-24 pt-2 pr-2 pl-2 md:pt-0 md:pr-0 md:pl-0">
        <div class="w-full mb-5 flex justify-end">
            <a href="{{ route('penugasan.create') }}"
                class="py-2 px-4 flex justify-center items-center w-fit  bg-red-600 hover:bg-red-700 focus:ring-red-500 focus:ring-offset-red-200 text-white  transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg ">
                <svg width="20" height="20" fill="currentColor" class="mr-2" viewBox="0 0 1792 1792"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M1344 1472q0-26-19-45t-45-19-45 19-19 45 19 45 45 19 45-19 19-45zm256 0q0-26-19-45t-45-19-45 19-19 45 19 45 45 19 45-19 19-45zm128-224v320q0 40-28 68t-68 28h-1472q-40 0-68-28t-28-68v-320q0-40 28-68t68-28h427q21 56 70.5 92t110.5 36h256q61 0 110.5-36t70.5-92h427q40 0 68 28t28 68zm-325-648q-17 40-59 40h-256v448q0 26-19 45t-45 19h-256q-26 0-45-19t-19-45v-448h-256q-42 0-59-40-17-39 14-69l448-448q18-19 45-19t45 19l448 448q31 30 14 69z">
                    </path>
                </svg>
                Tambah
            </a>
        </div>
        <div class="flex flex-col flex-wrap sm:flex-row gap-3">
            
                @foreach ($all_tugas as $tugas)
                
                <div class="mb-4 w-full sm:w-[45%] xl:w-[30%]">
                    <a href="{{ route('penugasan.show', $tugas) }}">
                        <div class="shadow-lg rounded-2xl p-4 bg-white dark:bg-gray-700 w-full">
                            <div class="flex items-center justify-between mb-6">
                                <div class="flex items-center">
                                    <span class="rounded-xl relative p-2 bg-blue-100">
                                        
                                        <img src="https://avatars.dicebear.com/api/identicon/{{ $tugas->id }}.svg" width="25" height="25" alt="">
                                    </span>
                                    <div class="flex flex-col">
                                        <span class="font-bold text-md text-black dark:text-white ml-2">
                                            {{ Str::limit($tugas->name, 30) }}
                                        </span>
                                        <span class="text-sm text-gray-500 dark:text-white ml-2">
                                            Tugas Orientasi
                                        </span>
                                    </div>
                                </div>
                                
                            </div>

                            <div class="flex items-center justify-between mb-4 space-x-12">
                                <span
                                    class="px-2 py-1 flex items-center font-semibold text-xs rounded-md {{ $tugas->status == 0 ? 'text-gray-500 bg-gray-200' : 'text-green-700 bg-green-50' }} ">
                                {{ $tugas->status == 0 ? 'PROGRESS' : 'COMPLETED' }}
                                </span>
                                @switch($tugas->priority)
                                    @case('high')
                                        <span
                                            class="px-2 py-1 flex items-center font-semibold text-xs rounded-md  text-red-400 border border-red-400  bg-white">
                                            {{ Str::upper($tugas->priority) }} PRIORITY
                                        </span>
                                        @break
                                    @case('medium')
                                        <span
                                            class="px-2 py-1 flex items-center font-semibold text-xs rounded-md text-green-600 border border-green-600  bg-white">
                                            {{ Str::upper($tugas->priority) }} PRIORITY
                                        </span>
                                        @break
                                    @case('low')
                                        <span
                                            class="px-2 py-1 flex items-center font-semibold text-xs rounded-md text-blue-600 border border-blue-600  bg-white">
                                            {{ Str::upper($tugas->priority) }} PRIORITY
                                        </span>
                                        @break
                                    @default
                                        
                                @endswitch
                                
                            </div>
                            
                            <div class="block m-auto">
                                <div>
                                    <span class="text-sm inline-block text-gray-500 dark:text-gray-100">
                                        People completed :
                                        <span class="text-gray-700 dark:text-white font-bold">
                                            {{ $tugas->usersCompleted->count() }}
                                        </span>
                                        / {{ $tugas->users->count() }}
                                    </span>
                                </div>
                                <div class="w-full h-2 bg-gray-200 rounded-full mt-2">
                                    <div class="h-full text-center text-xs text-white bg-purple-500 rounded-full" style="width: {{ round($tugas->usersCompleted->count()/$tugas->users->count()*100) }}%">
                                    </div>
                                </div>
                            </div>
                                                        
                            <span
                                class="px-2 py-1 flex w-fit mt-4 items-center text-xs rounded-md font-semibold text-yellow-800 bg-yellow-100">
                                DUE DATE : {{ \Carbon\Carbon::parse($tugas->due_date)->format('D, d-M-Y [H:i]') }}
                            </span>
                        </div>
                    </a>
                </div>
                @endforeach
           
        </div>
    </div>
</x-app-layout>