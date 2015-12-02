angular.module('BlogController', [])

    .controller('blogController', function ($scope, $http, Article) {
        $scope.articleData = {};
        $scope.uploader = {
            setPhoto: function ($flow, $file, $message) {
                $scope.articleData.img = JSON.parse($message).filename;
            },
            setNoPhoto: function () {
                $scope.articleData.img = null;
            }
        };
        $scope.loading = true;
        $scope.success = false;
        $scope.error = false;

        Article.published()
            .success(function (data) {
                $scope.articles = data;
                $scope.articles1 = [];
                $scope.articles2 = [];
                $.each(data, function(index, article) {
                    if (article.category == 1) {
                        $scope.articles1.push(article);
                    } else {
                        $scope.articles2.push(article);
                    }
                });
                $scope.loading = false;
                $scope.success = false;
                $scope.error = false;
            });
    });

