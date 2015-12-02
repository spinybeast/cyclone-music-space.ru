'use strict';

/* App Module */

var adminApp = angular.module('adminApp', [
    'ngRoute',
    'ReviewsController',
    'reviewsService',
    'BlogController',
    'blogService',
    'xeditable',
    'textAngular',
    'flow'
]);

adminApp.directive('ngReallyClick', [function() {
    return {
        restrict: 'A',
        link: function(scope, element, attrs) {
            element.bind('click', function() {
                var message = attrs.ngReallyMessage;
                if (message && confirm(message)) {
                    scope.$apply(attrs.ngReallyClick);
                }
            });
        }
    }
}]);
adminApp.config(['flowFactoryProvider',
    function (flowFactoryProvider) {
        flowFactoryProvider.defaults = {
            target: '/upload-article-img',
            permanentErrors: [404, 500, 501],
            maxChunkRetries: 1,
            chunkRetryInterval: 5000,
            simultaneousUploads: 4,
            singleFile: true,
            testChunks:false
        };
        flowFactoryProvider.on('catchAll', function (event) {
            console.log('catchAll', arguments);
        });
    }]);
adminApp.directive('isActiveNav', [ '$location', function ($location) {
    return {
        restrict: 'A',
        link: function (scope, element) {
            scope.location = $location;
            scope.$watch('location.path()', function (currentPath) {
                if ('#' + currentPath === element[0].attributes['href'].nodeValue) {
                    element.parent().addClass('active');
                } else {
                    element.parent().removeClass('active');
                }
            });
        }
    };
}]);
adminApp.config(['$routeProvider',
    function ($routeProvider) {
        $routeProvider.
            when('/comments', {
                templateUrl: 'views/admin/reviews.html',
                controller: 'reviewsController'
            }).
            when('/blog', {
                templateUrl: 'views/admin/blog.html',
                controller: 'blogController'
            }).
            otherwise({
                redirectTo: '/comments'
            });
    }]);

