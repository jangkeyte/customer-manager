@isset($submenus)
<li title="{{ $label ?? '' }}" class="menu-item {{ $active ?? '' }}">
    <a href="{{ $url ?? '#' }}"><i class="{{ $icon ?? '' }}"></i> <span class="menu-label">{{ $label ?? '' }}</span></a>
    <ul class="sub-menubar">
    @foreach($submenus as $submenu)
        <x-jangkeyte::menus.sub-item url="{{ $submenu['url'] ?? '#'}}" label="{{ $submenu['label'] ?? '#' }}" />
    @endforeach
    </ul>
</li>
@else
<li class="menu-item has-tooltip {{ $active ?? '' }}" data-original-title="{{ $label ?? '' }}">
    <a href="{{ $url ?? '#' }}"><i class="{{ $icon ?? '' }}"></i> <span class="menu-label">{{ $label ?? '' }}</span></a>
</li>
@endisset