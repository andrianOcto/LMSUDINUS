angular.module('LMS', ['ui.bootstrap','oc.lazyLoad']);

angular.module('LMS').controller('UserController',UserController);

function UserController($scope,$http,$compile){

  $(".nav-link").on("click", function(){
     $(this).parent().addClass( 'active' ).siblings().removeClass( 'active' );
  });

  $scope.data = false;
  $scope.action = function( nRow, aData, iDataIndex ) {

  //  $scope.apply();
        // Bold the grade for all 'A' grade browsers
          var button  = '<div class="btn-group">'+
              '<button class="btn btn-xs green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions'+
                '  <i class="fa fa-angle-down"></i></button>'+
              '<ul class="dropdown-menu" role="menu">'+
                  '<li><a href="#addUserModal" data-toggle="modal" ng-click="updateModal('+aData["id"]+',\''+aData["name"]+'\',\''+aData["username"]+'\',\''+aData["email"]+'\',\''+aData["address"]+'\',\''+aData["phone"]+'\',\''+aData["role"]+'\')"><i class="icon-docs"></i> Edit </a></li>'+
                  '<li><a href="javascript:;" ng-click="(deleteUser('+aData["id"]+'))"><i class="icon-tag"></i> Delete </a></li>'+
              '</ul></div>';

            $('td:eq(6)', nRow).html($compile(button)($scope));

      };


  $scope.emailDuplicate = false;
  $scope.usernameDuplicate = false;
  $scope.role="admin";
  $scope.submitted  = false;
  $scope.state = "Add New User";
  var id=0;

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

  //function to change radiobutton value
  $scope.changeRole = function(value){
    $scope.role = value;
  }

  $scope.updateModal = function(idUpdate,name,username,email,address,phone,role){
    $scope.refreshTable();
    $scope.resetForm();

    $scope.state  = "Update User "+username;
    id  = idUpdate;
    $scope.name = name;
    $scope.username = username;
    $scope.email = email;
    $scope.address = address;
    $scope.phone = phone;
    $scope.role = role;

  }

  $scope.resetForm = function(){
    console.log("masuk Reset");
    $scope.username =null;
    $scope.password =null;
    $scope.name     =null;
    $scope.email    =null;
    $scope.address  =null;
    $scope.phone    =null;
    $scope.role     ="admin";
    $scope.submitted= false;
    $('#addUserModal').modal('hide');
  }

  // function to submit the form after all validation has occurred
  $scope.submitForm = function(isValid) {

    $scope.submitted  = true;
    // check to make sure the form is completely valid
    if (isValid) {

        if($scope.state == "Add New User")
        {
          //crate data body parameter
          var data  = $.param({
            username:$scope.username,
            password:$scope.password,
            name:$scope.name,
            email:$scope.email,
            address:$scope.address,
            phone:$scope.phone,
            role:$scope.role});

          //send request to server
          $http.post('/admin/user/create',data,
          {
            headers:{'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'}
          })
          .then(function(response) {

              //First function handles success
              var JSONMessage = JSON.parse(JSON.stringify(response.data));
              //if success add user
              if(JSONMessage["response"] == "OK"){
                toastr["success"](JSONMessage["message"], "Notifications");
                $scope.resetForm();
              }
              else{
                //if fail to add user
                toastr["error"](JSONMessage["message"], "Failed add user");
                if(JSONMessage["errorType"]=="username"){
                  $scope.usernameDuplicate = true;
                }
                else if(JSONMessage["errorType"]=="email"){
                  $scope.emailDuplicate = true;
                }
              }
          }, function(response) {
              //Second function handles error
              var JSONMessage = JSON.parse(JSON.stringify(response.data));

              $scope.errMessageStat = true;
              $scope.errMessage     = JSONMessage.message;
              toastr["error"]("Kesalahan Server","Failed add user");
          });
        }
        else{

          //crate data body parameter
          var data  = $.param({
            idUser:id,
            username:$scope.username,
            password:$scope.password,
            name:$scope.name,
            email:$scope.email,
            address:$scope.address,
            phone:$scope.phone,
            role:$scope.role});

          //send request to server
          $http.post('/admin/user/update',data,
          {
            headers:{'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'}
          })
          .then(function(response) {

              //First function handles success
              var JSONMessage = JSON.parse(JSON.stringify(response.data));
              //if success add user
              if(JSONMessage["response"] == "OK"){
                toastr["success"](JSONMessage["message"], "Notifications");
                $scope.resetForm();
              }
              else{
                //if fail to add user
                toastr["error"](JSONMessage["message"], "Failed add user");
                if(JSONMessage["errorType"]=="username"){
                  $scope.usernameDuplicate = true;
                }
                else if(JSONMessage["errorType"]=="email"){
                  $scope.emailDuplicate = true;
                }
              }
          }, function(response) {
              //Second function handles error
              var JSONMessage = JSON.parse(JSON.stringify(response.data));

              $scope.errMessageStat = true;
              $scope.errMessage     = JSONMessage.message;
              toastr["error"]("Kesalahan Server","Failed add user");
          });
        }
    }
  };

  $scope.refreshTable = function(){
        if($scope.data == false)
          $scope.data = true;
        else $scope.data = false;
  }

  $scope.deleteUser = function(id){

    $scope.refreshTable();

    //crate data body parameter
    var data  = $.param({
      idUser:id});
    $http.post('/admin/user/delete',data,  {
        headers:{'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'}
      }).
    then(function(response){
      //First function handles success
      var JSONMessage = JSON.parse(JSON.stringify(response.data));
      //if success add user
      if(JSONMessage["response"] == "OK")
        toastr["success"](JSONMessage["message"], "Notifications");
    },function(response){
      var JSONMessage = JSON.parse(JSON.stringify(response.data));
      toastr["error"]("Kesalahan Server","Failed add user");
    });
  }
}
