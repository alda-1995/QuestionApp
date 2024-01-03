@props(['label' => '', 'name' => '', 'id' => '', 'value' => '',
'type' => '', 'required' => false, 'autofocus' => false, 'placeholder' => ''])
<div class="flex flex-col mb-4">
    @if (isset($infoRequired))
    <div class="flex justify-end">
        <p class="small mb-2 text-gray-500 text-[12px]">{{ $infoRequired ? '(Requerido)' : '(Opcional)' }}</p>
    </div>
    @endif
    @if (isset($label))
    <label for="{{ $name }}" class="block mb-2 btn-font text-primary">{{ $label }}</label>
    @endif
    <input type="{{ $type }}" id="{{ $id }}" name="{{ $name }}"
        class="bg-white border-[2px] border-gray-200 text-primary 
        rounded-lg focus:ring-primary outline-none
        focus:border-primary block w-full btn-font
        py-4 px-4  @error($name) error-input @enderror"
        value="{{ old($name, $value) }}" @if ($required) required @endif
        @if ($autofocus) autofocus @endif placeholder="{{$placeholder}}">
    @error($name)
        <span class="block text-red-400 mt-4 small" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
