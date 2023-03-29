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
    <button type="submit">Valider</button>
</form>

</body>
</html>
