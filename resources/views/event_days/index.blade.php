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
                    <div class="flex items-center mb-2 rounded justify-between p-3 bg-{{ $event->color }}-100">
                        <span class="rounded-lg p-2 bg-white">
                            <svg width="20" height="20" fill="currentColor" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M1520 1216q0-40-28-68l-208-208q-28-28-68-28-42 0-72 32 3 3 19 18.5t21.5 21.5 15 19 13 25.5 3.5 27.5q0 40-28 68t-68 28q-15 0-27.5-3.5t-25.5-13-19-15-21.5-21.5-18.5-19q-33 31-33 73 0 40 28 68l206 207q27 27 68 27 40 0 68-26l147-146q28-28 28-67zm-703-705q0-40-28-68l-206-207q-28-28-68-28-39 0-68 27l-147 146q-28 28-28 67 0 40 28 68l208 208q27 27 68 27 42 0 72-31-3-3-19-18.5t-21.5-21.5-15-19-13-25.5-3.5-27.5q0-40 28-68t68-28q15 0 27.5 3.5t25.5 13 19 15 21.5 21.5 18.5 19q33-31 33-73zm895 705q0 120-85 203l-147 146q-83 83-203 83-121 0-204-85l-206-207q-83-83-83-203 0-123 88-209l-88-88q-86 88-208 88-120 0-204-84l-208-208q-84-84-84-204t85-203l147-146q83-83 203-83 121 0 204 85l206 207q83 83 83 203 0 123-88 209l88 88q86-88 208-88 120 0 204 84l208 208q84 84 84 204z">
                                </path>
                            </svg>
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