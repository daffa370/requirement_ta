<!doctype html>
<html lang="en">

@include("web.layout.head")

<body>


@include("components.nav")

<div class="container mt-4">
    @yield("container")
</div>


@include("web.layout.header.js")
</body>
</html>
