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


var KTFormRepeater = function() {

  // Private functions
  var demo1 = function() {
      $('#kt_repeater_1').repeater({
          initEmpty: false,

          defaultValues: {
              'text-input': 'foo'
          },

          show: function() {
              $(this).slideDown();
          },

          hide: function(deleteElement) {
              $(this).slideUp(deleteElement);
          }
      });
  }

  return {
      // public functions
      init: function() {
          demo1();
      }
  };
}();

jQuery(document).ready(function() {
  KTFormRepeater.init();
});

var url = document.getElementById('url').style.display='none';
var upoad = document.getElementById('image').style.display='none';

document.addEventListener('change', function (event) {
    if (event.target.classList.contains('selectedTypes')) {
        if (event.target.value == 'url') {
            document.getElementsByName(event.target.name.replace('type', 'url'))[0].style.display = 'block';
            document.getElementsByName(event.target.name.replace('type', 'image'))[0].style.display = 'none';
        } else if (event.target.value == 'image' || event.target.value == 'pdf') {
            document.getElementsByName(event.target.name.replace('type', 'image'))[0].classList.add('dropify');
            document.getElementsByName(event.target.name.replace('type', 'image'))[0].style.display = 'block';
            document.getElementsByName(event.target.name.replace('type', 'url'))[0].style.display = 'none';
        }
    }
});