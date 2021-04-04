@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Item</div>

                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{ route('item_add') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">name</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                                <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
                                    <label for="content" class="col-md-4 control-label">content</label>

                                    <div class="col-md-6">
                                        <input id="content" type="text" class="form-control" name="content" value="{{ old('content') }}" required autofocus>

                                        @if ($errors->has('content'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('content') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                    <button type="submit" class="btn btn-primary">
                                        Save
                                    </button>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
