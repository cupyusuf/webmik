<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="theme-color" content="#ffffff">
    <title>WebMik</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/css/tailwind.css') ?>">
</head>

<body class="antialiased font-sans" style="font-family:Inter, ui-sans-serif, system-ui, -apple-system, 'Segoe UI', Roboto, 'Helvetica Neue', Arial;">

    <header class="bg-base-100/60 backdrop-blur sticky top-0 z-40 border-b border-base-200">
        <div class="max-w-7xl mx-auto px-6 py-3 flex items-center justify-between">
            <a href="<?= site_url() ?>" class="flex items-center gap-3">
                <img src="<?= base_url('assets/images/logo.svg') ?>" alt="WebMik" class="h-8 w-8" />
                <span class="font-extrabold text-lg">WebMik</span>
            </a>

            <nav class="hidden md:flex gap-4 items-center">
                <a href="<?= site_url('manga') ?>" class="text-sm link link-hover">Manga</a>
                <a href="<?= site_url('posts') ?>" class="text-sm link link-hover">Artikel</a>
                <a href="<?= site_url('checkout') ?>" class="text-sm btn btn-sm btn-primary">Checkout</a>
                <button id="theme-toggle" class="btn btn-ghost btn-sm" aria-label="Toggle theme">🌗</button>
            </nav>

            <button class="md:hidden btn btn-ghost" id="mobile-menu-button" aria-label="Open menu">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>

        <div id="mobile-menu" class="md:hidden hidden px-6 pb-4">
            <a href="<?= site_url('manga') ?>" class="block py-2 link">Manga</a>
            <a href="<?= site_url('posts') ?>" class="block py-2 link">Artikel</a>
            <a href="<?= site_url('checkout') ?>" class="block py-2 btn btn-primary">Checkout</a>
        </div>
    </header>