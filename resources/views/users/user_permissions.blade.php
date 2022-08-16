@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Create New User</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('users.index') }}"> Back</a>
            </div>
        </div>
    </div>


    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif



    <form action="{{ route('users.save_permissions',$user->id) }}" method="POST">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label class="form-label">Name</label>
                {!! Form::text('name', $user->name, array('placeholder' => 'Name','class' => 'form-control mb-4', 'readonly'=>'readonly')) !!}

            </div>
            <div class="form-group">
                <label class="form-label">Permission</label>
                @foreach($permission as $value)
                    <label>{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                        {{ $value->name }}</label>
                    <br/>
                @endforeach
            </div>

            <button type="submit" class="btn btn-primary float-end mb-4 text-uppercase"> <i class="fa fa-save" data-bs-toggle="tooltip" title="fa fa-plus"></i> Save</button>
        </div>
    </form>


    <p class="text-center text-primary"><small>Tutorial by ItSolutionStuff.com</small></p>
@endsection
