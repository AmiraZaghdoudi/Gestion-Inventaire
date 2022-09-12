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
                        {{ Auth::user()->name }} : voici la liste de vos centres
                    </h3>
                </div>
            </div>

            <div class="m-portlet__head-tools">
                <ul class="m-portlet__nav">
                    <li class="m-portlet__nav-item">
                        <a href="{{ route('centers.create') }}"
                           class="btn btn-outline-primary m-btn m-btn--custom m-btn--icon m-btn--outline-2x m-btn--pill m-btn--air">
                        <span>
                            <i class="fas fa-cart-plus"></i>
                            <span> Nouveau centre</span>
                        </span>
                        </a>
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
                        <th>No</th>
                        <th>Nom</th>
                        <th>Admin</th>
                        <th>email</th>
                        <th>adresse</th>
                        <th width="280px">Action</th>
                    </tr>
                    @foreach ($centers as $center)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $center->name }}</td>
                            <td> {{ Auth::user()->name }} </td>
                            <td>{{ $center->email }}</td>
                            <td>{{ $center->address }}</td>
                            <td style="white-space: nowrap">
                                <form action="{{ route('centers.destroy',$center->id) }}" method="POST">


                                    <a class="
                            btn btn-outline-primary m-btn m-btn--custom m-btn--icon m-btn--outline-2x m-btn--pill m-btn--air
                            " href="{{ route('centers.edit',$center->id) }}">Modifier</a>


                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="btn btn-outline-danger m-btn m-btn--custom m-btn--icon m-btn--outline-2x m-btn--pill m-btn--air">
                                        Supprimer
                                    </button>

                                    <a class="
                            btn btn-outline-info m-btn m-btn--custom m-btn--icon m-btn--outline-2x m-btn--pill m-btn--air
                            " href="{{ route('centers.inventory',$center->id) }}">inventaire</a>


                                    <a class="
                            btn btn-outline-info m-btn m-btn--custom m-btn--icon m-btn--outline-2x m-btn--pill m-btn--air
                            " href="{{ route('centers.sendProduct',$center->id) }}">Envoyer Produits</a>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>

            </div>
        </div>
    </div>

    {!! $centers->links() !!}

@endsection
