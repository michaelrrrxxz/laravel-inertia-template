<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title inertia>{{ config('app.name', 'Laravel') }}</title>

     @vite('resources/css/app.css')
     <script src="https://cdn.tailwindcss.com"></script>

    <!-- Tailwind Config: Enable dark mode via class -->
    <script>
      tailwind.config = {
        darkMode: 'class',
        theme: {
          extend: {
            colors: {

            },
          },
        },
      };
    </script>
    @inertiaHead
    @routes
    <title>Laravel</title>
  </head>
  <body class="antialiased bg-gray-100 text-gray-900">
    @inertia
    @vite(['resources/js/app.js', "resources/js/Pages/{$page['component']}.vue"])
  </body>
</html>
