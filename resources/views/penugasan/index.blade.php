<x-app-layout>
    <div class="overflow-auto h-screen pb-24 pt-2 pr-2 pl-2 md:pt-0 md:pr-0 md:pl-0">
        <div class="flex flex-col flex-wrap sm:flex-row gap-3">
            
                @foreach ($all_tugas as $tugas)
                
                <div class="mb-4 w-full sm:w-[45%] xl:w-[30%]">
                    <a href="{{ route('penugasan.show', $tugas->id) }}">
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
                                DUE DATE : {{ \Carbon\Carbon::parse($tugas->due_date)->format('D, d-M-Y') }}
                            </span>
                        </div>
                    </a>
                </div>
                @endforeach
           
        </div>
    </div>
</x-app-layout>