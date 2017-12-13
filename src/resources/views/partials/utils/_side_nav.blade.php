@if($side_nav && $side_nav['show'])
<div class="sidebar-wrapper @if($side_nav['theme']=='dark') sidebar-dark @endif" id="sideNav">
    <ul class="sidebar-nav" id="sidebar">
        @foreach($side_nav['buttons'] as $key => $button)
        <li>
            <a href="{!! url($button['route']) !!}"> {!! (isset($button['icon'])) ? $button['icon'] : '' !!}<span class="long-text"> {{ $button['title'] }}</span></a>
        </li>
        @endforeach
    </ul>
</div>
@endif
