<nav class="fixed top-0 left-0 w-full z-50">
    <div class="container">
        <div class="flex justify-end items-center h-[90px]">
            <x-buttons.link-icon url="{{ route('login') }}" label="INICIAR SESION">
                <x-slot name="icon">
                    <x-icons.login />
                </x-slot>
            </x-buttons.link-icon>
        </div>
    </div>
</nav>