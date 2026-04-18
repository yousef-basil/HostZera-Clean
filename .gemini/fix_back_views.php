<?php
function update_views($dir) {
    $files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($dir));
    foreach ($files as $file) {
        if ($file->isDir()) continue;
        if (pathinfo($file->getFilename(), PATHINFO_EXTENSION) == 'php') {
            $content = file_get_contents($file->getPathname());
            $content = str_replace(["'admin.", "\"admin."], ["'back.", "\"back."], $content);
            file_put_contents($file->getPathname(), $content);
            echo "Updated: " . $file->getFilename() . "\n";
        }
    }
}

update_views('resources/views/back');
echo "All Admin views updated to Back view references.\n";
