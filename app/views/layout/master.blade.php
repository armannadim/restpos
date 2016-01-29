<!DOCTYPE html>
<!--
This project has been created by Aseq A Arman Nadim.
Anyone can use this project and its contents but with permission of the author of this project.
Email: armannadim@msn.com
-->
<html>
    <head>
        <meta charset="UTF-8">
        @include('static.meta')
        <title></title>
    </head>

    <body class=" breakpoint-1024 pace-done">
    <div class="page-container row-fluid">
        @include('static.header')
        



        @yield('content')


    @include('static.footer')
    @include('static.meta_foot')
</div>
    </body>
</html>
