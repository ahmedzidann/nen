  $(document).ready(function () {
      // start show token
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    // end show token
          $('#myForm').submit(function (e) {
            e.preventDefault(); // Prevent the default form submission
            var form = $(this);
            var url = form.attr('action');
            for (instance in CKEDITOR.instances) {
              CKEDITOR.instances[instance].updateElement();
            }
              var form = new FormData(form[0]);
              $.ajax({
                  url: url,
                  type: "POST",
                  contentType: false,
                  processData: false,
                  data: form, // Serialize the form data
                  success: function (response) {
                      if (response.status == 200) {
                          window.location.href = response.redirect_url;
                      }else{
                          $.each(response.errors, function (key, err_value) {
                              toastr.error(err_value,'Error!',{timeOut:11000});
                          });
                      }
                  },
                  error: function (xhr) {
                      toastr.error(xhr.responseText,'Error!',{timeOut:11000});
                  }
              });
          });
  });
