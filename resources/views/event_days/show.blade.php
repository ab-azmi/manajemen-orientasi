<x-app-layout>
    <div class="overflow-auto h-screen pb-24 pt-2 pr-2 pl-2 md:pt-0 md:pr-0 md:pl-0">
        {{ Breadcrumbs::render() }}

        <div class="flex w-full flex-row gap-5">
            <div class="shadow-lg rounded-2xl p-4 bg-white dark:bg-gray-700 w-full">
                <div class="text-slate-800 text-lg font-semibold mb-5">
                    Tambah Event Untuk {{ Str::ucfirst($event_day->name) }}
                </div>
                <form class="flex flex-col gap-5" action="{{ route('event.store', $event_day) }}" method="post"
                    enctype="multipart/form-data" autocomplete="off">
                    @csrf
                    @method('POST')

                    <div class=" relative">
                        <label for="name" class="text-gray-700">
                            Name
                            <span class="text-red-500 required-dot">
                                *
                            </span>
                        </label>
                        <input required type="text" id="name" name="name"
                            class=" rounded-lg flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                            placeholder="Upacara" />
                    </div>

                    <label class="text-gray-700" for="animals">
                        Color
                        <select id="animals"
                            class="block w-52 py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-primary-500 focus:border-primary-500"
                            name="color">
                            <option value="">
                                Select an option
                            </option>
                            <option value="bg-green-100">
                                Green
                            </option>
                            <option value="bg-purple-100">
                                Purple
                            </option>
                            <option value="bg-yellow-100">
                                Yellow
                            </option>
                        </select>
                    </label>

                    <div class="relative w-full sm:w-1/3">
                        <label class="text-gray-700" for="time">
                            Due Time
                            <span class="text-red-500 required-dot">
                                *
                            </span>
                            <input type="time" name="time"
                                class="appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 rounded-lg text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent flex-1" />
                        </label>
                    </div>

                    <label class="text-gray-700" for="name">
                        Catatan
                        <textarea name="catatan"
                            class="flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 rounded-lg text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                            id="comment" placeholder="Enter your comment" name="comment" rows="5" cols="40"></textarea>
                    </label>

                    <div class="w-full sm:w-1/2">
                        <button type="submit"
                            class="py-2 px-4 flex justify-center items-center  bg-red-600 hover:bg-red-700 focus:ring-red-500 focus:ring-offset-red-200 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg ">
                            <svg width="20" height="20" fill="currentColor" class="mr-2" viewBox="0 0 1792 1792"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M1344 1472q0-26-19-45t-45-19-45 19-19 45 19 45 45 19 45-19 19-45zm256 0q0-26-19-45t-45-19-45 19-19 45 19 45 45 19 45-19 19-45zm128-224v320q0 40-28 68t-68 28h-1472q-40 0-68-28t-28-68v-320q0-40 28-68t68-28h427q21 56 70.5 92t110.5 36h256q61 0 110.5-36t70.5-92h427q40 0 68 28t28 68zm-325-648q-17 40-59 40h-256v448q0 26-19 45t-45 19h-256q-26 0-45-19t-19-45v-448h-256q-42 0-59-40-17-39 14-69l448-448q18-19 45-19t45 19l448 448q31 30 14 69z">
                                </path>
                            </svg>
                            Upload
                        </button>
                    </div>
                </form>

            </div>
            <div class="shadow-lg rounded-xl w-full md:w-[80%] p-4 bg-white dark:bg-gray-800 relative overflow-hidden">
                <div class="w-full flex flex-row justify-between mb-6">
                    <div class="flex flex-col w-fit justify-start">
                        <p class="text-gray-800 dark:text-white text-xl font-semibold">
                            {{ Str::ucfirst($event_day->name) }}
                        </p>
                        <p class="text-slate-600 dark:text-slate-200 text-sm ">
                            {{ \Carbon\Carbon::parse($event_day->day_date)->format('D, d-m-Y') }}
                        </p>
                    </div>
                </div>
                @foreach ($event_day->events()->orderBy('time')->get() as $event)
                <div class="flex items-center mb-2 gap-3 rounded justify-between p-3 {{$event->color}}">
                    <span class="rounded-lg p-2 bg-white">
                        <i class="fa-solid fa-heart"></i>
                    </span>
                    <div class="flex w-full ml-2 items-center justify-between">
                        <p class="w-[80%]">
                            {{ Str::ucfirst($event->name) }}
                        </p>
                        <p>
                            {{ \Carbon\Carbon::parse($event->time)->format('H:i') }}
                        </p>
                    </div>
                    <form action="{{ route('events.destroy', $event) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </form>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>