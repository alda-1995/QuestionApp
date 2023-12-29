@props(['url' => '', 'label' => '', 'btnClass' => 'btn-primary'])

<a href="{{ route($url) }}" class="link-text">
    <div class="mr-2">
        <svg xmlns="http://www.w3.org/2000/svg" height="20px" width="20px" class="w-6 h-6" viewBox="0 0 24 24">
            <title>login</title>
            <path
                d="M11 7L9.6 8.4L12.2 11H2V13H12.2L9.6 15.6L11 17L16 12L11 7M20 19H12V21H20C21.1 21 22 20.1 22 19V5C22 3.9 21.1 3 20 3H12V5H20V19Z" />
        </svg>
    </div>
    {{ $label }}
</a>
