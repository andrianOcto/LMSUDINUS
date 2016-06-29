angular.module('LMS', ['ui.bootstrap','oc.lazyLoad']);

angular.module('LMS').controller('UserController',UserController);

function UserController($scope,$http,$compile){
  angular.element(document).ready(function () {
    Dropzone.options.importUser = {
      uploadMultiple:false
      init: function() {
      this.on("addedfile", function(file) { alert("Added file."); });
      }
    };
   });



}
