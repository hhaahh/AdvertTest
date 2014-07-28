<div ng-controller="NewsController">
    Сортировать:
    <ul>
        <li><a href="#" ng-click="setOrder('created_date', false)">по дате</a></li>
        <li><a href="#" ng-click="setOrder('like_count', true)">по полезности</a></li>
    </ul>
    <table ng-init="getNews()">
        <tr ng-repeat="newsItem in news | orderBy: orderOptions.field:reverseOptions[orderOptions.field]" ng-cloak>
            <td>{{newsItem.title}}</td>
            <td>{{newsItem.text}}</td>
            <td>{{newsItem.created_date}}</td>
        </tr>
    </table>
</div>