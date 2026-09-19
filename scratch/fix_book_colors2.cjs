const fs = require('fs');

let f = fs.readFileSync('resources/views/book.blade.php', 'utf8');

// The Title: The Noble Barber
f = f.replace(/class="font-serif text-2xl lg:text-3xl font-semibold leading-tight text-primary"/, 'class="font-serif text-2xl lg:text-3xl font-semibold leading-tight text-secondary"');

// <h2> are already fixed to text-secondary by my previous script
// Let's make sure ALL text-primary outside of order summary and badges are fixed

// Badges inside service selection:
// <x-badge class="bg-primary/10 text-primary">45 MINS • DP Rp 50.000</x-badge> -> these are fine

// But Capster names might have text-primary if the previous agents messed them up?
// Let's replace any text-primary with text-secondary in the main content area (Left Column) EXCEPT for the badges
// Wait, I can just replace all text-primary with text-secondary globally, then put back text-primary for the badges and DP.
f = f.replace(/text-primary/g, 'text-secondary');

// Put back text-primary for the dot in "The Noble Barber."
f = f.replace(/The Noble Barber<span class="text-secondary">.<\/span>/g, 'The Noble Barber<span class="text-primary">.</span>');

// Put back text-primary for the Badges
f = f.replace(/<x-badge class="bg-secondary\/10 text-secondary">/g, '<x-badge class="bg-primary/10 text-primary">');

// Put back text-primary for the Order Summary DP
f = f.replace(/<span class="font-bold text-secondary" id="summDP">/g, '<span class="font-bold text-primary" id="summDP">');

// Put back text-primary for the Checkout Button text if it was bg-white text-primary
// Wait, I changed the checkout button to bg-[#7F8C82] text-white or bg-white/30.
// Let's fix the button exactly to match the user's screenshot.
f = f.replace(/id="btnCheckout"(.*?)>/, 'id="btnCheckout"$1>');

// Ticket Modal and Drawer Riwayat Booking uses text-primary for its UI (or should it be secondary?)
// The user said "jangan terlalu banyak orange". So changing them to secondary is fine.

fs.writeFileSync('resources/views/book.blade.php', f);
console.log("Replaced text-primary with text-secondary");
