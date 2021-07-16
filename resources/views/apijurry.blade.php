<!doctype html>

<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Jurries</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>

<body>

    <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
            <div class="top-right links">
                @if (Auth::check())
                    <a href="{{ url('/home') }}">Home</a>
                @else
                    <a href="{{ url('/login') }}">Login</a>
                    <a href="{{ url('/register') }}">Register</a>
                @endif
            </div>
        @endif


        <div id="jurries">
            <table  class="table table-striped table-bordered" border="1px solid black">
                <thead>
                <tr>
                    <td>Aap</td>
                    <td>Role</td>
                    <td>Idref</td>
                    <td>Orcid</td>
                    <td>Prenom</td>
                    <td>Nom</td>
                    <td>Genre</td>
                    <td>Iso_country</td>
                    <td>Pays</td>
                    <td>Code Affiliation</td>
                    <td>Affiliation</td>
                </tr>
                </thead>
                <tbody>
                @foreach($jurries as $jurry)
                    <tr>
                        <td>{{$jurry->aap}}</td>
                        <td>{{$jurry->role}}</td>
                        <td>{{$jurry->orcid}}</td>
                        <td>{{$jurry->prenom}}</td>
                        <td>{{$jurry->genre}}</td>
                        <td>{{$jurry->iso_courntry}}</td>
                        <td>{{$jurry->pays}}</td>
                        <td>{{$jurry->code_affiliation}}</td>
                        <td>{{$jurry->affiliation}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

    </div>


<script src="{{ asset('js/app.js') }}" ></script>
</body>

</html>

<script>
    import Jurry from "../assets/js/components/Jurry";
    export default {
        components: {Jurry}
    }
</script>