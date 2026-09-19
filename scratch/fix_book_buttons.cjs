const fs = require('fs');

let f = fs.readFileSync('resources/views/book.blade.php', 'utf8');

// Fix checkout button to match portal.css
f = f.replace(/class="([^"]*)bg-white\/30 text-white([^"]*)"(.*?)id="btnCheckout"/, 'class="w-full flex justify-center items-center gap-2 bg-white text-secondary font-semibold text-base p-4 rounded-md hover:bg-gray-100 transition-colors disabled:bg-white/50 disabled:cursor-not-allowed" id="btnCheckout"');

// Ticket modal Buka E-Ticket Digital button - is it orange?
// In portal.css, history drawer:
// `<a href="ticket.html" class="btn-checkout" style="... background: var(--terracotta); color: white; ...">Buka E-Ticket Digital</a>`
f = f.replace(/class="([^"]*)bg-secondary hover:bg-secondary-light text-white(.*?)>Buka E-Ticket Digital/g, 'class="$1bg-primary hover:bg-primary-hover text-white$2>Buka E-Ticket Digital');
// If it was bg-primary, leave it. My previous script replaced text-primary globally, so it might be bg-secondary.

// Modal headings - ensure they are text-secondary
// The user already saw them as text-secondary, except "Slot Confirmed" might be missing the color?

fs.writeFileSync('resources/views/book.blade.php', f);
console.log('Fixed book.blade.php buttons');
