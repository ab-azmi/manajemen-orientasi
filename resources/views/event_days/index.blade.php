<x-app-layout>
    <div class="overflow-auto h-screen pb-24 pt-2 pr-2 pl-2 md:pt-0 md:pr-0 md:pl-0">
        <div class="w-full mb-5 flex justify-end">
            <a href="{{ route('event_days.create') }}"
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
        <div class="flex gap-5 flex-col sm:flex-row w-full flex-wrap">
            @foreach ($event_days as $event_day)
            <div class="shadow-lg rounded-xl w-full md:w-80 p-4 bg-white dark:bg-gray-800 relative overflow-hidden">
                <div class="w-full flex flex-row justify-between mb-6">
                    <div class="flex flex-col w-fit justify-start">
                        <p class="text-gray-800 dark:text-white text-xl font-semibold">
                            {{ Str::ucfirst($event_day->name) }}
                        </p>
                        <p class="text-slate-600 dark:text-slate-200 text-sm ">
                            {{ \Carbon\Carbon::parse($event_day->day_date)->format('D, d-m-Y') }}
                        </p>
                    </div>
                    <a href="{{ route('event_days.show', $event_day) }}"
                        class="flex items-center hover:text-black dark:text-gray-50 dark:hover:text-white text-gray-800 border-0 focus:outline-none">
                        <svg width="20" height="20" fill="currentColor" viewBox="0 0 1792 1792"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M1600 736v192q0 40-28 68t-68 28h-416v416q0 40-28 68t-68 28h-192q-40 0-68-28t-28-68v-416h-416q-40 0-68-28t-28-68v-192q0-40 28-68t68-28h416v-416q0-40 28-68t68-28h192q40 0 68 28t28 68v416h416q40 0 68 28t28 68z">
                            </path>
                        </svg>
                    </a>
                </div>
                @foreach ($event_day->events as $event)
                <div class="flex items-center mb-2 rounded justify-between p-3 {{$event->color}}">
                    <span class="rounded-lg p-2 bg-white">
                        <i class="fa-solid fa-heart"></i>
                    </span>
                    <div class="flex w-full ml-2 items-center justify-between">
                        <p>
                            {{ Str::ucfirst($event->name) }}
                        </p>
                        <p>
                            {{ \Carbon\Carbon::parse($event->time)->format('H:i') }}
                        </p>
                    </div>
                </div>
                @endforeach
            </div>
            @endforeach
        </div>

    </div>
</x-app-layout>