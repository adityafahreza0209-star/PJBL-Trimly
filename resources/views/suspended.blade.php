<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Studio Unavailable - Trimly OS</title>
  
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Geist:wght@300;400;500;600;700&family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400&display=swap" rel="stylesheet">
  
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-background text-primary font-sans flex flex-col items-center justify-center min-h-screen text-center m-0 p-0">

  <div class="max-w-[600px] p-8">
    <a href="#" class="font-serif text-2xl font-semibold text-primary no-underline inline-block mb-12">Trimly<span class="text-primary">.</span></a>
    
    <div class="w-10 h-0.5 bg-primary mx-auto mb-8"></div>
    
    @php
        $reason = request('reason', 'manual');
    @endphp

    @if($reason === 'trial_ended')
      <h1 class="font-serif text-4xl font-medium mb-6 leading-tight">Free Trial Has Ended</h1>
      <p class="text-lg leading-relaxed text-primary/70 mb-12">
        Halaman pemesanan untuk <strong class="text-primary font-semibold">Gentleman's Cut</strong> saat ini sedang tidak dapat diakses. Studio perlu melakukan upgrade paket langganan untuk dapat menerima booking kembali.
      </p>
    @else
      <h1 class="font-serif text-4xl font-medium mb-6 leading-tight">Studio Temporarily Unavailable</h1>
      <p class="text-lg leading-relaxed text-primary/70 mb-12">
        Halaman pemesanan untuk <strong class="text-primary font-semibold">Gentleman's Cut</strong> saat ini sedang ditangguhkan atau tidak dapat diakses. Mohon hubungi pihak studio secara langsung untuk informasi lebih lanjut mengenai penjadwalan.
      </p>
    @endif

    <x-button-outline size="normal" href="{{ url('/') }}" variant="primary">Return to Trimly Platform</x-button-outline>
    
    <div class="mt-20 text-sm text-primary/50">
      Powered by Trimly OS
    </div>
  </div>

</body>
</html>
