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
    <form  action="{{route('podcasts.store')}}" method="post">
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

</body>
</html>
