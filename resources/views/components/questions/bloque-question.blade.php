<div class="py-16 md:pt-36 md:pb-28 lg:min-h-screen">
    <div class="container">
        <div class="flex flex-col items-center text-center max-w-[600px] mx-auto">
            <h2 class="text-secondary font-secondary mb-4">Si un tren viaja de una ciudad a otra a 60 millas por hora y tarda 3 horas en llegar</h2>
            <p class="text-neutral font-base100">¿Qué preferirías hacer en tu tiempo libre?</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 md:gap-6 mt-8 md:max-w-[800px] md:mx-auto">
            <x-controls.radio-control 
            name="question-1"
            id="question-control1"
            value="a"
            label="Leer libros de ciencia ficción."
            />
            <x-controls.radio-control 
            name="question-1"
            id="question-control2"
            value="b"
            label="Practicar deportes extremos."
            />
            <x-controls.radio-control 
            name="question-1"
            id="question-control3"
            value="c"
            label="Participar en debates filosóficos."
            />
        </div>
        <div class="mt-8 flex justify-center">
            <x-buttons.link-primary label="Confirmar respuesta" url="home" />
        </div>
    </div>
</div>