<div class="fixed md:flex md:items-center transition-opacity duration-400
top-0 left-0 xl:pl-60 w-full h-screen z-[-1] opacity-0" id="modalQuestion">
    <div class="absolute top-0 left-0 h-full w-full bg-black opacity-40"></div>
    <div class="container relative z-[2]">
        <div class="max-w-xl mx-auto md:max-h-[600px] md:overflow-y-auto md:rounded-lg bg-white p-4 md:p-6">
            <x-controls.input type="text" name="nombre_pregunta" placeholder="Escribe una pregunta"
                value="{{ old('nombre_pregunta') }}" required autofocus />
            <h3 class="text-neutral font-base200 mb-4">Respuestas</h3>
            <div class="flex flex-col w-full">
                <form method="POST" id="formQuestion" novalidate>
                    <div class="w-full">
                        <x-controls.input type="text" name="respuesta_a" placeholder="Escribe la respuesta A"
                            value="{{ old('respuesta_a') }}" required autofocus />
                        <x-controls.input type="text" name="respuesta_b" placeholder="Escribe la respuesta B"
                            value="{{ old('respuesta_b') }}" required autofocus />
                        <x-controls.input type="text" name="respuesta_c" placeholder="Escribe la respuesta C"
                            value="{{ old('respuesta_c') }}" required autofocus />
                    </div>
                    <p class="parrafo text-neutral mb-4">¿Cuál es la respuesta correcta?</p>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 md:gap-6">
                        <x-controls.radio-control name="respuesta_correcta" id="resp_correct_1" value="a"
                            label="(A)" />
                        <x-controls.radio-control name="respuesta_correcta" id="resp_correct_2" value="b"
                            label="(B)" />
                        <x-controls.radio-control name="respuesta_correcta" id="resp_correct_3" value="c"
                            label="(C)" />
                    </div>
                    <x-buttons.btn-main label="Agregar" type="Submit" class="mt-2" />
                </form>
            </div>
        </div>
    </div>
</div>
