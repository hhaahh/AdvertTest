<div ng-controller="NewsController">
    <table ng-init="getNews()">
        <tr ng-repeat="newsItem in news" ng-cloak>
            <td>{{newsItem.title}}</td>
            <td>{{newsItem.text}}</td>
            <td>{{newsItem.created_date}}</td>
        </tr>
    </table>
</div>