const fs = require('fs');

let f = fs.readFileSync('resources/views/book.blade.php', 'utf8');

// The active selection borders should be secondary (dark)
f = f.replace(/peer-checked:border-primary/g, 'peer-checked:border-secondary');
f = f.replace(/peer-checked:ring-primary/g, 'peer-checked:ring-secondary');

// Active dates / times
f = f.replace(/bg-primary text-white/g, 'bg-secondary text-white');

// Order summary button
f = f.replace(/bg-white text-primary font-semibold text-base p-4 rounded-lg hover:bg-gray-100 transition-colors disabled:opacity-50 disabled:cursor-not-allowed/g, 'bg-white/30 text-white font-semibold text-base p-4 rounded-lg hover:bg-white/40 transition-colors disabled:opacity-50 disabled:cursor-not-allowed');

// Any hardcoded hex colors #D96B43 in book
f = f.replace(/#D96B43/g, 'primary');

fs.writeFileSync('resources/views/book.blade.php', f);
