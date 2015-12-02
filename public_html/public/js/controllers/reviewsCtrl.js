angular.module('reviewsCtrl', [])

    .controller('reviewsController', function ($scope, $http, Comment) {
        $scope.commentData = {};

        $scope.loading = true;
        $scope.success = false;
        $scope.error = false;
        $scope.uploader = {
            setPhoto: function ($flow, $file, $message) {
                $scope.commentData.photo = JSON.parse($message).filename;
            },
            setNoPhoto: function () {
                $scope.commentData.photo = null;
            }
        };
        Comment.show()
            .success(function (data) {
                $scope.comments = data;
                $scope.loading = false;
                $scope.success = false;
                $scope.error = false;
            });

        $scope.submitComment = function () {
            $scope.loading = true;
            $scope.success = false;
            $scope.error = false;

            Comment.save($scope.commentData)
                .success(function (data) {
                    $scope.success = true;
                    $scope.error = false;
                    $scope.loading = false;

                    $scope.commentForm.$setPristine();
                    $scope.commentData = {};
                })
                .error(function (data) {
                    $scope.error = true;
                    console.log(data);
                });
            $('html, body').animate({ scrollTop: $(document).height() }, 'fast');
        };

        $scope.deleteComment = function (id) {
            $scope.loading = true;

            Comment.destroy(id)
                .success(function (data) {

                    Comment.get()
                        .success(function (getData) {
                            $scope.comments = getData;
                            $scope.loading = false;
                        });

                });
        };

    });
