const fs = require('fs');
let f = fs.readFileSync('resources/views/login.blade.php', 'utf8');
f = f.replace(/variant="primary"/g, 'variant="accent"');
fs.writeFileSync('resources/views/login.blade.php', f);
