<form method="POST" action="{{ route('register') }}" data-form-register novalidate>
    @csrf
    <div class="relative max-w-[600px] mx-auto min-h-[300px]">
        <div class="absolute top-0 left-0 w-full" id="first-step">
            <h3 class="font-secondary text-neutral mb-4">Comenzemos por tu correo</h3>
            <x-controls.input label="" placeholder="correo@ejemplo.com" type="email" name="email"
                id="email" value="{{ old('email') }}" required autofocus />
            <span data-field-error></span>
            <span class="block text-red-400 mt-4 small" role="alert" id="error-email">
            </span>
            <x-buttons.btn-main type="button" class="mt-4" id="btnFirstStep" label="SIGUIENTE" />
        </div>
        <div class="absolute opacity-0 z-[-1] top-0 left-0 w-full" id="second-step">
            <h3 class="font-secondary text-neutral mb-4">¿Cómo te llamas?</h3>
            <x-controls.input placeholder="Escribe tu nombre completo" type="text"
                name="name" id="name" value="{{ old('name') }}" required autofocus />
            <span class="block text-red-400 mt-4 small" role="alert" id="error-name">
            </span>
            <x-buttons.btn-main type="button" class="mt-4" id="btnSecondStep" label="SIGUIENTE" />
        </div>
        <div class="absolute opacity-0 z-[-1] top-0 left-0 w-full" id="three-step">
            <h3 class="font-secondary text-neutral mb-4">Por favor completa los ultimos campos.</h3>
            <x-controls.input type="password" id="password" name="password" label="Contraseña"
                placeholder="Escribe una contraseña con al menos 8 caracteres" value="{{ old('password') }}" required
                autofocus />
            <span class="block text-red-400 mt-4 mb-2 small" role="alert" id="error-password">
            </span>
            <x-controls.input type="password" id="passwordConfirm" name="password_confirmation"
                placeholder="Repite la misma contraseña" label="Confirmar contraseña"
                value="{{ old('password_confirmation') }}" required autofocus />
            <span class="block text-red-400 mt-4 mb-2 small" role="alert" id="error-password-confirm">
            </span>
            <x-buttons.btn-main type="submit" class="mt-4" id="btnThreeStep" label="GUARDAR" />
        </div>
    </div>
</form>
