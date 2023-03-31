<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<x-app-layout>
<style>
    form {
        max-width: 500px;
        margin: 0 auto;
        padding: 20px;
        background-color: #f1f1f1;
        border-radius: 10px;
        margin-top: 8%;
    }

    input[type=text], textarea, input[type=file] {
        width: 100%;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        margin-top: 6px;
        margin-bottom: 16px;
        resize: vertical;
    }

    button[type=submit] {
        background-color: #4CAF50;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    button[type=submit]:hover {
        background-color: #45a049;
    }
</style>
    <form  action="{{route('podcasts.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <p>
            <label>Titre :
                <input type="text" name="title" value="" placeholder="Titre du podcast"></label>
            @error('title')
            <span class="alert alert-danger">{{ $message }}</span>
            @enderror
        </p>

        <p>
            <label>Description :
                <input type="text" name="description" value="" placeholder="Description du podcast"></label>
            @error('description')
            <span class="alert alert-danger">{{ $message }}</span>
            @enderror
        </p>

        <p>
            <label>Votre Podcast:
                <input type="file" name="audio" value="" ></label>
            @error('audio')
            <span class="alert alert-danger">{{ $message }}</span>
            @enderror
        </p>
        <button type="submit">Ajouter</button>
    </form>
</x-app-layout>
</body>
</html>
