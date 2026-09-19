const fs = require('fs');

// --- Fix JS file ---
let js = fs.readFileSync('public/js/portal.js', 'utf8');

js = js.replace(/pill\.className = 'date-pill' \+ \(i === 0 \? ' active' : ''\);/g, "pill.className = 'flex flex-col items-center justify-center p-3 border border-border-light rounded-lg cursor-pointer transition-colors bg-surface hover:border-gray-300 min-w-[70px] shrink-0' + (i === 0 ? ' bg-secondary text-white border-secondary' : ' text-secondary');");

js = js.replace(/<span class="date-day">/g, '<span class="text-xs font-semibold mb-1 uppercase tracking-wider opacity-80">');
js = js.replace(/<span class="date-num">/g, '<span class="text-xl font-bold font-serif">');

js = js.replace(/pill\.classList\.add\('active'\);/g, "pill.classList.add('bg-secondary', 'text-white', 'border-secondary'); pill.classList.remove('bg-surface', 'text-secondary');");

js = js.replace(/document\.querySelectorAll\('\.date-pill'\)\.forEach\(p => p\.classList\.remove\('active'\)\);/g, "document.querySelectorAll('#dateScroll > div').forEach(p => { p.classList.remove('bg-secondary', 'text-white', 'border-secondary'); p.classList.add('bg-surface', 'text-secondary'); });");

js = js.replace(/btn\.className = 'time-btn';/g, "btn.className = 'py-3 text-sm font-semibold border border-border-light rounded-lg cursor-pointer transition-colors bg-surface hover:border-gray-300 text-secondary disabled:opacity-30 disabled:cursor-not-allowed disabled:bg-gray-50';");

js = js.replace(/btn\.classList\.add\('active'\);/g, "btn.classList.add('bg-secondary', 'text-white', 'border-secondary'); btn.classList.remove('bg-surface', 'text-secondary');");

js = js.replace(/document\.querySelectorAll\('\.time-btn'\)\.forEach\(b => b\.classList\.remove\('active'\)\);/g, "document.querySelectorAll('#timeGrid > button').forEach(b => { b.classList.remove('bg-secondary', 'text-white', 'border-secondary'); b.classList.add('bg-surface', 'text-secondary'); });");

fs.writeFileSync('public/js/portal.js', js);

// --- Fix PHP file ---
let php = fs.readFileSync('resources/views/book.blade.php', 'utf8');
// Fix h2 headings which are orange
php = php.replace(/<h2([^>]*)text-primary([^>]*)>/g, '<h2$1text-secondary$2>');

// Capster initials shouldn't be orange, they should be text-secondary
php = php.replace(/<div class="w-14 h-14 rounded-full bg-gray-100 flex items-center justify-center font-serif font-semibold text-xl mb-4 text-primary border border-border-light">/g, '<div class="w-14 h-14 rounded-full bg-gray-100 flex items-center justify-center font-serif font-semibold text-xl mb-4 text-secondary border border-border-light">');

// The "service-name" class is missing, we need to add it to the services so portal.js can find it
php = php.replace(/<div class="font-bold text-lg mb-1">/g, '<div class="font-bold text-lg mb-1 service-name">');

fs.writeFileSync('resources/views/book.blade.php', php);

console.log('Fixed js and php');
