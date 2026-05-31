<?php

$dir = __DIR__ . '/../public/assets/images/covers';
if (!is_dir($dir)) {
    mkdir($dir, 0755, true);
}

function drawCover(string $path, int $width, int $height, array $start, array $end, string $title, string $subtitle, string $author, string $format, int $quality = 85): void
{
    $image = imagecreatetruecolor($width, $height);

    for ($y = 0; $y < $height; $y++) {
        $ratio = $y / max(1, $height - 1);
        $red = (int) round($start[0] * (1 - $ratio) + $end[0] * $ratio);
        $green = (int) round($start[1] * (1 - $ratio) + $end[1] * $ratio);
        $blue = (int) round($start[2] * (1 - $ratio) + $end[2] * $ratio);
        $color = imagecolorallocate($image, $red, $green, $blue);
        imageline($image, 0, $y, $width, $y, $color);
    }

    $white = imagecolorallocate($image, 255, 255, 255);
    $dark = imagecolorallocate($image, 15, 23, 42);
    $soft = imagecolorallocatealpha($image, 255, 255, 255, 95);
    $accent = imagecolorallocatealpha($image, 251, 191, 36, 25);

    imagefilledrectangle($image, 48, 48, $width - 48, $height - 48, $soft);
    imagerectangle($image, 48, 48, $width - 48, $height - 48, $white);
    imagefilledellipse($image, $width - 130, 140, 220, 220, $accent);
    imagefilledellipse($image, 120, $height - 170, 240, 240, imagecolorallocatealpha($image, 255, 255, 255, 120));

    imagestring($image, 5, 90, 110, 'WEBMIK ORIGINAL', $white);
    imagestring($image, 5, 90, 170, $title, $dark);
    imagestring($image, 4, 90, 245, $subtitle, $dark);
    imagestring($image, 4, 90, $height - 120, $author, $white);

    if ($format === 'png') {
        imagepng($image, $path, 7);
    } elseif ($format === 'jpg') {
        imagejpeg($image, $path, $quality);
    }

    imagedestroy($image);
}

drawCover($dir . '/manga-blue-sea.png', 600, 900, [20, 83, 156], [6, 182, 212], 'Tales of the Blue Sea', 'Adventure • Mystery', 'A. Author', 'png');
drawCover($dir . '/manga-night.jpg', 600, 900, [17, 24, 39], [88, 28, 135], 'Stories of the Night', 'Dark fantasy anthology', 'B. Writer', 'jpg', 82);
drawCover($dir . '/post-redesign.jpg', 1200, 630, [37, 99, 235], [124, 58, 237], 'Introducing WebMik Redesign', 'Cleaner, faster, more focused', 'Editorial', 'jpg', 82);
drawCover($dir . '/post-snap.png', 1200, 630, [6, 182, 212], [15, 118, 110], 'How to Use Midtrans Snap', 'Step-by-step payment setup', 'Guides', 'png');

echo "Generated cover assets in {$dir}\n";
