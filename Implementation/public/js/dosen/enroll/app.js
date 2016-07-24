angular.module('LMS', ['ui.bootstrap']);

angular.module('LMS').controller('UserController',UserController);

function UserController($scope,$http,$compile){

  $scope.addoption = {
    "processing": true,
    "serverSide": true,
    "ajax": '/admin/user/read',
    "dom" : "<'row'<'col-sm-6'l><'col-sm-3 pull-right'f>>" +
  "<'row'<'col-sm-12'tr>>" +
  "<'row'<'col-sm-5'i><'col-sm-7 pull-right'p>>",
    "columns": [
      { data: 'id', name: 'id',searchable: false,
      orderable: false },
      { data: 'username', name: 'username' },
      { data: 'name', name: 'name' },
      { data: 'email', name: 'email' },
      { data: 'phone', name: 'phone' },
      { data: 'role', name: 'role' },
      { defaultContent: 'a', name: 'action',searchable:false }
    ]
    };

    //function to inject button into datatable
    $scope.addaction = function( nRow, aData, iDataIndex ) {

        var button  = '<div class="btn-group">'+
            '<button class="btn btn-sm dark btn-outline" style="padding : 1px" type="button" ng-click="addUserCourse('+aData["id"]+')" aria-expanded="false"> Add User '+
              '  <i class="fa fa-angle-down"></i></button>';
          $('td:eq(6)', nRow).html($compile(button)($scope));

    };
  $scope.showTable=false;
  //set option datatable
  $scope.option = {
    "processing": true,
    "serverSide": true,
    "ajax": '/admin/user/read',
    "dom" : "<'row'<'col-sm-6'l><'col-sm-3 pull-right'f>>" +
  "<'row'<'col-sm-12'tr>>" +
  "<'row'<'col-sm-5'i><'col-sm-7 pull-right'p>>",
    "columns": [
      { data: 'id', name: 'id',searchable: false,
      orderable: false },
      { data: 'username', name: 'username' },
      { data: 'name', name: 'name' },
      { data: 'email', name: 'email' },
      { data: 'phone', name: 'phone' },
      { data: 'role', name: 'role' },
      { defaultContent: 'a', name: 'action',searchable:false }
    ]
    };

  angular.element(document).ready(function () {
    console.log($scope.courseSelect);
    console.log($scope.roleTable);

    //function to refreshTable
    $scope.refreshDatatable = function(){
          if($scope.refresh == false)
            $scope.refresh = true;
          else $scope.refresh = false;

          if($scope.addrefresh == false)
            $scope.addrefresh = true;
          else $scope.addrefresh = false;

  console.log("masuk refreshDatatable");
    }

    $scope.updateTable = function()
    {
        $scope.showTable=true;
      console.log($scope.courseSelect);
      console.log($scope.roleTable);

      $scope.option['ajax']  = '/admin/enroll/read/'+$scope.roleTable+'/'+$scope.courseSelect;
      $scope.addoption['ajax'] = '/admin/user/read/'+$scope.roleTable+'/'+$scope.courseSelect;
      $scope.refreshDatatable();
      console.log($scope.refresh);

    }

    $scope.updateTable();

    });



  console.log($scope.courseSelect);
  $scope.idDelete = -99;
  $scope.data = false;
  $scope.adddata = false;
  $scope.refresh = false;
  $scope.addrefresh = false;
  $scope.emailDuplicate = false;
  $scope.usernameDuplicate = false;
  $scope.role="admin";
  $scope.submitted  = false;
  $scope.state = "Add New User";
  var id=0;


  //reset sidebar active state
  $(".nav-link").on("click", function(){
     $(this).parent().addClass( 'active' ).siblings().removeClass( 'active' );
  });

  //function to inject button into datatable
  $scope.action = function( nRow, aData, iDataIndex ) {

      var button  = '<div class="btn-group">'+
          '<button class="btn btn-xs green dropdown-toggle" ng-click="deleteUser('+aData["id"]+')" type="button" data-toggle="dropdown" aria-expanded="false"> Remove '+
            '  <i class="fa fa-angle-down"></i></button>';

        $('td:eq(6)', nRow).html($compile(button)($scope));
  };



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

  //function to update modal value
  $scope.updateModal = function(idUpdate,name,username,email,address,phone,role){
    $scope.refreshTable();

    $scope.state  = "Update User "+username;
    id  = idUpdate;
    $scope.name = name;
    $scope.username = username;
    $scope.email = email;
    $scope.address = address;
    $scope.phone = phone;
    $scope.role = role;

  }

  //function to reset form in update modal
  $scope.resetForm = function(){
    $scope.username =null;
    $scope.password =null;
    $scope.name     =null;
    $scope.email    =null;
    $scope.confirmPass    =null;
    $scope.address  =null;
    $scope.phone    =null;
    $scope.role     ="admin";
    $scope.submitted= false;
    $('#addUserModal').modal('hide');
  }

  //update id delete value
  $scope.delete = function(id){
    $scope.idDelete = id;
  }

  //function to refreshTable
  $scope.refreshTable = function(){
        if($scope.data == false)
          $scope.data = true;
        else $scope.data = false;

        if($scope.adddata == false)
          $scope.adddata = true;
        else $scope.adddata = false;

  }

  $scope.addUserCourse = function(id){
    //crate data body parameter
    var data  = $.param({
      idUser:id,
      idCourse:$scope.courseSelect});

      //send request to server
      $http.post('/admin/enroll/addUserCourse',data,
      {
        headers:{'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'}
      })
      .then(function(response) {

          //First function handles success
          var JSONMessage = JSON.parse(JSON.stringify(response.data));
          //if success add user
          if(JSONMessage["response"] == "OK"){
            toastr["success"](JSONMessage["message"], "Notifications");
            $scope.refreshTable();
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

  // function to submit the form after all validation has occurred
  $scope.submitForm = function(isValid) {

    console.log();
    if($scope.password != $scope.confirmPass){
      console.log("masuk lah ya");
      $scope.userForm.confirmPass.$invalid = true;
    }
    else {
      $scope.userForm.confirmPass.$invalid = false;
    }

    $scope.submitted  = true;
    // check to make sure the form is completely valid
    if (isValid && !$scope.userForm.confirmPass.$invalid) {

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
                $scope.refreshTable();
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
                $scope.refreshTable();
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

  //function delete user
  $scope.deleteUser = function(id){
    //crate data body parameter
    var data  = $.param({
      idUser:id,
      idCourse:$scope.courseSelect});
    $http.post('/admin/enroll/deleteUserCourse',data,  {
        headers:{'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'}
      }).
    then(function(response){

      //First function handles success
      var JSONMessage = JSON.parse(JSON.stringify(response.data));
      //if success add user
      if(JSONMessage["response"] == "OK"){
        toastr["success"](JSONMessage["message"], "Notifications");
        $scope.refreshTable();
      }
      else{
        //if fail to add user
        toastr["error"](JSONMessage["message"], "Failed add user");
      }
    },function(response){
      var JSONMessage = JSON.parse(JSON.stringify(response.data));
      toastr["error"]("Kesalahan Server","Failed add user");
        $scope.delete = -99;
    });
  $scope.delete = -99;
  }

}
