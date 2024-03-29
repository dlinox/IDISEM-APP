<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    @vite(['resources/js/app.js', "resources/js/Pages/{$page['component']}.vue"])
    @vite(['resources/css/app.css', "resources/sass/app.scss"])
    @inertiaHead
    @laravelPWA
  </head>
  <body>
    @inertia
  </body>
</html>