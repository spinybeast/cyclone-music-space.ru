angular.module('PortfolioController', [])

    .controller('portfolioController', function ($scope, $http, $sce, SoundCloud) {

        $scope.tags = [];
        $scope.tmpTags = [];
        $scope.tracks = [];
        $scope.loading = true;
        $scope.success = false;
        $scope.error = false;
        $scope.getSongUrl = function (id) {
            return $sce.trustAsResourceUrl("https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/" + id + "&color=259798&auto_play=false&hide_related=false&show_comments=true&show_user=true&show_reposts=true&show_artwork=true");
        };
        $scope.showAll = true;
        $scope.checkChange = function () {
            $scope.showAll = true;

            $scope.tags.forEach(function (tag) {
                if (tag.selected) {
                    $scope.showAll = false;
                    return;
                }
            });
        };

        $scope.checkTags = function (track) {
            if ($scope.showAll) {
                return true;
            }
            $scope.loading = true;
            var selected = false;

            $scope.tags.forEach(function (tag) {
                if (tag.selected) {
                    if (track.tags.indexOf(tag.title) == -1) {
                        return false;
                    } else {
                        selected = true;
                    }
                }
            });
            $scope.loading = false;
            return selected;
        };

            SoundCloud.get().success(function (data) {
                data.forEach(function (track) {
                    track.tags = [];
                    var tags = track.tag_list.split(' ');

                    tags.push(track.genre);
                    tags.forEach(function (tag) {
                        tag = tag.toLowerCase();
                        if (tag.length) {
                            track.tags.push(tag);
                            if ($scope.tmpTags.indexOf(tag) == -1) {
                                $scope.tmpTags.push(tag);
                            }
                        }
                    });
                });
                $scope.tmpTags.forEach(function (tag) {
                    $scope.tags.push({'title': tag, 'selected': false});
                });
                $scope.tracks = data;
                $scope.loading = false;
                $scope.success = true;
                $scope.error = false;

            }).error(function () {
                $scope.loading = false;
                $scope.success = false;
                $scope.error = true;
            });
    });

