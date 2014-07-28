function NewsController($scope, $http) {
    $scope.news = [];

    $scope.getNews = function() {
        $http({
            url: '/news/getNews',
            method: 'GET'
        }).success(function(data) {
            angular.forEach(data, function(newsItem) {
                newsItem.like_count = Number(newsItem.like_count);
                $scope.news.push(newsItem);
            });
        });
    }
}