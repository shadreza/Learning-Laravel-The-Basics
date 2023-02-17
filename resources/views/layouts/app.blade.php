<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Laravel App Layout</title>
    </head>
    <body>
        @yield('content')
        <div>
            <h2 style="color: maroon;">This is a common part of the layout</h2>
        </div>
        @yield('footer')
    </body>
</html>
