@extends('layouts.template')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Ajouter un nouveau centre</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('centers.index') }}"> Retour</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('centers.store') }}" method="POST">
        @csrf

        <div class="row">


            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Nom:</strong>
                        <input type="text" name="name" class="form-control" placeholder="Nom">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Admin:</strong>
                        <input type="text" name="admin_id" class="form-control"
                               placeholder="{{ Auth::user()->name }}" value="{{ Auth::user()->name }}" disabled>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Email:</strong>
                        <input type="text" name="email" class="form-control"
                               placeholder="Email">
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Adresse:</strong>
                        <input type="text" name="address" class="form-control"
                               placeholder="Adresse">
                    </div>
                </div>


                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Envoyer</button>
                </div>
            </div>

    </form>
@endsection
