angular.module("firstAngulApp", [])
    .controller("FirstController", function ($scope, $http) {
        $scope.posts = [];
        $http.get("http://slimtest/usuarios")
            .success(function (data) {
                console.log(data);
                $scope.posts = data;
            })
            .error(function (err) {
                console.log(err);
                $scope.posts = err;
            });
        $scope.propertyName = 'usuario';
        $scope.reverse = true;
        $scope.posts = [];
        $scope.sortBy = function(propertyName) {
            $scope.reverse = ($scope.propertyName === propertyName) ? !$scope.reverse : false;
            $scope.propertyName = propertyName;
        };
    });