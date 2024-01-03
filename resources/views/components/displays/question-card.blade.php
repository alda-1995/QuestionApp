<div class="flex flex-col mb-2 2xl:mb-4">
    <div class="flex bg-white">
        <div class="w-1 bg-secondary flex-shrink-0"></div>
        <div class="flex-grow p-4 flex items-center">
            <div class="flex-grow">
                <h3 class="text-neutral parrafo">¿Cual es el mejor post?</h3>
            </div>
            <div class="flex-shrink-0 flex gap-2 md:gap-4 ml-4">
                <x-buttons.btn-secondary label="Editar" id="question" class="edit">
                    <x-slot name="icon">
                        <svg height="20px" width="20px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <title>text-box-edit</title>
                            <path
                                d="M10 19.11L12.11 17H7V15H14V15.12L16.12 13H7V11H17V12.12L18.24 10.89C18.72 10.41 19.35 10.14 20.04 10.14C20.37 10.14 20.7 10.21 21 10.33V5C21 3.89 20.1 3 19 3H5C3.89 3 3 3.89 3 5V19C3 20.11 3.9 21 5 21H10V19.11M7 7H17V9H7V7M21.7 14.35L20.7 15.35L18.65 13.3L19.65 12.3C19.86 12.09 20.21 12.09 20.42 12.3L21.7 13.58C21.91 13.79 21.91 14.14 21.7 14.35M12 19.94L18.06 13.88L20.11 15.93L14.06 22H12V19.94Z" />
                        </svg>
                    </x-slot>
                </x-buttons.btn-secondary>
                <x-buttons.btn-secondary label="Eliminar" id="question" class="delete">
                    <x-slot name="icon">
                        <svg height="20px" width="20px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <title>close</title>
                            <path
                                d="M19,6.41L17.59,5L12,10.59L6.41,5L5,6.41L10.59,12L5,17.59L6.41,19L12,13.41L17.59,19L19,17.59L13.41,12L19,6.41Z" />
                        </svg>
                    </x-slot>
                </x-buttons.btn-secondary>
            </div>
        </div>
    </div>
    <div class="bg-white p-4 mt-2">
        <p class="parrafo text-neutral">A - Lorem ipsum dolor sit amet consectetur, adipisicing elit. Hic quasi vitae voluptate eos at alias ratione ipsum repudiandae sint, totam in optio vero architecto omnis consequuntur. Dolore magnam cumque tempora!</p>
        <p class="parrafo text-neutral">B - Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore, qui.</p>
        <p class="parrafo text-neutral">C - Es una mejor</p>
        <p class="text-secondary btn-font mt-2">Respuesta correcta - A</p>
    </div>
</div>