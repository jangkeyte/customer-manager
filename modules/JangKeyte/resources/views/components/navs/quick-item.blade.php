@auth
    @if( $right == '' || auth()->user()->can( $right ) )
        <div class="quick-link-item"><a href="{{ $url ?? '#' }}"><i class="{{ $icon ?? '' }}"></i> <span>{{ $label }}</span></a></div>
    @endif
@endauth