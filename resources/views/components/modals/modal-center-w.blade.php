@props(['id' => '', 'openModal' => false])
<div 
class="fixed md:flex md:items-center transition-opacity duration-400
top-0 left-0 xl:pl-60 w-full h-screen z-[-1] opacity-0 @if($openModal) open-modal @endif"
id="{{$id}}">
    <div class="absolute top-0 left-0 h-full w-full bg-black opacity-40"></div>
    <div class="container relative z-[2]">
        <div class="max-w-xl mx-auto md:max-h-[600px] md:overflow-y-auto md:rounded-lg bg-white p-4 md:p-6">
            {{$slot}}
        </div>
    </div>
</div>
