angular.module('BlogController', [])

    .controller('blogController', function ($scope, $http, Article) {
        $scope.articleData = {};
        $scope.categories = [
            {value: 1, text: 'Музыка'},
            {value: 2, text: 'Путешествия'}
        ];
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

        Article.get()
            .success(function (data) {
                $scope.articles = data;
                $scope.loading = false;
                $scope.success = false;
                $scope.error = false;
            });

        $scope.submitArticle = function () {
            $scope.loading = true;
            $scope.success = false;
            $scope.error = false;
            Article.save($scope.articleData)
                .success(function (data) {
                    $scope.success = true;
                    $scope.error = false;
                    $scope.loading = false;
                    $scope.articleData = {};
                })
                .error(function (data) {
                    $scope.error = true;
                    console.log(data);
                });
        };

        $scope.updateArticle = function (article) {
            $scope.loading = true;
            Article.update(article.id, article)
                .success(function () {
                    Article.get()
                        .success(function (data) {
                            $scope.articles = data;
                            $scope.loading = false;
                        });
                });
        };

        $scope.publishArticle = function (article) {
            $scope.loading = true;

            article.published = 1;
            Article.update(article.id, article)
                .success(function () {
                    Article.get()
                        .success(function (data) {
                            $scope.articles = data;
                            $scope.loading = false;
                        });
                });
        };

        $scope.unPublishArticle = function (article) {
            $scope.loading = true;

            article.published = 0;
            Article.update(article.id, article)
                .success(function () {
                    Article.get()
                        .success(function (data) {
                            $scope.articles = data;
                            $scope.loading = false;
                        });
                });
        };

        $scope.deleteArticle = function (id) {
            $scope.loading = true;

            Article.destroy(id)
                .success(function () {
                    $scope.loading = false;
                    Article.get()
                        .success(function (data) {
                            $scope.articles = data;
                            $scope.loading = false;
                        });

                });
        };

    });

