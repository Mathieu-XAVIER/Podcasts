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
<h1>Modifier vos informations</h1>
<x-app-layout>
    <div >
        <form action="{{route('podcasts.update', $podcast)}}" method="POST">
            @csrf
            @method('PUT')
            <p>
                <label>Titre :
                    <input type="text" name="title" value="{{$podcast->title}}"></label>
            </p>
            <p>
                <label>Description :
                    <input type="text" name="description" value="{{$podcast->description}}"></label>
            </p>
            <p>
                <label>Votre Podcast:
                    <input type="file" name="audio" value="{{$podcast->audio}}" ></label>
            </p>
            <x-primary-button type="submit">Valider</x-primary-button>
        </form>
    </div>

</x-app-layout>
</body>
</html>
