@inject('cal', 'App\Services\CalendarService')
@section('style')
    <style>
        .calendar {
        display: flex;
        position: relative;
        padding: 16px;
        margin: 0 auto;
        max-width: 400px;
        background: white;
        border-radius: 20px;
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
        
        .month-year {
        position: absolute;
        bottom:70px;
        right: -35px;
        font-size: 2rem;
        line-height: 1;
        font-weight: 300;
        color: #94A3B8;
        transform: rotate(90deg);
        -webkit-transform: rotate(90deg);
        -moz-transform: rotate(90deg);
        -ms-transform: rotate(90deg);
        }
        
        .year {
        margin-left: 4px;
        color: #CBD5E1;
        }
        
        .days {
        display: flex;
        flex-wrap: wrap;
        flex-grow: 1;
        margin-right: 46px;
        }
        
        .day-label {
        position: relative;
        flex-basis: calc(14.286% - 2px);
        margin: 1px 1px 12px 1px;
        font-weight: 700;
        font-size: 0.65rem;
        text-transform: uppercase;
        color: #1E293B;
        }
        
        .day {
        position: relative;
        flex-basis: calc(14.286% - 2px);
        margin: 1px;
        border-radius: 999px;
        cursor: pointer;
        font-weight: 300;
        }
        
        .day.dull {
        color: #94A3B8;
        }
        
        .day.today {
        color: #e8f7ff;
        font-weight: 600;
        background-color: #0EA5E9
        }
        
        .day::before {
        content: '';
        display: block;
        padding-top: 100%;
        }
        
        .day:hover {
        background: #E0F2FE;
        }
        
        .day .content {
        position: absolute;
        top: 0;
        left: 0;
        height: 100%;
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        }
    </style>
@endsection
<x-app-layout>
    <div class="overflow-auto h-screen pb-24 pt-2 pr-2 pl-2 md:pt-0 md:pr-0 md:pl-0">
        <div class="flex flex-col sm:flex-row flex-wrap gap-5">

            <div class="w-full sm:w-1/2 lg:w-[45%] ">
                <div
                    class="shadow-lg rounded-2xl p-4 bg-white dark:bg-gray-700 gap-8 flex flex-wrap flex-col justify-start">
                    <div class="flex w-full justify-between">
                        <div class="">
                            <h2 class="font-semibold text-xl">Absen Hari Ini</h2>
                            <p class="text-sm text-slate-400">
                                {{ \Carbon\Carbon::now()->format('D, d-M-Y') }}
                            </p>
                        </div>
                        <div class="flex flex-col gap-1">
                            @if ($sesi_aktif)
                            <span
                                class="px-2 py-1 h-fit flex items-center font-semibold text-xs rounded-md  text-red-400 border border-red-400  bg-white">
                                {{ $sesi_aktif->count() }} SESI AKTIF
                            </span>
                            @endif
                            @if ($absen)
                                <span
                                    class="px-2 py-1 h-fit flex items-center font-semibold text-xs rounded-md  text-purple-500 border border-purple-500  bg-white">
                                    SUBMITTED
                                </span>
                            @endif
                        </div>

                    </div>
                    <div class="w-full">
                        <form action="{{ route('absens.store') }}" method="post"
                            class="flex flex-col md:flex-row w-full md:space-x-3 space-y-3 md:space-y-0">
                            @csrf
                            @method('POST')
                            <div class=" relative ">
                                <input type="email" id="" name="confirm"
                                    class=" rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                                    placeholder="Email anda" />
                            </div>
                            <button
                                class="flex-shrink-0 px-4 py-2 text-base font-semibold text-white bg-purple-600 rounded-lg shadow-md hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 focus:ring-offset-purple-200"
                                type="submit">
                                Confirm
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="w-full sm:w-1/2 xl:w-1/3">
                {!! $cal->calendar() !!}

            </div>

        </div>
    </div>
</x-app-layout>