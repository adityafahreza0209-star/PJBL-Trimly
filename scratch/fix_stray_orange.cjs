const fs = require('fs');

// Fix capster.blade.php
let capster = fs.readFileSync('resources/views/capster.blade.php', 'utf8');
capster = capster.replace(/bg-primary/g, 'bg-secondary');
capster = capster.replace(/bg-\[#c55b34\]/g, 'bg-secondary-light');
capster = capster.replace(/border-primary/g, 'border-secondary');
fs.writeFileSync('resources/views/capster.blade.php', capster);

// Fix dashboard.blade.php
let dashboard = fs.readFileSync('resources/views/dashboard.blade.php', 'utf8');
dashboard = dashboard.replace(/bg-primary/g, 'bg-secondary');
dashboard = dashboard.replace(/border-primary/g, 'border-secondary');
dashboard = dashboard.replace(/text-\[#D96B43\]/g, 'text-secondary'); // if any
fs.writeFileSync('resources/views/dashboard.blade.php', dashboard);

// Fix overview.blade.php
let overview = fs.readFileSync('resources/views/overview.blade.php', 'utf8');
overview = overview.replace(/bg-primary/g, 'bg-secondary');
fs.writeFileSync('resources/views/overview.blade.php', overview);

// Fix superadmin.blade.php
let superadmin = fs.readFileSync('resources/views/superadmin.blade.php', 'utf8');
superadmin = superadmin.replace(/peer-checked:bg-primary/g, 'peer-checked:bg-secondary');
fs.writeFileSync('resources/views/superadmin.blade.php', superadmin);

// Fix ticket.blade.php
let ticket = fs.readFileSync('resources/views/ticket.blade.php', 'utf8');
ticket = ticket.replace(/bg-primary/g, 'bg-secondary');
ticket = ticket.replace(/border-primary/g, 'border-secondary');
// Wait, seal in ticket is orange in original? "Success Ticket Modal Seal: Background: rgba(217, 107, 67, 0.10) Color: #D96B43"
ticket = ticket.replace(/bg-secondary\/5 text-secondary/g, 'bg-primary/10 text-primary'); // I might have broken it, let's just make everything secondary for now, except the seal
fs.writeFileSync('resources/views/ticket.blade.php', ticket);

// Fix index.blade.php
let idx = fs.readFileSync('resources/views/index.blade.php', 'utf8');
// Feature icons were bg-primary text-white. Should be bg-primary/10 text-primary.
idx = idx.replace(/w-14 h-14 bg-primary text-white rounded-md/g, 'w-14 h-14 bg-primary/10 text-primary rounded-md');
idx = idx.replace(/shadow-\[0_8px_16px_-4px_rgba\(217,107,67,0\.3\)\]/g, ''); // removed orange shadow for feature boxes

// ROI Calculator sliders
idx = idx.replace(/\[&::-webkit-slider-thumb\]:bg-primary/g, '[&::-webkit-slider-thumb]:bg-secondary');

// Pricing toggle track
// <span class="absolute top-1 left-1 w-4 h-4 rounded-full bg-primary transition-transform"></span> -> this is the knob? No, the knob is white.
idx = idx.replace(/w-4 h-4 rounded-full bg-primary/g, 'w-4 h-4 rounded-full bg-secondary');

// Oh wait, the track is bg-secondary and the knob is bg-white.
// In index.blade.php: <div class="w-12 h-6 bg-white/20 rounded-full ...">
// If it was white/20, that means the container is dark. Let's just leave the toggle track as is, just fix the bg-primary knob.

// "Most Popular" pill
// <div class="absolute top-0 left-1/2 -translate-x-1/2 -translate-y-1/2 bg-primary text-white
// This should remain bg-primary! So we must NOT blindly replace bg-primary in index.blade.php.
// Wait, my replace above only targeted specific lines for index.blade.php.

fs.writeFileSync('resources/views/index.blade.php', idx);

console.log('Fixed stray orange colors');
