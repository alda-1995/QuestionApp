@props(['list' => [], 'id' => '', 'name' => '', 'placeholder' => '', 'selected' => null])
<div class="flex flex-col mb-4">
    @if (isset($label))
        <label for="{{ $id }}" class="block mb-2 btn-font text-primary">{{ $label }}</label>
    @endif
    <select id="{{ $id }}" name="{{ $name }}"
        class="bg-white border-[2px] border-gray-200 text-primary 
        rounded-lg focus:ring-primary outline-none
        focus:border-primary block w-full btn-font
        py-4 px-4  @error($name) error-input @enderror">
        <option selected>{{ $placeholder }}</option>
        @foreach ($list as $item)
            <option value="{{ $item->id }}">
                {{ $item->nombre }}
            </option>
        @endforeach
    </select>
</div>
