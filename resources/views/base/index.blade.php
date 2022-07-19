<!DOCTYPE html>
<html lang="pt-BR">
    @include('base.header', ['title' => 'teste'])
<body>
    <div class="container">
        @yield('container')
    </div>
    @include('base.footer')
</body>
</html>
