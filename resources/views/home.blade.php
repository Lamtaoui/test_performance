@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table>
                        <tH>My todo lists</tH>
                        <TH></TH>
                        <TH></TH>
                        <tr>
                            <td>test</td>
                            <td><a href="#">update</a></td>
                            <td><a href="#">delete</a></td>
                        </tr>
                    </table>
                    <a href="{{ route('item_create') }}">Create List</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
