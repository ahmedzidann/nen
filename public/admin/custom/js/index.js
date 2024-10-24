function initializeDataTable(selector, ajaxUrl, columns, buttons, extraData = {}) {

    var table = $(selector).DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        autoWidth: false,
        ajax: {
            url: ajaxUrl,
            data: function (d) {
                // Merge extra data with request data
                $.extend(d, extraData);
                d.from_date = $('.datepickerto').val();
                d.to_date = $('.datepickerfrom').val();
            }
        },
        columns: columns,
        dom: 'lBfrtip',
        buttons: buttons,
    });

    $('.filter-input').keyup(function () {
        table.column($(this).data('column'))
            .search($(this).val())
            .draw();
    });

    $(".filterButton").click(function () {
        table.draw();
    });

    $('.selectAll').on('change', function () {
        var isChecked = $(this).is(':checked');
        table.rows().every(function () {
            $(this.node()).find('input[type="checkbox"]').prop('checked', isChecked);
        });
    });

    return table;
}

function bulkDelete(table, deleteUrl) {
    $(document).on('click', '#bulk_delete', function () {
        var ids = [];

        $('.blogs_checkbox:checked').each(function () {
            ids.push($(this).val());
        });
  console.log(ids);
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#dc3545',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (ids.length > 0) {
                if (result.isConfirmed) {
                    $.ajax({
                        url: deleteUrl,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        type: "POST",
                        data: {
                            ids: ids
                        },
                        success: function (response) {
                            Swal.fire(
                                'Deleted!',
                                'Your item has been deleted.',
                                'success'
                            );
                            table.draw(); // Reload table data
                        },
                        error: function (xhr) {
                            Swal.fire(
                                'Error!',
                                'An error occurred while deleting the item.',
                                'error'
                            );
                        }
                    });
                }
            } else {
                Swal.fire(
                    'Error!',
                    'Please select at least one item.',
                    'error'
                );
            }
        });
    });
}

function bulkDeleteResources(table, deleteUrl) {
    $(document).on('click', '#bulk_delete', function () {

        var ids = [];
        var categories = [];

        $('.blogs_checkbox:checked').each(function () {
            ids.push($(this).val());
            categories.push({
                main_category: $(this).data('main-category'),
                sub_category: $(this).data('sub-category')
            });
        });


        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#dc3545',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (ids.length > 0) {
                if (result.isConfirmed) {
                    $.ajax({
                        url: deleteUrl,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        type: "POST",
                        data: {
                            categories: categories // Passing categories data
                        },
                        success: function (response) {
                            Swal.fire(
                                'Deleted!',
                                'Your item has been deleted.',
                                'success'
                            );
                            table.draw(); // Reload table data
                        },
                        error: function (xhr) {
                            Swal.fire(
                                'Error!',
                                'An error occurred while deleting the item.',
                                'error'
                            );
                        }
                    });
                }
            } else {
                Swal.fire(
                    'Error!',
                    'Please select at least one item.',
                    'error'
                );
            }
        });
    });
}