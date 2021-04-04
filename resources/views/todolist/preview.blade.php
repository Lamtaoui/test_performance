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


                            <table width="100%">
                                <tH>My todoList</tH>
                                <TH></TH>
                                <TH></TH>
                                @foreach($todoLists as $todolist)
                                    <tr>
                                        <td><a href="{{ route('items') }}">{{ $todolist->name }}</a></td>
                                        <td><a href="todolist/update/{{ $todolist->id }}">update</a></td>
                                        <td><a href="{{ route('todolist_delete') }}">delete</a></td>
                                    </tr>@endforeach
                            </table>
                        <a href="{{ route('todolist_create') }}">Create List</a>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
