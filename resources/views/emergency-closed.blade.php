<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Studio Sedang Tutup Sementara — {{ $barbershop->name }} | Trimly</title>
  
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Geist:wght@300;400;500;600;700&family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400&display=swap" rel="stylesheet">
  
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-background text-primary font-sans flex flex-col items-center justify-center min-h-screen text-center m-0 p-0">

  <div class="max-w-[600px] p-8">
    <a href="{{ url('/') }}" class="font-serif text-2xl font-semibold text-primary no-underline inline-block mb-12">Trimly<span class="text-primary">.</span></a>
    
    <div class="w-10 h-0.5 bg-rose-500 mx-auto mb-8"></div>
    
    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-rose-50 border border-rose-200 text-rose-700 text-xs font-semibold mb-6">
      <span class="w-2 h-2 rounded-full bg-rose-500 animate-pulse"></span>
      Emergency Mode Active
    </div>

    <h1 class="font-serif text-4xl font-medium mb-6 leading-tight">Studio Sedang Tutup Sementara</h1>
    
    <p class="text-lg leading-relaxed text-primary/70 mb-12">
      Halaman pemesanan untuk <strong class="text-primary font-semibold">{{ $barbershop->name }}</strong> saat ini sedang tidak menerima reservasi baru karena studio sedang berada dalam status tutup darurat (Emergency Close). Silakan kunjungi kembali beberapa saat lagi atau hubungi barbershop terkait.
    </p>

    <x-button-outline size="normal" href="{{ url('/') }}" variant="primary">Return to Trimly Platform</x-button-outline>
    
    <div class="mt-20 text-sm text-primary/50">
      Powered by Trimly OS
    </div>
  </div>

</body>
</html>
