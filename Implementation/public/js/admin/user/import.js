angular.module('LMS', ['ui.bootstrap','oc.lazyLoad']);

angular.module('LMS').controller('UserController',UserController);

function UserController($scope,$http,$compile){
  var myDropzone = new Dropzone("#my-dropzone", { url: "/file/post"});

}
