angular.module('BlogItemController', [])

    .controller('blogItemController', function ($scope, $http, $routeParams, $sce, Article) {
        $scope.article = {};
        $scope.loading = true;
        $scope.success = false;
        $scope.error = false;

        Article.item($routeParams.id)
            .success(function (data) {
                data.html = $sce.trustAsHtml(data.text);
                $scope.article = data;
                $scope.loading = false;
                $scope.success = false;
                $scope.error = false;
            });
    });

