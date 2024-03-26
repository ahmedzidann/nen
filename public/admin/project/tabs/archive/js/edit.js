  $(document).ready(function () {
  
      // start show token
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    // end show token
    
      for (let i = 0; i < $('#key_new').val(); i++) {
          $('#myForm' + i).submit(function (e) {
              e.preventDefault(); // Prevent the default form submission
              var form = $(this);
              var url = form.attr('action');
                for (instance in CKEDITOR.instances) {
                    CKEDITOR.instances[instance].updateElement();
                }
                var form = new FormData(form[0]);
              $.ajax({
                  url: url,
                  type: "post",
                  contentType: false,
                  processData: false,
                  data: form, // Serialize the form data
                  success: function (response) {
                      if (response.status == 200) {
                          toastr.success(response.message,'Success!',{timeOut:11000});
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
      }
  });
  (function(){      
      let type=document.getElementById('type');
    if(type.value == 'url'){        
        document.getElementById('upload').style.display='none';
        document.getElementById('link').style.display='block';
    }else {
        console.log(document.getElementById('upload'))
        document.getElementById('link').style.display='none';
        document.getElementById('upload').style.display='block';
    }
})();

  function types() {
    var selectedValue = document.getElementById('type').value.trim();

    // Get all elements with the class 'url'
    var urlElements = document.getElementsByClassName('url');
    // Get all elements with the class 'upload'
    var uploadElements = document.getElementsByClassName('upload');

    if (selectedValue == 'url') {
        // Display elements with class 'url' and hide elements with class 'upload'
        for (var i = 0; i < urlElements.length; i++) {
            urlElements[i].style.display = 'block';
        }
        for (var i = 0; i < uploadElements.length; i++) {
            uploadElements[i].style.display = 'none';
        }
    } else {
        // Display elements with class 'upload' and hide elements with class 'url'
        for (var i = 0; i < urlElements.length; i++) {
            urlElements[i].style.display = 'none';
        }
        for (var i = 0; i < uploadElements.length; i++) {
            uploadElements[i].style.display = 'block';
        }
    }
}