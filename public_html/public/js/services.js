'use strict';

/* Services */

var cycloneServices = angular.module('cycloneServices', ['ngResource']);

cycloneServices.factory('Phone', ['$resource',
    function ($resource) {
        return $resource('phones/:phoneId.json', {}, {
            query: {method: 'GET', params: {phoneId: 'phones'}, isArray: true}
        });
    }]);

cycloneServices.factory('content', ['$resource', '$routeParams',
    function ($resource) {
        return $resource('data/:phoneId.json', {}, {
            query: {method: 'GET', params: {phoneId: 'phones'}, isArray: true}
        });
    }]);
