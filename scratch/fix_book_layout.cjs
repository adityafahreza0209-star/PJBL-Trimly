const fs = require('fs');

let f = fs.readFileSync('resources/views/book.blade.php', 'utf8');

// 1. Kurangi bulat pada Order Summary dan perbesar ukurannya
f = f.replace(/lg:w-\[35\%\]/g, 'lg:w-[40%]');
f = f.replace(/rounded-t-2xl lg:rounded-2xl/g, 'rounded-t-lg lg:rounded-xl');

// 2. Jangan terlalu bulat di capster/service cards
f = f.replace(/rounded-lg/g, 'rounded-md'); // Globally change rounded-lg to rounded-md for sharper corners in forms

// But keep the checkout button rounded-md
f = f.replace(/rounded-t-md/g, 'rounded-t-lg'); // fix the order summary if it got replaced

// 3. Capster Circles styling
// Replace bg-gray-100 with bg-white border border-gray-200
f = f.replace(/w-14 h-14 rounded-full bg-gray-100 flex items-center justify-center font-serif font-semibold text-xl mb-4 text-secondary border border-border-light/g, 'w-14 h-14 rounded-full bg-white flex items-center justify-center font-serif font-semibold text-xl mb-4 text-secondary border border-gray-200');

// "Any Available" circle is already bg-secondary text-white

// 4. Selection states (peer-checked)
// Instead of border-secondary ring-1 ring-secondary bg-gray-50
// Make it border-2 border-secondary bg-white
f = f.replace(/peer-checked:border-secondary peer-checked:ring-secondary peer-checked:bg-gray-50/g, 'peer-checked:border-secondary peer-checked:border-2 peer-checked:bg-white');
// Some might have peer-checked:ring-1
f = f.replace(/peer-checked:ring-1/g, '');

fs.writeFileSync('resources/views/book.blade.php', f);

// For portal.js, update the date and time buttons to be less rounded and use border-2 for active
let js = fs.readFileSync('public/js/portal.js', 'utf8');

js = js.replace(/rounded-lg/g, 'rounded-md');
js = js.replace(/pill\.classList\.add\('bg-secondary', 'text-white', 'border-secondary'\);/g, "pill.classList.add('bg-secondary', 'text-white', 'border-secondary');");
js = js.replace(/btn\.classList\.add\('bg-secondary', 'text-white', 'border-secondary'\);/g, "btn.classList.add('bg-secondary', 'text-white', 'border-secondary');");

fs.writeFileSync('public/js/portal.js', js);

console.log('Fixed book.blade.php and portal.js layout details');
