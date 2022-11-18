<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/styles.css" />
        @livewireStyles
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.6.0/dist/alpine.min.js" defer></script>
    </head>
    <body>
        <form method="POST">
            @csrf
            <x-media-library-attachment name="media" rules="mimes:png,jpeg,pdf"/>
            <button type="submit">Submit</button>
        </form>
        @livewireScripts
    </body>
</html>
