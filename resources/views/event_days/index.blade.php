<x-app-layout>
    <div class="overflow-auto h-screen pb-24 pt-2 pr-2 pl-2 md:pt-0 md:pr-0 md:pl-0">

        <div class="flex gap-5 flex-col sm:flex-row w-full flex-wrap">
            @foreach ($event_days as $event_day)
            <div class="shadow-lg rounded-xl w-full md:w-80 p-4 bg-white dark:bg-gray-800 relative overflow-hidden">
                <div class="w-full flex flex-col justify-start mb-6">
                    <p class="text-gray-800 dark:text-white text-xl font-semibold">
                        {{ Str::ucfirst($event_day->name) }}
                    </p>
                    <p class="text-slate-600 dark:text-slate-200 text-sm ">
                        {{ \Carbon\Carbon::parse($event_day->day_date)->format('D, d-m-Y') }}
                    </p>
                    {{-- <button
                        class="flex items-center hover:text-black dark:text-gray-50 dark:hover:text-white text-gray-800 border-0 focus:outline-none">
                        <svg width="20" height="20" fill="currentColor" viewBox="0 0 1792 1792"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M1600 736v192q0 40-28 68t-68 28h-416v416q0 40-28 68t-68 28h-192q-40 0-68-28t-28-68v-416h-416q-40 0-68-28t-28-68v-192q0-40 28-68t68-28h416v-416q0-40 28-68t68-28h192q40 0 68 28t28 68v416h416q40 0 68 28t28 68z">
                            </path>
                        </svg>
                    </button> --}}
                </div>
                @foreach ($event_day->events as $event)
                    <div class="flex items-center mb-2 rounded justify-between p-3 bg-{{$event->color}}-100">
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