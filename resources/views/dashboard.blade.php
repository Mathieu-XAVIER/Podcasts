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

    <div class="text-white">
        <div class="container">
            <div class="podcast-container">
                <div class="podcast-title">
                    <h3>Titre :</h3>
                </div>
                <div class="podcast-description">
                    <h3>Description :</h3>
                </div>
                <div class="podcast-play">
                    <h3>Ecouter le podcast</h3>
                </div>
            </div>
            @foreach($podcasts as $podcast)
                <div class="podcast-container">
                    <div class="podcast-title">
                        {{$podcast->title}}
                    </div>
                    <div class="podcast-description">
                        {{$podcast->description}}
                    </div>
                    <div class="podcast-play">
                        <audio controls>
                            <source src="{{'storage/'.$podcast->audio}}" type="{{Storage::mimeType($podcast->audio)}}">
                        </audio>
                    </div>

                </div>
            @endforeach
        </div>
        <style>
            .container{
                display: flex;
                flex-direction: column;
                padding-left: 17%;
            }
            .container h3{
                font-weight: bold;
                font-size: 18px;
            }
            .podcast-container{
                display: flex;
                align-items: center;

                width: 80%;
                margin: 1%;
            }
            .podcast-title{
                width: 25%;
            }
            .podcast-description{
                width: 25%;
            }
            .podcast-play{
                width: 30%;
                margin: 0 3%;
            }
            .podcast-edit{
                width: 10%;
            }
            .podcast-delete{
                width: 10%;
            }
            /* Style pour les boutons modifier, supprimer et lire */
            .podcast-button {
                display: inline-block;
                padding: 5px 10px;
                border: none;
                border-radius: 5px;
                font-size: 14px;
                font-weight: bold;
                color: #fff;
                background-color: #337ab7;
                cursor: pointer;
                margin-right: 5px;
            }
            .podcast-button:hover{
                background-color: white;
                color: black;
            }
        </style>
</x-app-layout>

</body>
</html>
