$(function () {
    var language = $('#Testing').val();
    var url = new URL(window.location.href);
    var category = url.searchParams.get("category");
    var subcategory = url.searchParams.get("subcategory");
    var item = url.searchParams.get("item");
    var table = $('.yajra-datatable').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        autoWidth: false,
        ajax: {
            url: `/admin/testing/${language}`,
            data: function (d) {
                d.from_date = $('.datepickerto').val();
                d.to_date = $('.datepickerfrom').val();
                d.category = category;
                d.subcategory = subcategory;
                d.item = item;
            }
        },
        columns: [{
                data: 'checkbox',
                name: 'checkbox',
                orderable: false,
                searchable: false
            },
            {
                data: 'id',
                name: 'id'
            },
            {
                data: 'title',
                name: 'title'
            },
            {
                data: 'Page2',
                name: 'childe_pages_id'
            },
            {
                data: 'created_at',
                name: 'created_at'
            },
            {
                data: 'action',
                name: 'action',
                orderable: true,
                searchable: true,


            },
        ],
        dom: 'lBfrtip',
        buttons: [{
                extend: 'copy',
                exportOptions: {
                    modifier: {
                        page: 'all',
                        search: 'none'
                    }
                }
            },
            {
                extend: 'excel',
                exportOptions: {
                    modifier: {
                        page: 'all',
                        search: 'none'
                    }
                }
            },
            {
                extend: 'csv',
                exportOptions: {
                    modifier: {
                        page: 'all',
                        search: 'none'
                    }
                }
            },
            {
                extend: 'pdf',
                exportOptions: {
                    modifier: {
                        page: 'all',
                        search: 'none'
                    }
                }
            },
            {
                extend: 'print',
                exportOptions: {
                    modifier: {
                        page: 'all',
                        search: 'none'
                    }
                }
            },
        ],
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

        // Set all checkboxes in the table body to the same state as the "Select All" checkbox
        table.rows().every(function () {
            $(this.node()).find('input[type="checkbox"]').prop('checked', isChecked);
        });
    });

    $(document).on('click', '#bulk_delete', function () {
        var id = [];
        $('.users_checkbox:checked').each(function () {
            id.push($(this).val());
        });
        // --------
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#dc3545',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (id.length > 0) {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "/admin/testing/test",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        type: "DELETE",
                        data: {
                            id: id
                        },
                        sucess: function (response) {
                            // Handle the success response
                            Swal.fire(
                                'Deleted!',
                                'Your item has been deleted.',
                                'success'
                            );
                            // Optionally, reload the page or update the UI
                        },
                        error: function (xhr) {
                            // Handle the error response
                            Swal.fire(
                                'Error!',
                                'An error occurred while deleting the item.',
                                'error'
                            );
                        }
                    });
                    location.reload();
                }
            } else {
                Swal.fire(
                'Error!',
                'Please select least one check.',
                'error'
                );
            }
        });
        // ----------
    });
});
