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
                                <tH>Items</tH>
                                <TH>Content</TH>
                                <TH></TH>
                                <TH></TH>
                                @foreach($items as $item)
                                <tr>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->content }}</td>
                                    <td><a href="items/update/{{ $item->id }}">update</a></td>
                                    <td><a href="items/delete/{{ $item->id }}">delete</a></td>
                                </tr>
                                @endforeach
                            </table>
                        <a href="{{ route('item_create') }}">Create item</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
