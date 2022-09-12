@php use App\Models\Center; @endphp
@php use App\Models\Product; @endphp
@php use App\Models\sentProduct; @endphp
@extends('layouts.template')
@section('content')

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="m-portlet m-portlet--mobile">
        <div class="m-portlet__head">

            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                <span class="m-portlet__head-icon">
                    <i class="flaticon-list-3 m--font-danger"></i>
                </span>
                    <h3 class="m-portlet__head-text m--font-danger">
                        produits envoyées par d'autres centres
                    </h3>
                </div>
            </div>

            <div class="m-portlet__head-tools">
                <ul class="m-portlet__nav">
                    <li class="m-portlet__nav-item">
                        <a class="btn btn-primary" href="{{ route('centers.index') }}"> Retour</a>
                    </li>
                    <li class="m-portlet__nav-item"></li>

                </ul>
            </div>
        </div>
        <div class="m-portlet__body">

            <!--begin: Datatable -->
            <div class="table-responsive">
                <table class="table table-striped- table-bordered table-hover table-checkable" id="user_table">

                    <tr>
                        <th>Id Envoi</th>
                        <th>Centre récepteur</th>
                        <th>centre expéditeur</th>
                        <th>listes produits</th>
                        <th>date envoie</th>
                        <th>action</th>

                    </tr>
                    @foreach ($newExchangedSendData as $received)
                        <tr>
                            <td>{{ $received->id }}</td>

                            <td>{{ Center::find($received->receiver_id)->name  }}</td>
                            <td>{{ Center::find($received->transmitter_id)->name  }}</td>

                            <td>
                                <ul>
                                    @foreach($productList[$received->id] as  $product)
                                        <li>{{$product->name }}<br></li>
                                    @endforeach
                                </ul>
                            </td>

                            <td>{{ date('d-m-Y', strtotime($received->created_at)) }}</td>

                            <td style="white-space: nowrap">
                                <a class="btn btn-outline-primary m-btn m-btn--custom m-btn--icon m-btn--outline-2x m-btn--pill m-btn--air"
                                   href="{{ route('centers.acceptOrRefuseReceivedProduct',[$received->id,1]) }}">Accepter</a>
                                <a class="btn btn-outline-danger m-btn m-btn--custom m-btn--icon m-btn--outline-2x m-btn--pill m-btn--air"
                                   href="{{ route('centers.acceptOrRefuseReceivedProduct',[$received->id,0]) }}">Refuser</a>

                            </td>
                        </tr>
                    @endforeach
                </table>

            </div>
        </div>
    </div>

    {!! $newExchangedSendData->links() !!}

@endsection
