<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Click Counter</title>
    <!-- <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script> -->
</head>
<body>

    <div x-data="clickStore()">
        <button @click="clickCount++; updateClickCount()">Click me!</button>
        
        <p>
            Clicked: <span x-text="clickCount"></span> times.
        </p>
    </div>


</body>
</html>

