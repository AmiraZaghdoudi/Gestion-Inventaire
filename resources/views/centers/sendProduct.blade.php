@php use App\Models\Center; @endphp
@extends('layouts.template')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>{{ Center::find($centerId)->name  }} : envoyer un ou plusieurs produits vers un autre
                    centre</h2>

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

    <form action="{{ route('centers.postSendProduct') }}" method="POST">
        @csrf

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <div class="col-xs-6 col-sm-6 col-md-6">

                        <strong>Veuillez sélectionner un ou plusieurs produits : </strong>
                        <select class="chosen-select select form-control m-select" multiple="multiple"
                                name="selected_products[]" id="" size="10" required
                        >
                            @foreach($products as $product)
                                <option value="{{$product['id']}}">{{$product['name']}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>


            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Veuillez sélectionner un centre :</strong>
                    <select class="select form-control" data-mdb-filter="true" id="m_select2_1"
                            name="receiver_id" required>
                        @foreach($centers as $center)
                            <option value="{{$center['id']}}">{{$center['name']}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <input hidden type="text" name="transmitter_id" value="{{ $centerId }}" class="form-control"
                   placeholder="Adresse">


            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Envoyer</button>
            </div>
        </div>

    </form>

@endsection
