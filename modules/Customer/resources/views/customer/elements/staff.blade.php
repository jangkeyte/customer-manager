@push('styles')
<link href="{{ asset('assets/css/filter_multi_select.css') }}" rel="stylesheet">
@endpush

@isset($danh_sach_nhan_vien)
@php $staffs = $danh_sach_nhan_vien @endphp
@endisset

@isset($staffs)
<div class="input-group has-validation">
        <label class="input-group-text" for="nhan_vien"><i class="fa-solid fa-people-arrows"></i></label>  
        <div class="form-floating is-invalid">
            <select class="form-select" name="nhan_vien[]" id="nhan_vien"></select>
        </div>
    </div>
</div>
@endisset

@push('scripts')
<script type="text/javascript" src="{{ asset('assets/js/filter-multi-select-bundle.min.js') }}"></script>
<script>
    const staff = $('#nhan_vien').filterMultiSelect({
        items: [
            @isset($staffs)
                @foreach($staffs as $key => $value)
                    ["{!! $value !!}","{!! $key !!}"],
                @endforeach
            @endisset
        ],

        // displayed when no options are selected
        placeholderText: "Chưa có nhân viên nào",

        // placeholder for search field
        filterText: "Tìm nhân viên",

        // Select All text
        selectAllText: "Chọn tất cả",

        // Label text
        labelText: "Người phụ trách ",

        // the number of items able to be selected
        // 0 means no limit
        selectionLimit: 1,

        // determine if is case sensitive
        caseSensitive: false,

        // allows the user to disable and enable options programmatically
        allowEnablingAndDisabling: true,
    });

</script>
@endpush