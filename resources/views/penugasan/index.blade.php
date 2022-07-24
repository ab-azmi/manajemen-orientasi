<x-app-layout>
    <div class="overflow-auto h-screen pb-24 pt-2 pr-2 pl-2 md:pt-0 md:pr-0 md:pl-0">
        <div class="flex flex-col flex-wrap sm:flex-row gap-3">
            
                @foreach ($tugas as $t)
                
                <div class="mb-4 w-full sm:w-1/2 xl:w-[30%]">
                    <a href="">
                        <div class="shadow-lg rounded-2xl p-4 bg-white dark:bg-gray-700 w-full">
                            <div class="flex items-center justify-between mb-6">
                                <div class="flex items-center">
                                    <span class="rounded-xl relative p-2 bg-blue-100">
                                        <svg width="25" height="25" viewBox="0 0 256 262" xmlns="http://www.w3.org/2000/svg"
                                            preserveAspectRatio="xMidYMid">
                                            <path
                                                d="M255.878 133.451c0-10.734-.871-18.567-2.756-26.69H130.55v48.448h71.947c-1.45 12.04-9.283 30.172-26.69 42.356l-.244 1.622 38.755 30.023 2.685.268c24.659-22.774 38.875-56.282 38.875-96.027"
                                                fill="#4285F4">
                                            </path>
                                            <path
                                                d="M130.55 261.1c35.248 0 64.839-11.605 86.453-31.622l-41.196-31.913c-11.024 7.688-25.82 13.055-45.257 13.055-34.523 0-63.824-22.773-74.269-54.25l-1.531.13-40.298 31.187-.527 1.465C35.393 231.798 79.49 261.1 130.55 261.1"
                                                fill="#34A853">
                                            </path>
                                            <path
                                                d="M56.281 156.37c-2.756-8.123-4.351-16.827-4.351-25.82 0-8.994 1.595-17.697 4.206-25.82l-.073-1.73L15.26 71.312l-1.335.635C5.077 89.644 0 109.517 0 130.55s5.077 40.905 13.925 58.602l42.356-32.782"
                                                fill="#FBBC05">
                                            </path>
                                            <path
                                                d="M130.55 50.479c24.514 0 41.05 10.589 50.479 19.438l36.844-35.974C195.245 12.91 165.798 0 130.55 0 79.49 0 35.393 29.301 13.925 71.947l42.211 32.783c10.59-31.477 39.891-54.251 74.414-54.251"
                                                fill="#EB4335">
                                            </path>
                                        </svg>
                                    </span>
                                    <div class="flex flex-col">
                                        <span class="font-bold text-md text-black dark:text-white ml-2">
                                            {{ Str::limit($t->name, 20) }}
                                        </span>
                                        <span class="text-sm text-gray-500 dark:text-white ml-2">
                                            Google Inc.
                                        </span>
                                    </div>
                                </div>
                                <div class="flex items-center">
                                    <button class="border p-1 border-gray-200 rounded-full">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                            class="w-4 h-4 text-yellow-500" fill="currentColor" viewBox="0 0 1792 1792">
                                            <path
                                                d="M1728 647q0 22-26 48l-363 354 86 500q1 7 1 20 0 21-10.5 35.5t-30.5 14.5q-19 0-40-12l-449-236-449 236q-22 12-40 12-21 0-31.5-14.5t-10.5-35.5q0-6 2-20l86-500-364-354q-25-27-25-48 0-37 56-46l502-73 225-455q19-41 49-41t49 41l225 455 502 73q56 9 56 46z">
                                            </path>
                                        </svg>
                                    </button>
                                    <button class="text-gray-200">
                                        <svg width="25" height="25" fill="currentColor" viewBox="0 0 1792 1792"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M1088 1248v192q0 40-28 68t-68 28h-192q-40 0-68-28t-28-68v-192q0-40 28-68t68-28h192q40 0 68 28t28 68zm0-512v192q0 40-28 68t-68 28h-192q-40 0-68-28t-28-68v-192q0-40 28-68t68-28h192q40 0 68 28t28 68zm0-512v192q0 40-28 68t-68 28h-192q-40 0-68-28t-28-68v-192q0-40 28-68t68-28h192q40 0 68 28t28 68z">
                                            </path>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            <div class="flex items-center justify-between mb-4 space-x-12">
                                <span
                                    class="px-2 py-1 flex items-center font-semibold text-xs rounded-md {{ $t->status == 0 ? 'text-gray-500 bg-gray-200' : 'text-green-700 bg-green-50' }} ">
                                {{ $t->status == 0 ? 'PROGRESS' : 'COMPLETED' }}
                                </span>
                                @switch($t->priority)
                                    @case('high')
                                        <span
                                            class="px-2 py-1 flex items-center font-semibold text-xs rounded-md  text-red-400 border border-red-400  bg-white">
                                            {{ Str::upper($t->priority) }} PRIORITY
                                        </span>
                                        @break
                                    @case('medium')
                                        <span
                                            class="px-2 py-1 flex items-center font-semibold text-xs rounded-md text-green-600 border border-green-600  bg-white">
                                            {{ Str::upper($t->priority) }} PRIORITY
                                        </span>
                                        @break
                                    @case('low')
                                        <span
                                            class="px-2 py-1 flex items-center font-semibold text-xs rounded-md text-blue-600 border border-blue-600  bg-white">
                                            {{ Str::upper($t->priority) }} PRIORITY
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
                                            {{ $t->usersCompleted->count() }}
                                        </span>
                                        /{{ $t->users->count() }}
                                    </span>
                                </div>
                                <div class="w-full h-2 bg-gray-200 rounded-full mt-2">
                                    <div class="h-full text-center text-xs text-white bg-purple-500 rounded-full" style="width: {{ round($t->usersCompleted->count()/$t->users->count()*100) }}%">
                                    </div>
                                </div>
                            </div>
                            <div class="flex items-center justify-start my-4 space-x-4">
                                <span
                                    class="px-2 py-1 flex items-center text-xs rounded-md font-semibold text-green-500 bg-green-50">
                                    IOS APP
                                </span>
                                <span
                                    class="px-2 py-1 flex items-center text-xs rounded-md text-blue-500 font-semibold bg-blue-100">
                                    UI/UX
                                </span>
                            </div>
                            
                            <span
                                class="px-2 py-1 flex w-fit mt-4 items-center text-xs rounded-md font-semibold text-yellow-800 bg-yellow-100">
                                DUE DATE : {{ \Carbon\Carbon::parse($t->due_date)->format('D, d-M-Y') }}
                            </span>
                        </div>
                    </a>
                </div>
                @endforeach
           
        </div>
    </div>
</x-app-layout>