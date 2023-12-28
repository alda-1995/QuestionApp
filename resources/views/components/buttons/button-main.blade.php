@props(['type' => 'button', 'label' => ''])
<button
  type="{{ $type }}"
  class="btn {{ $btnClass }}">
  {{ $label }}
</button>