@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class=>
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">
                        <table class="table-responsive table-bordered" border="1px solid black">
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
            </div>
        </div>
    </div>
@endsection