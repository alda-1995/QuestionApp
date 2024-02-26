@props(['error' => '', 'sizeFont' => '' ])
<span class="block text-red-400 @if($sizeFont !== '') {{$sizeFont}} @else small @endif" role="alert">
    <strong>{{ $error }}</strong>
</span>