'use strict';

/* Filters */

angular.module('cycloneFilters', []).filter('checkmark', function () {
    return function (input) {
        return input ? '\u2713' : '\u2718';
    };
});
