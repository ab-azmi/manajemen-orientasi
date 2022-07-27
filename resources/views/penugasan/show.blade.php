<x-app-layout>
    <div class="overflow-auto h-screen pb-24 pt-2 pr-2 pl-2 md:pt-0 md:pr-0 md:pl-0">
        <div class="mb-4 w-full">

            {{ Breadcrumbs::render() }}
            
            <div class="shadow-lg rounded-2xl p-6 bg-white dark:bg-gray-700 w-full mb-5">

                <div class="flex items-center justify-between mb-6 w-full">
                    <div class="flex items-center w-full">
                        <span class="rounded-xl relative p-2 bg-blue-100">

                            <img src="https://avatars.dicebear.com/api/identicon/{{ $tugas->id }}.svg" width="25"
                                height="25" alt="">
                        </span>
                        <div class="flex justify-between w-full flex-col md:flex-row gap-2">
                            <div class="flex flex-col ml-5">
                                <span class="font-bold text-lg text-black dark:text-white">
                                    {{ $tugas->name }}
                                </span>
                                <span class="text-sm text-gray-500 dark:text-white ">
                                    Tugas Orientasi
                                </span>
                            </div>
                            <span
                                class="ml-5 md:ml-0 px-2 py-1 w-fit h-fit text-center font-semibold text-sm rounded-md {{ $tugas->status == 0 ? 'text-gray-500 bg-gray-200' : 'text-green-700 bg-green-50' }} ">
                                {{ $tugas->status == 0 ? 'PROGRESS' : 'COMPLETED' }}
                            </span>
                        </div>

                    </div>
                </div>

                <div class="px-12">
                    <p class="text-md leading-6 text-gray-800">
                        {{ $tugas->deskripsi }}
                    </p>

                    <div class="flex mt-4 gap-4 flex-wrap">
                        <img src="https://picsum.photos/id/34/300/300" class="sm:w-20 w-14  rounded-lg" alt="">
                        <img src="https://picsum.photos/id/599/300/300" class="sm:w-20 w-14  rounded-lg" alt="">
                        <img src="https://picsum.photos/id/57/300/300" class="sm:w-20 w-14  rounded-lg" alt="">
                        <img src="https://picsum.photos/id/108/300/300" class="sm:w-20 w-14  rounded-lg" alt="">
                    </div>
                </div>

                <div class="px-11 mt-8 flex flex-col sm:flex-row justify-between w-full">
                    <div class="flex gap-5 w-fit sm:items-center flex-col sm:flex-row">
                        <span
                            class="px-2 py-1 flex w-fit items-center text-sm rounded-md font-semibold text-yellow-800 bg-yellow-100">
                            DUE DATE : {{ \Carbon\Carbon::parse($tugas->due_date)->format('D, d-M-Y') }}
                        </span>
                        <div class="w-fit text-sm">
                            @switch($tugas->priority)
                            @case('high')
                            <span
                                class="px-2 py-1 flex items-center font-semibold rounded-md  text-red-400 border border-red-400  bg-white">
                                {{ Str::upper($tugas->priority) }} PRIORITY
                            </span>
                            @break
                            @case('medium')
                            <span
                                class="px-2 py-1 flex items-center font-semibold rounded-md text-green-600 border border-green-600  bg-white">
                                {{ Str::upper($tugas->priority) }} PRIORITY
                            </span>
                            @break
                            @case('low')
                            <span
                                class="px-2 py-1 flex items-center font-semibold rounded-md text-blue-600 border border-blue-600  bg-white">
                                {{ Str::upper($tugas->priority) }} PRIORITY
                            </span>
                            @break
                            @default

                            @endswitch
                        </div>
                    </div>
                    <div class="block sm:w-1/4 w-full mt-3 sm:mt-0">
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
                            <div class="h-full text-center text-xs text-white bg-purple-500 rounded-full"
                                style="width: {{ round($tugas->usersCompleted->count()/$tugas->users->count()*100) }}%">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="shadow-lg rounded-2xl p-6 bg-white dark:bg-gray-700 w-full">
                <div class="flex justify-between">
                    <h2 class="text-xl font-semibold">Submission</h2>
                    @if (Auth::user()->submissions->where('tugas_id', $tugas->id)->first())
                        <span class="ml-5 md:ml-0 px-2 py-1 w-fit h-fit text-center font-semibold text-sm rounded-md text-blue-700 bg-blue-50 ">
                            SUBMITTED : {{ \Carbon\Carbon::parse(Auth::user()->submissions->where('tugas_id',
                            $tugas->id)->first()->date_submitted->diffForHumans())->diffForHumans() }}
                        </span>
                    @endif
                </div>
                <form action="{{ route('submission.store', $tugas->id) }}" method="post" class="py-6 flex flex-col gap-5" autocomplete="off" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="relative w-full md:w-[60%]">
                        <label for="judul" class="text-gray-700 mb-2">
                            Judul
                            <span class="text-red-500 required-dot">
                                *
                            </span>
                        </label>
                        <input required type="text" id="judul"
                            class=" rounded-lg border-transparent flex-1 appearance-none border border-gray-500 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-md focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                            name="judul" placeholder="Judul Tugas" />
                        @error('judul')
                            <p class="mt-1 text-sm text-red-600 dark:text-purple-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="relative w-full md:w-[60%]">
                        <label for="required-email" class="text-gray-700 mb-2">
                            Catatan
                        </label>
                        <textarea name="catatan" class="flex-1 appearance-none border border-gray-500 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 rounded-lg text-md focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" id="comment" placeholder="Enter your comment" rows="5" cols="40"></textarea>
                    </div>
                    <div class="relative w-full md:w-[60%]">
                        <label for="file_input" class="text-gray-700 mb-2">
                            File
                        </label>
                        <input type="file" name="file" class="flex-1 appearance-none border border-gray-500 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 rounded-lg text-md focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" id="file_input">
                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">PDF, DOCX, TXT, MP4, MKV, PNG, or JPG (Max 300MB).</p>
                    </div>
                    <div class="flex w-full sm:justify-end mt-5">
                        <button type="submit"
                            class="py-2 px-4 flex justify-center items-center w-1/2 sm:w-1/4 bg-red-600 hover:bg-red-700 focus:ring-red-500 focus:ring-offset-red-200 text-white transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg ">
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
        </div>
    </div>
</x-app-layout>