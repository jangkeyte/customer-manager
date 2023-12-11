@push('styles')
<link href="{{ asset('assets/css/filter_multi_select.css') }}" rel="stylesheet">
@endpush

@isset($roles)
<div class="form-group">
    <label>Vai trò</label> 
    <select class="form-control" id="role" name="role[]" multiple></select>
</div>
@endisset

@push('scripts')
<script type="text/javascript" src="{{ asset('assets/js/filter-multi-select-bundle.min.js') }}"></script>
<script>
    const role = $('#role').filterMultiSelect({
        items: [
            @isset($roles)
                @foreach($roles as $role)
                    ["{!! $role['name'] !!}","{!! $role['id'] !!}"],
                @endforeach
            @endisset
        ],

        // displayed when no options are selected
        placeholderText: "Chưa có vai trò nào",

        // placeholder for search field
        filterText: "Tìm vai trò",

        // Select All text
        selectAllText: "Chọn tất cả",

        // Label text
        labelText: "Chức vụ ",

        // the number of items able to be selected
        // 0 means no limit
        selectionLimit: 1,

        // determine if is case sensitive
        caseSensitive: false,

        // allows the user to disable and enable options programmatically
        allowEnablingAndDisabling: true,
    });

    @isset($user->roles)
        @foreach($user->roles as $role)
            role.selectOption({!! $role->id !!});
        @endforeach
    @endisset
</script>
@endpush