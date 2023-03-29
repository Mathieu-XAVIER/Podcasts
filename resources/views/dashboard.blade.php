<!doctype html>
<html lang=fr>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
</head>
<body>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Les podcasts') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
            <div class="text-white">
                @foreach($podcasts as $podcast)
                    <p>Titre : {{$podcast->title}} </p>
                    <p>Description : {{$podcast->description}}</p>
                @endforeach
            </div>
            <form action="{{route('podcasts.create')}}">
                <x-primary-button type="submit">Ajouter un podcast</x-primary-button>
            </form>
        </div>
    </div>
</x-app-layout>

</body>
</html>
