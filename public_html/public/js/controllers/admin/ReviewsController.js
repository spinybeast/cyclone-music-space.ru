angular.module('ReviewsController', [])

    .controller('reviewsController', function ($scope, $http, Comment) {
        $scope.commentData = {};

        $scope.loading = true;
        $scope.success = false;
        $scope.error = false;

        Comment.get()
            .success(function (data) {
                $scope.comments = data;
                $scope.loading = false;
                $scope.success = false;
                $scope.error = false;
            });

        $scope.updateComment = function (comment) {
            $scope.loading = true;
            Comment.update(comment.id, comment)
                .success(function () {
                    Comment.get()
                        .success(function (data) {
                            $scope.comments = data;
                            $scope.loading = false;
                        });
                });
        };

        $scope.publishComment = function (comment) {
            $scope.loading = true;

            comment.published = 1;
            Comment.update(comment.id, comment)
                .success(function () {
                    Comment.get()
                        .success(function (data) {
                            $scope.comments = data;
                            $scope.loading = false;
                        });
                });
        };

        $scope.unPublishComment = function (comment) {
            $scope.loading = true;

            comment.published = 0;
            Comment.update(comment.id, comment)
                .success(function () {
                    Comment.get()
                        .success(function (data) {
                            $scope.comments = data;
                            $scope.loading = false;
                        });
                });
        };

        $scope.deleteComment = function (id) {
            $scope.loading = true;

            Comment.destroy(id)
                .success(function () {
                    $scope.loading = false;
                    Comment.get()
                        .success(function (data) {
                            $scope.comments = data;
                            $scope.loading = false;
                        });

                });
        };

    });
