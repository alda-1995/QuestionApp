<!-- Navbar -->
<nav class="fixed left-0 right-0 top-0 z-50 w-full">
    <div class="container">
        <div class="flex justify-between items-center h-[90px]">
            <a class="text-primary inline-flex items-center font-base100" href="{{ url('/') }}">
                <span class="inline-block ml-4">Question App</span>
            </a>
            <div class="relative">
                <button aria-expanded="false" data-dropdown-toggle type="button"
                    class="bg-neutral text-white cursor-pointer flex justify-center items-center rounded-full h-[54px] w-[54px] h4">
                    ARS
                </button>
                <div class="absolute hidden right-0 z-50 my-4 list-none 
                    bg-white divide-y min-w-[12rem] divide-gray-100 rounded shadow"
                    id="dropdown-user">
                    <ul>
                        <li>
                            <x-buttons.link-submenu label="Mi perfil" url="login">
                                <x-slot name="icon">
                                    <svg height="20px" width="20px" class="stroke-primary w-6 h-6 transition-all duration-300 group-hover/link:stroke-white"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                </x-slot>
                            </x-buttons.link-submenu>
                        </li>
                        <li>
                            <x-buttons.link-submenu label="Salir" url="logout" id="btnLogout">
                                <x-slot name="icon">
                                    <svg height="20px" width="20px" class="stroke-primary w-6 h-6 transition-all duration-300 group-hover/link:stroke-white"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
                                    </svg>
                                </x-slot>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                    @csrf
                                </form>
                            </x-buttons.link-submenu>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>
