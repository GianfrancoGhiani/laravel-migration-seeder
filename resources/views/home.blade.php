<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    @vite('resources/js/app.js')

</head>

<body>
    <div class="my-container container-md">
        <h1>Oggi potrai trovare questi treni</h1>
        {{-- if there arent any train dont show the table, show a meassege instead --}}
        <table 
            @if(!count($today_trips))
                class='d-none'
            
            @endif>
            <thead>
                <tr>
                    <th>Partenza da</th>
                    <th>Orario di partenza stimato</th>
                    <th>Arrivo a</th>
                    <th>Orario di arrivo stimato</th>
                    <th>In orario</th>
                </tr>
            </thead>
            <tbody>
                {{-- foreach train trip create a row --}}
        @foreach ($today_trips as $trip)
            
                <tr>
                    <td>{{$trip->leaving_from}}</td>
                    <td>{{$trip->leaving_time}}</td>
                    <td>{{$trip->arriving_to}}</td>
                    <td>{{$trip->arriving_time}}</td>
                    <td>
                        @if ($trip->on_time)
                            <i class="fa-solid fa-check"></i></td>
                        @else
                        <i class="fa-solid fa-xmark"></i></td>
                        @endif
                </tr>
            
        @endforeach
            </tbody>
        </table>

        <div @if(count($today_trips)){
            class='d-none'
        }
        @endif>
        <h3 class="bg-danger p-3"> Non ci sono treni oggi!!</h3>
        </div>
        
    </div>
</body>

</html>
