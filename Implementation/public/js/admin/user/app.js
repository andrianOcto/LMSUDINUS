angular.module('LMS', []);

angular.module('LMS').controller('UserController',UserController);

function UserController($scope,$http){
  $scope.role="admin";
  $scope.changeRole = function(value){
    $scope.role = value;
  }
  $scope.submitted  = false;
  // function to submit the form after all validation has occurred
  $scope.submitForm = function(isValid) {

    $scope.submitted  = true;
    // check to make sure the form is completely valid
    if (isValid) {

      var data  = $.param({
        username:$scope.username,
        password:$scope.password,
        name:$scope.name,
        email:$scope.email,
        address:$scope.address,
        phone:$scope.phone,
        role:$scope.role});

      $scope.errMessageStat= false;
      errMessageStat  = false;


        $http.post('/admin/user/create',data,
        {
          headers:{'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'}
        })
        .then(function(response) {

            //First function handles success
            var JSONMessage = JSON.parse(JSON.stringify(response.data));

        }, function(response) {

            //Second function handles error
            var JSONMessage = JSON.parse(JSON.stringify(response.data));

            $scope.errMessageStat = true;
            $scope.errMessage     = JSONMessage.message;
            onsole.log($scope.errMessage);
        });

    }
  };

}
