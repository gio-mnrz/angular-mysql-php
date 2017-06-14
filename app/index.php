<!DOCTYPE html>

<html ng-app="myApp">
    <head>
        <title>AngularJS Example</title>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        
        <meta name="author" content="Geovanni Montero Rodriguez. &#60;gio.mnrz@gmail.com&#62;" />
        <meta name="description" content="Created with AngularJS, Angular-UI-Bootstrap, MySql and PHP" />
        <meta name="keywords" content="AngularJS, Angular-UI-Bootstrap, Bower, MySql, NPMJS, PHP, Todo List" />

        <!-- CSS Dependencies -->
        <link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />

        <!-- Custom CSS -->
        <link href="app.css" rel="stylesheet" type="text/css" />

        <!-- JS Dependencies -->
        <script src="bower_components/angular/angular.min.js" ></script>
        <script src="bower_components/angular-animate/angular-animate.min.js" ></script>
        <script src="bower_components/angular-ui-bootstrap-bower/ui-bootstrap-tpls.min.js" ></script>
        <script src="bower_components/angular-route/angular-route.min.js" ></script>
        
        <!-- Custom JS -->
        <script src="app.module.js" ></script>
        <script src="app.config.js" ></script>
        <script src="core/core.module.js" ></script>
        <script src="core/todo/todo.module.js" ></script>
        <script src="core/todo/todo.service.js" ></script>
        <script src="core/notification/notification.module.js" ></script>
        <script src="core/notification/notification.component.js" ></script>
        <script src="core/modal/modal.module.js" ></script>
        <script src="core/modal/modal.directive.js" ></script>
        <script src="components/todo-list/todo-list.module.js" ></script>
        <script src="components/todo-list/todo-list.component.js" ></script>
        <script src="components/todo-edit/todo-edit.module.js" ></script>
        <script src="components/todo-edit/todo-edit.controller.js" ></script>
    </head>

    <body>

        <!-- header -->
        <nav class="navbar navbar-default navbar-fixed-top header">
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand" href="!#" ng-click="$event.preventDefault();" >{{ '&#60;Todo-' + 'List&#47;&#62;' }}</a>
                </div>
            </div>
        </nav>
        <!-- /header -->

        <!-- container -->
        <div class="container">
            <div ng-view></div>
        </div>
        <!-- /container -->

        <notification></notification>

        <!-- footer -->
        <nav class="navbar navbar-inverse navbar-fixed-bottom footer">
            <div class="container">
                <div class="navbar-header">
                    <div class="navbar-brand">
                        by gio.mnrz&#64;gmail.com
                    </div>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li><a>&#124; An AngularJS Application</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- /footer -->

    </body>
    
</html>