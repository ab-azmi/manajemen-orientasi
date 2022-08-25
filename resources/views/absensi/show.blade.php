<x-app-layout>
    <div class="overflow-auto h-screen pb-24 pt-2 pr-2 pl-2 md:pt-0 md:pr-0 md:pl-0">
        <div class="w-full">
            {{ Breadcrumbs::render() }}
        </div>
        <div
            class="max-w-screen-xl {{ $absen->status == 1 ? 'bg-green-500' : 'bg-red-500' }} dark:bg-gray-800 px-4 py-12 mx-auto sm:py-16 sm:px-6 lg:px-8 lg:py-20">
            <div class="max-w-4xl mx-auto text-center">
                <h2 class="text-3xl font-extrabold leading-9 text-white sm:text-4xl sm:leading-10">
                    {{ $absen->name }}
                </h2>
                <p class="mt-3 text-base leading-7 sm:mt-4 text-white">
                    Event : {{ $absen->event->name }}
                </p>
            </div>
            <div class="mt-10 text-center sm:max-w-3xl sm:mx-auto sm:grid sm:grid-cols-3 sm:gap-8">
                <div>
                    <p class="text-5xl font-extrabold leading-none text-white">
                        {{ \Carbon\Carbon::parse($absen->date_absen)->format('l') }}
                    </p>
                    <p class="mt-2 text-base font-medium leading-6 text-white">
                        {{ \Carbon\Carbon::parse($absen->date_absen)->format('d-F-Y') }}
                    </p>
                </div>
                <div class="mt-10 sm:mt-0">
                    <p class="text-5xl font-extrabold leading-none text-white">
                        {{
                        \Carbon\Carbon::parse($absen->waktu_mulai)->diff(\Carbon\Carbon::parse($absen->waktu_selesai))->format('%H:%i
                        jam') }}
                    </p>
                    <p class="mt-2 text-base font-medium leading-6 text-white">
                        {{ \Carbon\Carbon::parse($absen->waktu_mulai)->format('H:i') }} sampai
                        {{ \Carbon\Carbon::parse($absen->waktu_selesai)->format('H:i') }}
                    </p>
                </div>
                <div class="mt-10 sm:mt-0">
                    <p class="text-5xl font-extrabold leading-none text-white">
                        24 hours
                    </p>
                    <p class="mt-2 text-base font-medium leading-6 text-white">
                        Average turnaround
                    </p>
                </div>
            </div>
            <div class="w-52 mx-auto mt-4 p-4 flex">
                <button type="button"
                    class="py-2 px-4  bg-gradient-to-r {{ $absen->status == 1 ? 'bg-green-400' : 'bg-red-400' }} to-green-400 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2 ">
                    {{ $absen->status == 1 ? 'Active' : 'Inactive' }}
                </button>
            </div>
        </div>
        <div class="container mt-3">
            <div class="flex flex-row mb-1 sm:mb-0 justify-between w-full">
                <div class="text-end">
                    <form
                        class="flex flex-col md:flex-row w-3/4 md:w-full max-w-sm md:space-x-3 space-y-3 md:space-y-0 justify-center">
                        <div class=" relative ">
                            <input type="text" id="&quot;form-subscribe-Filter"
                                class=" rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                                placeholder="name" />
                        </div>
                        <button
                            class="flex-shrink-0 px-4 py-2 text-base font-semibold text-white bg-purple-600 rounded-lg shadow-md hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 focus:ring-offset-purple-200"
                            type="submit">
                            Filter
                        </button>
                    </form>
                </div>
            </div>
            <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                    <table class="min-w-full leading-normal">
                        <thead>
                            <tr>
                                <th scope="col"
                                    class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
                                    User
                                </th>
                                <th scope="col"
                                    class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
                                    Email
                                </th>
                                <th scope="col"
                                    class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
                                    Time Absensi
                                </th>
                                <th scope="col"
                                    class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
                                    Status
                                </th>
                                <th scope="col"
                                    class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0">
                                            <a href="#" class="block relative">
                                                <img alt="profil" src="https://picsum.photos/id/{{ $user->id }}/300/300"
                                                    class="mx-auto object-cover rounded-full h-10 w-10 " />
                                            </a>
                                        </div>
                                        <div class="ml-3">
                                            <p class="text-gray-900 whitespace-no-wrap">
                                                {{ $user->name }}
                                            </p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <p class="text-gray-900 whitespace-no-wrap">
                                        {{ $user->email }}
                                    </p>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <p class="text-gray-900 whitespace-no-wrap">
                                        @if ($user->absens->where('sesi_absensi_id', $absen->id)->first())
                                            {{ $user->absens->where('sesi_absensi_id', $absen->id)->first()->time_absen }}
                                        @else
                                            -
                                        @endif
                                    </p>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    @if ($user->absens->where('sesi_absensi_id', $absen->id)->first())
                                    <span
                                        class="relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight">
                                        <span aria-hidden="true"
                                            class="absolute inset-0 bg-green-200 opacity-50 rounded-full">
                                        </span>
                                        <span class="relative">
                                            present
                                        </span>
                                    </span>
                                    @else
                                    <span
                                        class="relative inline-block px-3 py-1 font-semibold text-red-900 leading-tight">
                                        <span aria-hidden="true"
                                            class="absolute inset-0 bg-red-200 opacity-50 rounded-full">
                                        </span>
                                        <span class="relative">
                                            none
                                        </span>
                                    </span>
                                    @endif

                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <a href="#" class="text-indigo-600 hover:text-indigo-900">
                                        Edit
                                    </a>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                    <div class="px-5 bg-white py-5 flex flex-col xs:flex-row items-center xs:justify-between">
                        <div class="flex items-center">
                            <button type="button"
                                class="w-full p-4 border text-base rounded-l-xl text-gray-600 bg-white hover:bg-gray-100">
                                <svg width="9" fill="currentColor" height="8" class="" viewBox="0 0 1792 1792"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M1427 301l-531 531 531 531q19 19 19 45t-19 45l-166 166q-19 19-45 19t-45-19l-742-742q-19-19-19-45t19-45l742-742q19-19 45-19t45 19l166 166q19 19 19 45t-19 45z">
                                    </path>
                                </svg>
                            </button>
                            <button type="button"
                                class="w-full px-4 py-2 border-t border-b text-base text-indigo-500 bg-white hover:bg-gray-100 ">
                                1
                            </button>
                            <button type="button"
                                class="w-full px-4 py-2 border text-base text-gray-600 bg-white hover:bg-gray-100">
                                2
                            </button>
                            <button type="button"
                                class="w-full px-4 py-2 border-t border-b text-base text-gray-600 bg-white hover:bg-gray-100">
                                3
                            </button>
                            <button type="button"
                                class="w-full px-4 py-2 border text-base text-gray-600 bg-white hover:bg-gray-100">
                                4
                            </button>
                            <button type="button"
                                class="w-full p-4 border-t border-b border-r text-base  rounded-r-xl text-gray-600 bg-white hover:bg-gray-100">
                                <svg width="9" fill="currentColor" height="8" class="" viewBox="0 0 1792 1792"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M1363 877l-742 742q-19 19-45 19t-45-19l-166-166q-19-19-19-45t19-45l531-531-531-531q-19-19-19-45t19-45l166-166q19-19 45-19t45 19l742 742q19 19 19 45t-19 45z">
                                    </path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>