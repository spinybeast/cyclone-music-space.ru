'use strict';

/* Controllers */

var cycloneControllers = angular.module('cycloneControllers', []);

cycloneControllers.controller('NavigationController', ['$scope', '$location',
    function ($scope, $location) {
        $scope.isActive = function (viewLocation) {
            console.log(viewLocation, $location.path());
            return viewLocation === $location.path();
        }
    }]);

cycloneControllers.controller('PortfolioController', ['$scope', '$http',
    function ($scope, $http) {
        $http.get('data/portfolio.json').then(function (res) {
            $scope.content = res.data
        })
    }]);

