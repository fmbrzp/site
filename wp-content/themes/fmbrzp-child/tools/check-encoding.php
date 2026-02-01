<?php
$root = realpath(__DIR__ . '/..');
$extensions = ['php', 'css', 'js'];
$badPatterns = ["Ã", "Â", "�"];
$found = false;

$iterator = new RecursiveIteratorIterator(
    new RecursiveDirectoryIterator($root, FilesystemIterator::SKIP_DOTS)
);

foreach ($iterator as $file) {
    if (!$file->isFile()) {
        continue;
    }

    $ext = strtolower($file->getExtension());
    if (!in_array($ext, $extensions, true)) {
        continue;
    }

    $path = $file->getPathname();
    $content = @file_get_contents($path);
    if ($content === false) {
        continue;
    }

    $lines = preg_split('/\R/', $content);
    foreach ($lines as $i => $line) {
        foreach ($badPatterns as $pattern) {
            if (strpos($line, $pattern) !== false) {
                $found = true;
                $lineNo = $i + 1;
                echo $path . ':' . $lineNo . ': ' . $line . PHP_EOL;
                break;
            }
        }
    }
}

if ($found) {
    exit(1);
}

echo "OK: nenhum problema de encoding encontrado." . PHP_EOL;
exit(0);