@props(['id' => '', 'name'=> '', 
'answerA' => '', 'answerB' => '', 'answerC' => '', 'answerCorrect' => '' ])
<div class="flex flex-col mb-2 2xl:mb-4" id="card-question-{{$id}}">
    <div class="flex bg-white">
        <div class="w-1 bg-secondary flex-shrink-0"></div>
        <div class="flex-grow p-4 flex items-center">
            <div class="flex-grow">
                <h3 class="text-neutral parrafo title-question">{{$name}}</h3>
            </div>
            <div class="flex-shrink-0 flex gap-2 md:gap-4 ml-4">
                <x-buttons.link-action label="Editar" url="{{route('question.edit', $id)}}" class="edit">
                    <x-slot name="icon">
                        <x-icons.edit />
                    </x-slot>
                </x-buttons.link-action>
                <form method="POST" class="inline-flex formsDelete" action="{{ route('question.destroy', $id) }}">
                    @csrf
                    @method('DELETE')
                    <x-buttons.btn-action type="submit" label="Eliminar" class="delete">
                        <x-slot name="icon">
                            <x-icons.delete />
                        </x-slot>
                    </x-buttons.btn-action>
                </form>
            </div>
        </div>
    </div>
    <div class="bg-white p-4 mt-2">
        <p class="parrafo text-neutral respuesta-a">A - <span>{{$answerA}}</span></p>
        <p class="parrafo text-neutral respuesta-b">B - <span>{{$answerB}}</span></p>
        <p class="parrafo text-neutral respuesta-c">C - <span>{{$answerC}}</span></p>
        <p class="text-secondary btn-font mt-2 respuesta-correcta"><strong>Respuesta correcta:</strong> {{$answerCorrect}}</p>
    </div>
</div>