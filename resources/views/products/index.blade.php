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
                        @if(isset($subTitle))
                            {{ $subTitle }}
                        @endif
                    </h3>
                </div>
            </div>

            <div class="m-portlet__head-tools">
                <ul class="m-portlet__nav">
                    <li class="m-portlet__nav-item">
                        <a href="{{ route('products.create') }}"
                           class="btn btn-outline-primary m-btn m-btn--custom m-btn--icon m-btn--outline-2x m-btn--pill m-btn--air">
                        <span>
                            <i class="fas fa-cart-plus"></i>
                            <span> Nouveau Produit</span>
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
                        <th>Details</th>
                        <th width="280px">Action</th>
                    </tr>
                    @foreach ($products as $product)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->detail }}</td>
                            <td style="white-space: nowrap">
                                <form action="{{ route('products.destroy',$product->id) }}" method="POST">

                                    <a class="
                            btn btn-outline-info m-btn m-btn--custom m-btn--icon m-btn--outline-2x m-btn--pill m-btn--air
                            " href="{{ route('products.show',$product->id) }}">Afficher </a>

                                    <a class="
                            btn btn-outline-primary m-btn m-btn--custom m-btn--icon m-btn--outline-2x m-btn--pill m-btn--air
                            " href="{{ route('products.edit',$product->id) }}">Modifier</a>

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="btn btn-outline-danger m-btn m-btn--custom m-btn--icon m-btn--outline-2x m-btn--pill m-btn--air">
                                        Supprimer
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>

            </div>
        </div>
    </div>

    {!! $products->links() !!}

@endsection
