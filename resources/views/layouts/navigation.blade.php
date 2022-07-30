<nav class="mt-6">
    <div>
        <x-responsive-side-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
            <span class="text-left">
                <svg width="20" height="20" fill="currentColor" viewBox="0 0 2048 1792"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M1070 1178l306-564h-654l-306 564h654zm722-282q0 182-71 348t-191 286-286 191-348 71-348-71-286-191-191-286-71-348 71-348 191-286 286-191 348-71 348 71 286 191 191 286 71 348z">
                    </path>
                </svg>
            </span>
            <span class="mx-4 sm:hidden text-sm font-normal md:block">
                Dashboard
            </span>
        </x-responsive-side-nav-link>
        <x-responsive-side-nav-link :href="route('penugasan.index')" :active="request()->routeIs('penugasan.*')">
            <span class="text-left">
                <i class="fa-solid fa-book"></i>
            </span>
            <span class="mx-4 text-sm font-normal sm:hidden md:block">
                Penugasan
            </span>
        </x-responsive-side-nav-link>
        <x-responsive-side-nav-link :href="route('event_days.index')" :active="request()->routeIs('event_days.*')">
            <span class="text-left">
                <i class="fa-solid fa-calendar-days"></i>
            </span>
            <span class="mx-4 sm:hidden text-sm font-normal md:block">
                Kegiatan
            </span>
        </x-responsive-side-nav-link>
        <x-responsive-side-nav-link :href="route('groups.index')" :active="request()->routeIs('groups.*')">
            <span class="text-left">
                <i class="fa-solid fa-user-group"></i>
            </span>
            <span class="mx-4 sm:hidden text-sm font-normal md:block">
                Peserta
            </span>
        </x-responsive-side-nav-link>
        <x-responsive-side-nav-link :href="route('absens.index')" :active="request()->routeIs('absens.*')">
            <span class="text-left">
                <i class="fa-solid fa-list-check"></i>
            </span>
            <span class="mx-4 sm:hidden text-sm font-normal md:block">
                Absensi
            </span>
        </x-responsive-side-nav-link>
    </div>
</nav>