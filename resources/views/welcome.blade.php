<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Trimly') }}</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Geist:wght@400;500;600;700&family=Outfit:wght@400;500;600;700&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-background text-primary font-sans antialiased min-h-screen flex flex-col">
    <header class="w-full flex items-center justify-between p-6 lg:px-8 border-b border-border-light bg-surface">
        <div class="flex items-center">
            <h1 class="text-2xl font-bold font-serif text-primary">Trimly</h1>
        </div>
        
        @if (Route::has('login'))
            <nav class="flex items-center gap-4">
                @auth
                    <a href="{{ url('/dashboard') }}" class="text-sm font-medium hover:text-primary transition-colors">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}" class="text-sm font-medium hover:text-primary transition-colors">
                        Log in
                    </a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">
                            <x-button-primary class="px-4 py-2 text-sm">Register</x-button-primary>
                        </a>
                    @endif
                @endauth
            </nav>
        @endif
    </header>

    <main class="flex-grow flex items-center justify-center p-6 lg:p-8">
        <x-card class="max-w-4xl w-full p-8 md:p-12 text-center bg-white shadow-xl border border-border-light rounded-2xl">
            <h2 class="text-4xl md:text-5xl font-serif font-bold text-primary mb-6">Welcome to Trimly</h2>
            <p class="text-lg text-primary/60 mb-8 max-w-2xl mx-auto leading-relaxed">
                The modern booking management system for barbershops and salons. Streamline your appointments, manage your staff, and grow your business effortlessly.
            </p>
            
            <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                @auth
                    <a href="{{ url('/dashboard') }}">
                        <x-button-primary class="px-8 py-3 text-lg font-medium">Go to Dashboard</x-button-primary>
                    </a>
                @else
                    <a href="{{ route('login') }}">
                        <x-button-primary class="px-8 py-3 text-lg font-medium">Get Started</x-button-primary>
                    </a>
                    <a href="#features">
                        <x-button-outline class="px-8 py-3 text-lg font-medium">Learn More</x-button-outline>
                    </a>
                @endauth
            </div>
            
            <div class="mt-16 grid grid-cols-1 md:grid-cols-3 gap-6 text-left" id="features">
                <div class="p-6 bg-surface rounded-xl border border-border-light transition-shadow hover:shadow-md">
                    <div class="w-12 h-12 bg-primary/10 text-primary rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    </div>
                    <h3 class="text-lg font-bold mb-2 text-foreground">Smart Scheduling</h3>
                    <p class="text-sm text-primary/60">Effortlessly manage appointments with our intuitive and flexible calendar interface.</p>
                </div>
                
                <div class="p-6 bg-surface rounded-xl border border-border-light transition-shadow hover:shadow-md">
                    <div class="w-12 h-12 bg-primary/10 text-primary rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                    </div>
                    <h3 class="text-lg font-bold mb-2 text-foreground">Staff Management</h3>
                    <p class="text-sm text-primary/60">Keep track of your team's schedules, performance, and commissions in one place.</p>
                </div>
                
                <div class="p-6 bg-surface rounded-xl border border-border-light transition-shadow hover:shadow-md">
                    <div class="w-12 h-12 bg-primary/10 text-primary rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                    </div>
                    <h3 class="text-lg font-bold mb-2 text-foreground">Analytics & Reports</h3>
                    <p class="text-sm text-primary/60">Gain powerful insights into your business performance with our detailed reports.</p>
                </div>
            </div>
        </x-card>
    </main>

    <footer class="py-6 text-center text-sm text-primary/60 bg-surface border-t border-border-light mt-auto">
        <p>&copy; {{ date('Y') }} Trimly. All rights reserved.</p>
    </footer>
</body>
</html>
