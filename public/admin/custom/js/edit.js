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
          var submitButton = form.find('button[type="submit"]');

          // Update CKEditor instances
          for (instance in CKEDITOR.instances) {
              CKEDITOR.instances[instance].updateElement();
          }

          var formData = new FormData(form[0]);

          // Disable submit button and show loader
          submitButton.prop('disabled', true).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...');

          $.ajax({
              url: url,
              type: "post",
              contentType: false,
              processData: false,
              data: formData,
              success: function (response) {
                  if (response.status == 200) {
                      toastr.success(response.message, 'Success!', { timeOut: 11000 });
                      window.location.href = response.redirect_url;
                  } else {
                      $.each(response.errors, function (key, err_value) {
                          toastr.error(err_value, 'Error!', { timeOut: 11000 });
                      });
                  }
              },
              error: function (xhr) {
                  toastr.error(xhr.responseText, 'Error!', { timeOut: 11000 });
              },
              complete: function () {
                  // Re-enable submit button and remove loader
                  submitButton.prop('disabled', false).html('Submit');
              }
          });
      });
  });
