$(function () {
    var language = $('#Pages').val();
   
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
                        url: "/admin/pages/test",
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
