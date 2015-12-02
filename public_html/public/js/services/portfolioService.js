angular.module('portfolioService', [])

    .factory('SoundCloud', function ($http) {

        return {
            get: function () {
                return $http.get('/portfolio');
            }
        }

    });

