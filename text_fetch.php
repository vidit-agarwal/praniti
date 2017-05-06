<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
    <title>Document</title>
</head>
<body ng-app="postserviceApp" ng-controller="postserviceCtrl">
    <p>{{contents}}</p>
    <script>
    var app = angular.module('postserviceApp', []);
        app.controller('postserviceCtrl', function ($scope, $http) {
            $http.get('text_access.php')
                     .then(function(response) {
                     $scope.contents = response.data;
                 });
        });
    </script>
</body>
</html>