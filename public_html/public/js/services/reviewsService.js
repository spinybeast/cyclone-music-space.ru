angular.module('reviewsService', [])

    .factory('Comment', function ($http) {

        return {
            // get published comments
            get: function () {
                return $http.get('/api/comments');
            },

            //get all the comments
            show: function () {
                return $http.get('/api/comments/show');
            },

            update: function (id, commentData) {
                return $http.put('/api/comments/' + id, commentData);
            },

            // save a comment (pass in comment data)
            save: function (commentData) {
                return $http({
                    method: 'POST',
                    url: '/api/comments',
                    headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                    data: $.param(commentData)
                });
            },

            // destroy a comment
            destroy: function (id) {
                return $http.delete('/api/comments/' + id);
            }
        }

    });

