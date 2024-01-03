<div class="flex flex-col mb-4">
    @if (isset($infoRequired))
        <div class="flex justify-end">
            <p class="small mb-2 text-gray-500 text-[12px]">{{ $infoRequired ? '(Requerido)' : '(Opcional)' }}</p>
        </div>
    @endif
    @if (isset($label))
        <label for="{{ $name }}" class="block mb-2 btn-font text-primary">{{ $label }}</label>
    @endif
    <textarea value="{{ old($name, $value) }}"
        class="bg-white border-[2px] border-gray-200 text-primary 
        rounded-lg focus:ring-primary outline-none
        focus:border-primary block w-full btn-font max-h-[200px] min-h-[200px]
        py-4 px-4  @error($name) error-input @enderror"
        id="{{ $id }}" name="{{ $name }}" wrap="hard" placeholder="{{ $placeholder }}"
        @if ($required) required @endif @if ($autofocus) autofocus @endif></textarea>
    @error($name)
        <span class="block text-red-400 mt-4 small" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
