'use strict';

angular.
module('myApp').
config([ '$locationProvider', '$routeProvider', function ($locationProvider, $routeProvider) {
    $locationProvider.hashPrefix('!');

    $routeProvider.
        when('/', {
            templateUrl: 'views/main.php'
        }).
        otherwise('/');
}]);