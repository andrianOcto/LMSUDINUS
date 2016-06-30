angular.module('LMS', ['ui.bootstrap','oc.lazyLoad']);

angular.module('LMS').controller('UserController',UserController);

function UserController($scope,$http,$compile){
    //set toastr option
    toastr.options = {
      "closeButton": true,
      "debug": false,
      "positionClass": "toast-top-right",
      "showDuration": "10000",
      "hideDuration": "10000",
      "timeOut": "5000",
      "extendedTimeOut": "1000",
      "showEasing": "swing",
      "hideEasing": "linear",
      "showMethod": "fadeIn",
      "hideMethod": "fadeOut"
    }


      //reset sidebar active state
      $(".nav-link").on("click", function(){
         $(this).parent().addClass( 'active' ).siblings().removeClass( 'active' );
      });


    Dropzone.options.importUser = {
      uploadMultiple  :false,
    
      init: function() {
      this.on("success", function(file) {
        toastr["success"]("Success import user", "Notifications");
      });

      this.on("error", function(file) {

        toastr["error"]("Failed import user", "Notifications");
      });

      }
    };






}
