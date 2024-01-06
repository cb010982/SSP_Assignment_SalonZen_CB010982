<!DOCTYPE html>
@extends('layouts.app')
@section('content')
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            width: 80%;
            margin: auto;
            overflow: hidden;
        }
        #message {
            padding: 20px;
            margin: 20px 0;
            border: 1px solid #e0e0e0;
            background-color: #fff;
            color: #333;
        }
        form {
            padding: 20px;
            margin: 20px 0;
            border: 1px solid #e0e0e0;
            background-color: #fff;
        }
        input[type="text"] {
            width: 90%;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        button[type="submit"] {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background-color: #333;
            color: #fff;
            cursor: pointer;
        }
    </style>
</head>
<body>

    <div class="container">
        <div id="message">
            {{  $message }}
        </div>

        <form action="/chat" method="POST">
            @csrf
            <input type="text" name="message">
            <button type="submit">Send</button>
        </form>
    </div>

</body>
</html>
@endsection