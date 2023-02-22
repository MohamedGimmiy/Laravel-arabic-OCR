<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>OCR</title>

    </head>
    <body class="antialiased">
        <h2>CHOOSE a file to process</h2>
        <form action="{{ url('/ocr') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="image" class="form-control"></label>
            <input type="file" class="form-control" name="image">
            <button class="btn btn-scuccess" type="submit">Upload</button>
        </form>

        <h3>Your text is: </h3>

        <textarea cols="200" rows="5">@if (isset($text)){{ $text }}@endif</textarea>


    </body>
</html>
