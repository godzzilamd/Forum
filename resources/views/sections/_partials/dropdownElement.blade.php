<a class="dropdown-item" href="javascript:void(0);" data-id="{{$section->id}}" data-type='s'>
    {!! $section->spaces() !!}
    <img src="/{{$section->avatar}}" style="height: 20px; width: 20px;">
    {{ $section->title }}
</a>
@foreach($section->children as $child)
    @include('sections._partials.dropdownElement', ['section' => $child])
@endforeach
