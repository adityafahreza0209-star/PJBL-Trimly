<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="refresh" content="0; url={{ url('book') }}">
  <script>window.location.href="{{ url('book') }}";</script>
  <title>Redirecting to The Noble Barber Booking...</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-background flex items-center justify-center min-h-screen">
  <x-card padding="large" highlight="true" bgColor="bg-surface" class="text-center">
    <p class="text-lg text-primary mb-4">Redirecting to The Noble Barber Booking Portal...</p>
    <p class="text-sm text-primary/60 mb-6">If you are not redirected automatically, click the link below.</p>
    <x-button-primary href="{{ url('book') }}" size="normal">
      Click here
    </x-button-primary>
  </x-card>
</body>
</html>
