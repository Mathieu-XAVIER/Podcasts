<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mes podcasts</title>
</head>
<body>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Mes Podcasts') }}
        </h2>
    </x-slot>
    <div class="p-6 text-gray-900 dark:text-gray-100">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
    </div>

<div class="text-white">
        <ul>
            @foreach($podcasts as $podcast)
                <li>
                    <p>Titre : {{$podcast->title}} Description : {{$podcast->description}}</p>
                    <audio
                        controls
                        src="">
                    </audio>
                    <?php echo asset('audio.mp3'); ?>
                    <form action="{{route('podcasts.destroy',$podcast)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Supprimer</button>
                    </form>
                    <form action="{{route('podcasts.edit',$podcast)}}">
                        <button type="submit">Edit</button>
                    </form>



                </li>
            @endforeach
        </ul>

</div>
</x-app-layout>
</body>
</html>
