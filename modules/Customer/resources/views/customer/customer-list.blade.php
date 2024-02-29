@extends('Customer::master')

@section('title', 'Danh sách khách hàng')

@section('entry_content')
    <style>
        .datatable-column-filter-button {
            cursor: pointer;
        }

        button.datatable-column-filter-button {
            padding: 6px 12px;
        }

        /* Menu */

        .datatable-column-filter-wrapper {
            position: absolute;
        }

        .datatable-column-filter-menu {
            background: #fff none repeat scroll 0 0;
            border-radius: 3px;
            margin: 0;
            min-width: 220px;
            padding: 5px 0;
            box-shadow: 0px 0px 10px 2px #aaa;
        }

        .datatable-column-filter-menu > li {
            list-style: none;
        }

        .datatable-column-filter-menu > li, .datatable-column-filter-menu > li > label {
            cursor: pointer;
        }
    </style>

    {{-- @include('Customer::customer.partials.customer-search-form') --}}

    <p>Khách hàng [{{-- $customers->total()  --}}] 
        <button id="btnHide" class="btn btn-sm btn-outline-primary" style="float:right">Thu gọn</button>
        <a href="{{ route( substr(Route::current()->getPrefix(), 1) . '.create' ) }}" class="btn btn-sm btn-outline-success mx-2" style="float:right"><i class="fa fa-user-plus"></i> Tạo mới</a>
    </p>

    <button id="add">Tải thêm 1000 Khách</button>

    @isset($customers)
        <div id="customer_list_content" class="table-responsive w-100" style="min-height: 400px;">
            <table id="demo-table" class="table table-sm table-hover text-nowrap"></table>
        </div>
        <strong>Column Visibility</strong>
        <div class="form-group" id="columns"></div>
        <button id="print">Print</button>
    
        @push('scripts')
        <script type="module">

            import {DataTable, addColumnFilter} from "/assets/js/simpledatatable.js"

            let rowNumber = 0;

            /*
            const generateTable = columns => {
                const tableData = {
                    headings: [],
                    data: []
                }

                columns.forEach(colum => tableData.headings.push(colum || ""))

                for (let i = 0; i < 100; i++) {
                    const machineType = machineTypeIcons[Math.floor(Math.random() * machineTypeIcons.length)].name
                    tableData.data.push([
                        `Machine ${i}`,
                        `${getMachineTypeIcon(machineType)} <span>${machineType}</span>`,
                        `OEM ${i}`,
                        `${new Date(+new Date() - Math.floor(Math.random() * 2592000000)).toISOString().slice(0, 19).replace("T", " ")}`
                    ])
                }
                return tableData
            }
            */

            // Tùy chỉnh các columns
            const columnData = [
                {
                    select: 10,
                    type: "date",
                    format: "DD/MM/YYYY",
                    sort: "desc"
                }
            ]
            
            // Tùy chỉnh các labels
            const labelData = {
                placeholder: "Tìm Khách hàng...",
                searchTitle: "Tìm kiếm Khách hàng",
                perPage: " khách hàng mỗi trang",
                noRows: "Không có khách hàng nào",
                info: "Đang hiển thị {start} đến {end} trong tổng {rows} Khách hàng (Trang {page}/{pages})"
            }

            // Tùy chỉnh các classes
            const classData = {
                active: "active",
                disabled: "disabled",
                selector: "form-select",
                paginationList: "pagination",
                paginationListItem: "page-item",
                paginationListItemLink: "page-link"
            }

            // Instantiate
            fetch("/api/khachhang")
                .then(response => response.json()
            ).then(data => {
                    if (!data || !data.length) {
                        return
                    }
                    
                    rowNumber += 1000;

                    let obj = {
                        // Thêm nhanh tiêu đề cho table
                        headings: [
                            "0 Stt", "1 Mã khách hàng", "2 Tên khách hàng", "3 Giới tính", "4 Địa chỉ", "5 Số điện thoại", "6 Cách lấy số", "7 Nguồn khách","8 Kênh liên hệ","9 Loại khách","10 Ngày nhập","11 Thời gian nhận","12 Thời gian chuyển","13 Người chuyển","14 Loại xe","15 Màu xe","16 Số khung","17 Số máy","18 Nhân viên","19 Cửa hàng","20 Nhu cầu","21 Thông tin liên hệ","22 Tình trạng","23 Ghi chú","24 Thời gian xóa","25 Thời gian tạo","26 Thời gian cập nhật","27 Nguồn khách","28 Kênh liên hệ","29 Tình trạng","30 Nhân viên","31 CSKH"
                        ],

                        // Tạo mảng dữ liệu rỗng
                        data: []
                    };

                    // Lặp lại các đối tượng để nhận các giá trị
                    for ( let i = 0; i < data.length; i++ ) {

                        obj.data[i] = [];
                        let customer_uid = 0;
                        for (let p in data[i]) {
                            // Kiểm tra có phải là đối tượng không
                            if(typeof data[i][p] === 'object' && data[i][p] !== null) {
                                if(!Array.isArray(data[i][p])) {
                                    // Không phải là mảng trong đối tượng
                                    if( Object.hasOwn(data[i][p], 'ten_nhan_vien') ) {
                                        obj.data[i].push(data[i][p].ten_nhan_vien);
                                    } else if( Object.hasOwn(data[i][p], 'name') ) {
                                        obj.data[i].push(data[i][p].name);
                                    } else {
                                        obj.data[i].push("Không có dữ liệu");
                                    }
                                } else {
                                    // Nếu là mảng trong đối tượng
                                    let cskhData = '';
                                    for ( let j = 0; j < data[i][p].length; j++ ) {
                                        if( j > 0 ) { 
                                            cskhData +=  '<br>'; 
                                        }
                                        cskhData += '[' + data[i][p][j].ngay_thuc_hien + '] ' + data[i][p][j].noi_dung;
                                    }
                                    obj.data[i].push(cskhData);
                                } 
                            } else if( data[i].hasOwnProperty(p) ){
                                if(p === 'so_dien_thoai') {
                                    obj.data[i].push( data[i][p].replace( data[i][p].substr(4, 3), "***") );
                                } else if(p === 'ma_khach_hang') {
                                    customer_uid = data[i][p];
                                    obj.data[i].push(data[i][p]);
                                } else if(p === 'ten_khach_hang') {
                                    obj.data[i].push("<a href='/carelog/create/" + customer_uid + "' class='link'>" + data[i][p] + "</a>");
                                } else {
                                    obj.data[i].push(data[i][p]);
                                }
                            } else {
                                obj.data[i].push("Không có dữ liệu");
                            }
                        }
                    }

                    const datatable = new window.simpleDatatables.DataTable("#demo-table", {
                        data: obj,
                        perPage: 20,
                        perPageSelect: [5, 10, 20, 30, ["Tất cả", -1]],
                        columns: columnData,
                        labels: labelData,
                        classes: classData,
                        template: options => `<div class='${options.classes.top} fixed-table-toolbar'>
                            ${
                            options.paging && options.perPageSelect ?
                                `<div class='${options.classes.dropdown} bs-bars float-left'>
                                    <label>
                                        <select class='${options.classes.selector}'></select>
                                    </label>
                                </div>` : ""
                            }
                            ${
                            options.searchable ?
                                `<div class='${options.classes.search} float-right search btn-group'>
                                    <input class='${options.classes.input} form-control search-input' placeholder='Tìm kiếm' type='search' title='Tìm trong bảng'>
                                </div>` : ""
                            }
                        </div>
                        <div class='${options.classes.container}'${options.scrollY.length ? ` style='height: ${options.scrollY}; overflow-Y: auto;'` : ""}></div>
                        <div class='${options.classes.bottom}'>
                            ${
                            options.paging ?
                                `<div class='${options.classes.info}'></div>` :
                                ""
                            }
                            <nav class='${options.classes.pagination}'></nav>
                        </div>`,
                        tableRender: (_data, table, _type) => {
                            // We ignore type ('main', 'print', 'header', 'message')
                            const thead = table.childNodes[0]
                            thead.childNodes[0].childNodes.forEach(th => {
                                if (!th.attributes) {
                                    th.attributes = {}
                                }
                                th.attributes.scope = "col"
                                const innerHeader = th.childNodes[0]
                                if (!innerHeader.attributes) {
                                    innerHeader.attributes = {}
                                }
                                let innerHeaderClass = innerHeader.attributes.class ? `${innerHeader.attributes.class} th-inner` : "th-inner"

                                if (innerHeader.nodeName === "a") {
                                    innerHeaderClass += " sortable sortable-center both"
                                    if (th.attributes.class?.includes("desc")) {
                                        innerHeaderClass += " desc"
                                    } else if (th.attributes.class?.includes("asc")) {
                                        innerHeaderClass += " asc"
                                    }
                                }
                                innerHeader.attributes.class = innerHeaderClass
                            })

                            return table
                        },
                        tableRender: (_data, table, type) => {
                            if (type === "print") {
                                return table
                            }
                            const tHead = table.childNodes[0]
                            const filterHeaders = {
                                nodeName: "TR",
                                childNodes: tHead.childNodes[0].childNodes.map(
                                    (_th, index) => ({nodeName: "TH",
                                        childNodes: [
                                            {
                                                nodeName: "INPUT",
                                                attributes: {
                                                    class: "datatable-input",
                                                    type: "search",
                                                    "data-columns": `[${index}]`
                                                }
                                            }
                                        ]})
                                )
                            }
                            tHead.childNodes.push(filterHeaders)
                            return table
                        },
                    })

                    // Kiểm tra ẩn các cột theo vai trò người dùng
                    @if( auth()->user()->hasRole('user','guest') )
                        datatable.columns.hide([19,30]);
                    @elseif( auth()->user()->hasRole('leader') )
                        datatable.columns.hide([19]);
                    @endif

                    // Sắp xếp lại thứ tự các cột
                    datatable.columns.order([2,4,5,27,28,10,29,19,30,31]);

                    // Xử lý sự kiện click nút
                    datatable.dom.addEventListener("click", e => {
                        if (e.target.nodeName === "BUTTON" && e.target.hasAttribute("data-id")) {
                            const index = parseInt(e.target.getAttribute("data-id"), 10)
                            const row = datatable.data.data[index].cells
                            let message = [
                                "This is row ",
                                (e.target.closest("tr").rowIndex + 1), " of ",
                                datatable.options.perPage, " rendered rows and row ",
                                (index + 1), " of ",
                                datatable.data.length, " total rows."
                            ]
                            const data = [].slice.call(row).map(cell => cell.data)
                            message = message.join("")
                            message = `${message}\n\nThe row data is:\n${JSON.stringify(data)}`
                            alert(message)
                        }
                    })

                    window.simpleDatatables.columnFilter = addColumnFilter(
                        datatable,
                        {
                            
                        }
                    )
                })

                document.getElementById("add").addEventListener("click", _event => {
                    
                    // Instantiate
                    fetch("/api/khachhang/1000/" + rowNumber)
                        .then(response => response.json()
                    ).then(data => {
                        if (!data || !data.length) {
                            return
                        }
                        rowNumber += 1000;
                        console.log(data[0])
                    });

                    datatable.insert({
                        data: structuredClone(datatable.options.data.data)
                    })
                })

                jQuery(document).ready(function($) {
                    $(".clickable-row").click(function() {
                        window.location = $(this).data("href");
                    });
                });

            </script>

            <script>
                const btnHide = document.getElementById( 'btnHide' )
                btnHide.addEventListener( "click", (e) => {
                    @if(checkRoute('/customer'))
                        const cols = [0, 3, 5, 6, 7, 9, 10, 11, 12]            
                        @if(!auth()->user()->hasRole('user','guest'))
                            @if(!auth()->user()->hasRole('leader'))
                                cols.push(13)
                            @endif
                            cols.push(14)
                        @endif
                    @else
                        const cols = [0, 3, 5, 6, 7, 9, 10]          
                        @if(!auth()->user()->hasRole('user','guest'))
                            @if(!auth()->user()->hasRole('leader'))
                                cols.push(11)
                            @endif
                            cols.push(12)
                        @endif
                    @endif
                    
                    for (let x of cols) {
                        toggleColumn(x)
                    }
                    if(btnHide.innerHTML == 'Đầy đủ') {
                        btnHide.innerHTML = 'Thu gọn';
                    } else {
                        btnHide.innerHTML = 'Đầy đủ';
                    }
                });

                function toggleColumn(col_no) {
                    const table  = document.getElementById( 'customer_list_content' )
                    var e = table.getElementsByTagName( 'col' )[col_no]
                    if(e.style.visibility == 'collapse') {
                        e.style.visibility = '';
                    } else {
                        e.style.visibility = 'collapse';
                    }
                }

                const btnShow = document.getElementById( 'btnShow' )
                btnShow.addEventListener( "click", (e) => show_hide_column( 3, true ))
            </script>

        @endpush
        
        @include('Customer::customer.partials.customer-create-simple')

    @endisset

@endsection