   var telInput = $("#mobile"),
   errorMsg = $("#error-msg"),
   validMsg = $("#valid-msg");

$("#telephone").intlTelInput({ 
    initialCountry: "eg",
    separateDialCode: true 
});

var key = $('.selected-dial-code').text();
$('#key').val(key);
$(".country-list").click(function () {
  var key = $('.selected-dial-code').text();
  $('#key').val(key);
});


   // initialise plugin
   telInput.intlTelInput({

   allowExtensions: true,
   formatOnDisplay: true,
   autoFormat: true,
   autoHideDialCode: true,
   autoPlaceholder: true,
   defaultCountry: "in",
   ipinfoToken: "yolo",

   nationalMode: false,
   numberType: "MOBILE",
   //onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
   preferredCountries: ['sa', 'ae', 'qa','om','bh','kw','ma'],
   preventInvalidNumbers: true,
   separateDialCode: false,
   initialCountry: "in",
   geoIpLookup: function(callback) {
   $.get("http://ipinfo.io", function() {}, "jsonp").always(function(resp) {
     var countryCode = (resp && resp.country) ? resp.country : "";
     callback(countryCode);
    });
 },
    utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.9/js/utils.js"
 });

 var reset = function() {
   telInput.removeClass("error");
   errorMsg.addClass("hide");
   validMsg.addClass("hide");
 };

 // on blur: validate
 telInput.blur(function() {
   reset();
   if ($.trim(telInput.val())) {
     if (telInput.intlTelInput("isValidNumber")) {
       validMsg.removeClass("hide");
     } else {
       telInput.addClass("error");
       errorMsg.removeClass("hide");
     }
   }
 });

 

 // on keyup / change flag: reset
 telInput.on("keyup change", reset);
$("#number").intlTelInput();

$('#telephone').keypress(function(evt) {
  if (evt.which == "0".charCodeAt(0) && $(this).val().trim() == "") {
  return false;
   }
});
$('#telephone').keypress(function (e) {    
    var charCode = (e.which) ? e.which : event.keyCode    
    if (String.fromCharCode(charCode).match(/[^0-9]/g))    
        return false;                        
});