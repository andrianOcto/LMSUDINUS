angular.module('LMS', ['ui.bootstrap','oc.lazyLoad']);

angular.module('LMS').controller('UserController',UserController);

function UserController($scope,$http,$compile){
  $scope.sectionID = "";
  //reset sidebar active state
  $(".nav-link").on("click", function(){
     $(this).parent().addClass( 'active' ).siblings().removeClass( 'active' );
  });

  $(".mt-list-item").on("click", function(){
      $(this).siblings().css({ 'background': "" });
      $(this).siblings().removeClass( 'done' );

      $(this).addClass('done');
      $(this).css({ 'background': "#26C281" });

     $(this).parent().addClass( 'done' ).siblings().removeClass( 'active' );
  });

  $scope.updateVal = function(id){
    $scope.sectionID = ""+id;
    $("[name=sectionID]").val(id);
  }

}
