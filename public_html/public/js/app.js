'use strict';

/* App Module */

var cycloneApp = angular.module('cycloneApp', [
    'ngRoute',
    'ngAnimate',
    'ngSanitize',
    'reviewsCtrl',
    'reviewsService',
    'PortfolioController',
    'portfolioService',
    'BlogController',
    'BlogItemController',
    'blogService',
    'flow'
]);

cycloneApp.run(function($rootScope, $location, Article) {
    $rootScope.$on('$routeChangeSuccess', function(e, current, pre) {
        $rootScope.page = $location.path();
        $rootScope.title = current.$$route.title;
    });

    //Article.published().success(function (data) {
    //    $.each(data, function(index, article) {
    //        if (article.category == 1 && !$rootScope.article1) {
    //            $rootScope.article1 = article;
    //        } else if (article.category == 2 && !$rootScope.article2) {
    //            $rootScope.article2 = article;
    //        }
    //    });
    //});
});

cycloneApp.config(['$routeProvider',
    function ($routeProvider) {
        $routeProvider.
            when('/about', {
                templateUrl: '/views/partials/' + lang + '/about.html',
                title: lang == 'en' ? 'About' : 'О нас'
            }).
            when('/services', {
                templateUrl: '/views/partials/' + lang + '/services.html',
                title: lang == 'en' ? 'Services' : 'Услуги'
            }).
            when('/prices', {
                templateUrl: '/views/partials/' + lang + '/prices.html',
                title: lang == 'en' ? 'Prices' : 'Цены'
            }).
            when('/portfolio', {
                templateUrl: '/views/partials/' + lang + '/portfolio.html',
                controller: 'portfolioController',
                title: lang == 'en' ? 'Portfolio' : 'Портфолио'
            }).
            when('/contact', {
                templateUrl: '/views/partials/' + lang + '/contact.html',
                title: lang == 'en' ? 'Contact' : 'Контакты'
            }).
            when('/work-scheme', {
                templateUrl: '/views/partials/' + lang + '/work-scheme.html',
                title: lang == 'en' ? 'Work scheme' : 'Схема работы'
            }).
            when('/reviews', {
                templateUrl: '/views/partials/' + lang + '/reviews.html',
                controller: 'reviewsController',
                title: lang == 'en' ? 'Reviews' : 'Отзывы'
            }).
            when('/blog', {
                templateUrl: '/views/partials/' + lang + '/blog.html',
                controller: 'blogController',
                title: lang == 'en' ? 'Blog' : 'Блог'
            }).
            when('/blog/:id', {
                templateUrl: '/views/partials/' + lang + '/blog_item.html',
                controller: 'blogItemController',
                title: lang == 'en' ? 'Article' : 'Блог'
            }).
            otherwise({
                redirectTo: '/services'
            });
    }]);
cycloneApp.config(['flowFactoryProvider',
    function (flowFactoryProvider) {
        flowFactoryProvider.defaults = {
            target: '/upload-avatar',
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

cycloneApp.directive('isActiveNav', [ '$location', function ($location) {
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
