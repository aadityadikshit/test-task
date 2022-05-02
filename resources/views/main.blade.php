@include('header')

<body class="js-body-content" ng-app="MyApp">
    @yield('content')
    @include('footer')
    @yield('script')
</body>

</html>