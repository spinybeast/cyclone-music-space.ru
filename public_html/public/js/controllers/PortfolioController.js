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
        $scope.slashed = function(string) {
            return string.replace(/_/g, '/')
        };
        $scope.loadTracks = function (genre) {
            var container = $('#tracks_' + genre);
            container.toggleClass('hidden');
            var open = $('#' + genre + ' .open');
            var text = open.text();
            open.text(text == "+" ? "-" : "+");
            if (container.is(':visible') && container.is(':empty')) {
                $scope.tracks[genre].forEach(function (track) {
                    var time = 600;
                    setTimeout(function () {
                        var iframe = $('<iframe></iframe>').prop({
                            src: $scope.getSongUrl(track.id),
                            width: '100%',
                            height: 166,
                            frameborder: 'none',
                            'data-genre': track.genre
                        });
                        container.append(iframe);
                        time += 600;
                    }, time);
                });
            }
        };

        SoundCloud.get().success(function (data) {
            var allTracks = {};
            data.forEach(function (track) {
                track.tags = [];
                var tags = track.tag_list.split(' ');

                tags.push(track.genre);
                tags.forEach(function (tag) {
                    tag = tag.toLowerCase().replace(/\s/g, '').replace(/\//g, '_');
                    if (tag.length && tag != 'soundtrack') {
                        track.tags.push(tag);
                        if (allTracks[tag] == undefined) {
                            allTracks[tag] = [];
                        }
                        allTracks[tag].push(track);
                        if ($scope.tmpTags.indexOf(tag) == -1) {
                            $scope.tmpTags.push(tag);
                        }
                    }
                });
            });
            $scope.tags[0] = $scope.tmpTags.splice(0, Math.round($scope.tmpTags.length / 2));
            $scope.tags[1] = $scope.tmpTags;
            $scope.tracks = allTracks;
            $scope.loading = false;
            $scope.success = true;
            $scope.error = false;

        }).error(function () {
            $scope.loading = false;
            $scope.success = false;
            $scope.error = true;
        });
    });

