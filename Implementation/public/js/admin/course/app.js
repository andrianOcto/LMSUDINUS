angular.module('LMS', ['ui.bootstrap','oc.lazyLoad']);

angular.module('LMS').controller('UserController',UserController);

function UserController($scope,$http,$compile){

  $scope.option = {
      "processing": true,
      "serverSide": true,
      "ajax": '/admin/course/read',
      "dom" : "<'row'<'col-sm-6'l><'col-sm-3 pull-right'f>>" +
"<'row'<'col-sm-12'tr>>" +
"<'row'<'col-sm-5'i><'col-sm-7 pull-right'p>>",
      "columns": [
        { data: 'id', name: 'id',searchable: false,
        orderable: false },
        { data: 'code', name: 'code' },
        { data: 'name', name: 'name' },
        { data: 'description', name: 'description' },
        { data: 'credit', name: 'credit' },
        { data: 'status', name: 'status' },
        { defaultContent: 'a', name: 'action',searchable:false }
      ]
    };

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
                  '<li><a href="#addCourseModal" data-toggle="modal" ng-click="updateModal('+aData["id"]+',\''+aData["code"]+'\',\''+aData["name"]+'\',\''+aData["description"]+'\',\''+aData["credit"]+'\',\''+aData["status"]+'\')"><i class="icon-docs"></i> Edit </a></li>'+
                  '<li><a href="javascript:;" ng-click="(deleteUser('+aData["id"]+'))"><i class="icon-tag"></i> Delete </a></li>'+
              '</ul></div>';

            $('td:eq(6)', nRow).html($compile(button)($scope));

      };


  $scope.submitted  = false;
  $scope.state = "Add New Course";
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

  $scope.updateModal = function(idUpdate,code,name,description,credit,status){
    $scope.resetForm();

    $scope.state  = "Update Course "+name;
    id  = idUpdate;
    $scope.code = code;
    $scope.name = name;
    $scope.description = description;
    $scope.credit = credit;
    $scope.status = status;
  }

  $scope.resetForm = function(){
    console.log("masuk Reset");
    $scope.code =null;
    $scope.name     =null;
    $scope.description    =null;
    $scope.credit  =null;
    $scope.submitted= false;
    $('#addCourseModal').modal('hide');
  }

  // function to submit the form after all validation has occurred
  $scope.submitForm = function(isValid) {

    $scope.submitted  = true;
    // check to make sure the form is completely valid
    if (isValid) {

        if($scope.state == "Add New Course")
        {
          //crate data body parameter
          var data  = $.param({
            code:$scope.code,
            name:$scope.name,
            description:$scope.description,
            credit:$scope.credit,
            });

          //send request to server
          $http.post('/admin/course/create',data,
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

              }
          }, function(response) {
              //Second function handles error
              var JSONMessage = JSON.parse(JSON.stringify(response.data));

              $scope.errMessageStat = true;
              $scope.errMessage     = JSONMessage.message;
              toastr["error"]("Kesalahan Server","Failed add course");
          });
        }
        else{

          //crate data body parameter
          var data  = $.param({
            idCourse:id,
            code:$scope.code,
            name:$scope.name,
            description:$scope.description,
            credit:$scope.credit});

          //send request to server
          $http.post('/admin/course/update',data,
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
          }, function(response) {
              //Second function handles error
              var JSONMessage = JSON.parse(JSON.stringify(response.data));

              $scope.errMessageStat = true;
              $scope.errMessage     = JSONMessage.message;
              toastr["error"]("Kesalahan Server","Failed update course");
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
      idCourse:id});
    $http.post('/admin/course/delete',data,  {
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
      toastr["error"]("Kesalahan Server","Failed delete course");
    });
  }
}
