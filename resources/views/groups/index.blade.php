<x-app-layout>
    <div class="overflow-auto h-screen pb-24 pt-2 pr-2 pl-2 md:pt-0 md:pr-0 md:pl-0">
        <div class="flex flex-wrap sm:flex-row flex-col w-full gap-5 mt-4 md:mt-0">
            @foreach ($groups as $group)
            <a href="{{ route('groups.show', $group) }}" class="w-full sm:w-[45%] xl:w-[30%]">
                @php
                $hex = '';
                if($group->color == 'yellow'){
                $hex = '#f3c06b';
                }
                if($group->color == 'blue'){
                $hex = '#6da3fb';
                }
                if($group->color == 'purple'){
                $hex = '#a17cf3';
                }
                @endphp
                <div class="flex-shrink-0 relative overflow-hidden bg-{{ $group->color }}-500 rounded-lg w-full shadow-lg">
                    <svg class="absolute bottom-0 left-0 mb-8" viewBox="0 0 375 283" fill="none">
                        <rect x="159.52" y="175" width="152" height="152" rx="8" transform="rotate(-45 159.52 175)"
                            fill="{{ $hex }}">
                        </rect>
                        <rect y="107.48" width="152" height="152" rx="8" transform="rotate(-45 0 107.48)"
                            fill="{{ $hex }}">
                        </rect>
                    </svg>
                    <div class="relative pt-10 px-10 flex items-center justify-center">
                        <div class="block absolute w-48 h-48 bottom-0 left-0 -mb-24 ml-3">
                        </div>
                    </div>
                    <div class="relative text-white px-6 pb-6 mt-6">
                        <span class="block opacity-75 -mb-1">
                            Group
                        </span>
                        <div class="flex justify-between">
                            <span class="block font-semibold text-xl">
                                {{ $group->name }}
                            </span>
                            <span
                                class="bg-white rounded-full text-{{ $group->color }}-500 text-xs font-bold px-3 py-2 leading-none flex items-center">
                                {{ $group->users_count }}
                            </span>
                        </div>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</x-app-layout>