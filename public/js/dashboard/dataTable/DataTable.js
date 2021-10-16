let tables = function (table_id, columns, columns_def = null) {
    var table = null;
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    const reloadTable = () => table.ajax.reload();
    const getMethod = (e) => ($(e.target).attr('action-method') !== undefined) ? "post" : "get";
    const getUrl = (e) => $(e.target).attr('data-link');


    let ajaxCall = (e, data = {}, success = null, error = null) => {
        $.ajax({
            url: getUrl(e),
            type: getMethod(e),
            data: data,
            success: success ? success : () => reloadTable(),
            error: error ? error : (data) => console.error(data)
        })
    };

    let loadTable = () => table = $(table_id).DataTable({
        processing: true, serverSide: false, responsive: true,
        lengthMenu: [20, 50, 100], order: [[1, 'desc']],
        "language": {
            "paginate": {
                "previous": "<",
                "next": ">",
            }
        },
        order: [ [0, 'asc'] ],
        ajax: {type: "POST", url: $(table_id).attr('data-link')},
        columns: columns,
        columnDefs: columns_def
    });

    let deleteRecord = () => $(table_id).on('click', 'button[button-type=delete]', (e) => {
        swal.fire({
            title: 'آیا از حذف این مورد مطممئن هستید؟',
            text: 'ممکن است مجددا نتوانید این مورد را بازگردانید!',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#28a745',
            cancelButtonColor: '#dc3545',
            confirmButtonText: 'بله',
            cancelButtonText: 'خیر',
        }).then(function (result) {
            if (result.value) {
                ajaxCall(e, {_method: "delete"});
                swal.fire(
                    'موفقیت آمیز!',
                    'حذف مورد موفقیت آمیز بود.',
                    'success'
                );
            }
        });
    });
    let restore = () => $(table_id).on('click', 'button[button-type=restore]', (e) => {
        swal.fire({
            title: 'آیا از بازگردانی این مورد مطمئن هستید؟',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#28a745',
            cancelButtonColor: '#dc3545',
            confirmButtonText: 'بله',
            cancelButtonText: 'خیر',
        }).then(function (result) {
            if (result.value) {
                ajaxCall(e, {id: $(e.target).attr('data-id')});
                swal.fire(
                    'موفقیت آمیز!',
                    'بازگردانی موفقیت آمیز بود.',
                    'success'
                );
            }
        });
    });
    let disable = () => $(table_id).on("click", 'button[button-type=disable], i[type=disable]', (e) => {
        swal.fire({
            title: 'آیاا از غیرفعال‌سازی این مورد مطمئن هستید؟',
            text: 'پس از غیرفعال‌سازی می توان آن را مجددا به حالت نخست بازگرداند.',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#28a745',
            cancelButtonColor: '#dc3545',
            confirmButtonText: 'بله',
            cancelButtonText: 'خیر',
        }).then(function (result) {
            if (result.value) {
                ajaxCall(e, {id: $(e.target).attr('data-id')});
                swal.fire(
                    'موفقیت‌آمیز!',
                    'غیرفعال‌سازی با موفقیت انجام گردید.',
                    'success'
                );
            }
        });
    });
    let enable = () => $(table_id).on('click', 'button[button-type=enable], i[type=enable]', (e) => {
        swal.fire({
            title: 'آیاا از فعال‌سازی این مورد مطمئن هستید؟',
            text: 'پس از فعال‌سازی می توان آن را مجددا به حالت نخست بازگرداند.',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#28a745',
            cancelButtonColor: '#dc3545',
            confirmButtonText: 'بله',
            cancelButtonText: 'خیر',
        }).then(function (result) {
            if (result.value) {
                ajaxCall(e, {id: $(e.target).attr('data-id')});
                swal.fire(
                    'موفقیت‌آمیز!',
                    'فعال‌سازی با موفقیت انجام گردید.',
                    'success'
                );
            }
        });
    });

    return {
        init: function () {
            deleteRecord();
            restore();
            disable();
            enable();
            loadTable();
            reloadTable();
        }
    };
};
