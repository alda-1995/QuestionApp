<!-- Sidenav -->
<nav id="sidenav"
    class="fixed left-0 top-0 z-[1035] h-screen w-60 -translate-x-full xl:translate-x-0 
    overflow-hidden bg-white shadow-[0_4px_12px_0_rgba(0,0,0,0.07),_0_2px_4px_rgba(0,0,0,0.05)]">
    <div class="mb-3 px-6 flex items-center py-6 outline-none font-base100 font-medium text-primary">
        <span class="inline-block">Menú</span>
    </div>
    <ul class="relative list-none pb-6">
        <li class="px-6">
            <p class="text-gray-400 small mb-2">General</p>
        </li>
        <li>
            <x-general.menu-item label="Inicio" url="home">
                <x-slot name="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" class="fill-gray-500" height="20px" width="20px" viewBox="0 0 24 24">
                        <title>view-dashboard</title>
                        <path d="M13,3V9H21V3M13,21H21V11H13M3,21H11V15H3M3,13H11V3H3V13Z" />
                    </svg>
                </x-slot>
            </x-general.menu-item>
        </li>
        <li>
            <x-general.menu-item label="Dashboard" url="dashboard">
                <x-slot name="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" class="fill-gray-500" height="20px" width="20px" viewBox="0 0 24 24">
                        <title>view-dashboard</title>
                        <path d="M13,3V9H21V3M13,21H21V11H13M3,21H11V15H3M3,13H11V3H3V13Z" />
                    </svg>
                </x-slot>
            </x-general.menu-item>
        </li>
        <li>
            <x-general.menu-item label="Tests" url="test">
                <x-slot name="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" class="fill-gray-500" height="20px" width="20px"
                        viewBox="0 0 24 24">
                        <title>help</title>
                        <path
                            d="M10,19H13V22H10V19M12,2C17.35,2.22 19.68,7.62 16.5,11.67C15.67,12.67 14.33,13.33 13.67,14.17C13,15 13,16 13,17H10C10,15.33 10,13.92 10.67,12.92C11.33,11.92 12.67,11.33 13.5,10.67C15.92,8.43 15.32,5.26 12,5A3,3 0 0,0 9,8H6A6,6 0 0,1 12,2Z" />
                    </svg>
                </x-slot>
            </x-general.menu-item>
        </li>
        <li>
            <a class="link-menu group/link" href="{{ route('logout') }}"
                onclick="event.preventDefault();
    document.getElementById('logout-form').submit();">
                <div class="flex mr-2">
                    <svg class="stroke-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
                    </svg>
                </div>
                Salir
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                    @csrf
                </form>
            </a>
        </li>
    </ul>
</nav>
