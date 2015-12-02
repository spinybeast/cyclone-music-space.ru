angular.module('blogService', [])

    .factory('Article', function ($http) {

        return {
            get: function () {
                return $http.get('/api/blog');
            },

            published: function () {
                return $http.get('/blog/published');
            },

            item: function (id) {
                return $http.get('/api/blog/' + id);
            },

            update: function (id, articleData) {
                return $http.put('/api/blog/' + id, articleData);
            },

            save: function (articleData) {
                return $http({
                    method: 'POST',
                    url: '/api/blog',
                    headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                    data: $.param(articleData)
                });
            },

            destroy: function (id) {
                return $http.delete('/api/blog/' + id);
            }
        }

    });

