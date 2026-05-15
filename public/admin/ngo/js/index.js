$(function () {
    var language = $('#NGO').val();
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
            url: `/admin/ngo/${language}`,
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
                data: 'created_at',
                name: 'created_at'
            },
            {
                data: 'action',
                name: 'action',
                orderable: true,
                searchable: true
            },
        ],
        dom: 'lBfrtip',
        buttons: [{
                extend: 'copy',
                exportOptions: { modifier: { page: 'all', search: 'none' } }
            },
            {
                extend: 'excel',
                exportOptions: { modifier: { page: 'all', search: 'none' } }
            },
            {
                extend: 'csv',
                exportOptions: { modifier: { page: 'all', search: 'none' } }
            },
            {
                extend: 'pdf',
                exportOptions: { modifier: { page: 'all', search: 'none' } }
            },
            {
                extend: 'print',
                exportOptions: { modifier: { page: 'all', search: 'none' } }
            },
        ],
    });

    $('.filter-input').keyup(function () {
        table.column($(this).data('column')).search($(this).val()).draw();
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
});
