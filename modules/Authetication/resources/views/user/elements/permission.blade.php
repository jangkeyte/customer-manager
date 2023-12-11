@push('styles')
<link href="{{ asset('assets/css/filter_multi_select.css') }}" rel="stylesheet">
@endpush

<div class="form-group">
    <label>Quyền hạn</label> 
    <select id="permission" name="permission[]" class="form-control" multiple></select>
</div>

@push('scripts')
<script type="text/javascript" src="{{ asset('assets/js/filter-multi-select-bundle.min.js') }}"></script>
<script>
    const permission = $('#permission').filterMultiSelect({
        items: [
            @isset($permissions)
                @foreach($permissions as $permission)
                    ["{!! $permission->name !!}","{!! $permission->slug !!}"],
                @endforeach
            @endisset
        ],

        // displayed when no options are selected
        placeholderText: "Chưa có quyền nào",

        // placeholder for search field
        filterText: "Tìm quyền hạn",

        // Select All text
        selectAllText: "Chọn tất cả",

        // Label text
        labelText: "Cấp quyền ",

        // the number of items able to be selected
        // 0 means no limit
        selectionLimit: 0,

        // determine if is case sensitive
        caseSensitive: false,

        // allows the user to disable and enable options programmatically
        allowEnablingAndDisabling: true,
    });

    @if(Route::is('update.user'))
        @isset($permissions)
            @foreach($permissions as $permission)
                @if($user->hasPermissionTo($permission))
                    permission.selectOption("{!! $permission->slug !!}");
                @endif
            @endforeach
        @endisset
    @endif
</script>
@endpush