const fs = require('fs');
const path = require('path');

const bookPath = path.join(__dirname, '../resources', 'views', 'book.blade.php');
const capsterPath = path.join(__dirname, '../resources', 'views', 'capster.blade.php');

function fixFile(filePath) {
    if (!fs.existsSync(filePath)) return;
    let content = fs.readFileSync(filePath, 'utf8');
    
    // Fix body tag
    content = content.replace(/<body([^>]*)text-primary([^>]*)>/g, '<body$1text-secondary$2>');
    
    // Specific fixes for book.blade.php
    if (filePath.includes('book.blade.php')) {
        // Fix Order Summary background
        content = content.replace(/class="([^"]*)bg-primary([^"]*)text-white([^"]*)"/g, 'class="$1bg-secondary$2text-white$3"'); 
        content = content.replace(/bg-primary\/50/g, 'bg-secondary/60');
        
        content = content.replace(/text-\[#D96B43\]/g, 'text-primary');
        content = content.replace(/bg-\[#D96B43\]/g, 'bg-primary');
    }

    // Specific fixes for capster.blade.php
    if (filePath.includes('capster.blade.php')) {
        content = content.replace(/text-\[#D96B43\]/g, 'text-primary');
        content = content.replace(/bg-\[#D96B43\]/g, 'bg-primary');
        content = content.replace(/text-\[#14221D\]/g, 'text-secondary');
        content = content.replace(/bg-\[#14221D\]/g, 'bg-secondary');
    }

    fs.writeFileSync(filePath, content, 'utf8');
}

fixFile(bookPath);
fixFile(capsterPath);

console.log('Fixed book and capster views');
