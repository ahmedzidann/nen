$('#myForm').submit(function (e) {
    e.preventDefault();
    var form = $(this);
    var url = form.attr('action');

    for (instance in CKEDITOR.instances) {
        CKEDITOR.instances[instance].updateElement();
    }

    var formData = new FormData(form[0]);

    $.ajax({
        url: url,
        type: "POST",
        contentType: false,
        processData: false,
        data: formData,
        success: function (response) {

            if (response.status == 200) {
                toastr.success(response.message, 'Success!', { timeOut: 1500 });

                setTimeout(function () {
                    window.location.href = response.redirect_url;
                }, 1500);
            } else {
                $.each(response.errors, function (key, err_value) {
                    toastr.error(err_value, 'Error!', { timeOut: 11000 });
                });
            }
        },
        error: function (xhr) {
            toastr.error(xhr.responseText, 'Error!', { timeOut: 11000 });
        }
    });
});
