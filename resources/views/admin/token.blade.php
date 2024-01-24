<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Click Counter</title>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>
</head>
<body>

    <div x-data="{ clickCount: 0 }">
        <p>
            <a href="#" @click="clickCount++">Click me!</a>
        </p>
        
        <p>
            Clicked: <span x-text="clickCount"></span> times.
        </p>
    </div>

</body>
</html>
