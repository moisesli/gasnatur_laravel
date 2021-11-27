<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ config('app.name', 'Laravel') }}</title>

  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet"/>

  <!-- Tailwind -->
  <link rel="stylesheet" href="{{ asset('theme/css/tailwind.output.css') }}"/>

  <link rel="stylesheet" href="{{ asset('fonts/all.min.css') }}"/>

  <!-- Scripts -->
  <script src="{{ mix('js/app.js') }}" defer></script>
  <script src="{{ asset('theme/js/init-alpine.js') }}"></script>

</head>
<body>
{{ $slot }}
</body>
</html>
