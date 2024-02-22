@props(['list' => [], 'id' => '', 'name' => '', 'placeholder' => '', 'default' => ''])
<div class="flex flex-col mb-4">
    <select id="{{ $id }}" name="{{ $name }}"
        class="bg-white border-[2px] border-gray-200 text-primary 
        rounded-lg focus:ring-primary outline-none
        focus:border-primary block w-full btn-font
        py-4 pl-4 pr-6 @error($name) border-error @enderror">
        <option {{($default == '') ? 'selected' : '' }} disabled>{{ $placeholder }}</option>
        @if (!empty($list))
            @foreach ($list as $item)
                <option {{ ($default == $item['value']) ? 'selected': '' }}  value="{{ $item['value'] }}">
                    {{ $item['label'] }}
                </option>
            @endforeach
        @endif
    </select>
</div>
