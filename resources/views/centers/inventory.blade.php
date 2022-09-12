@php
    use App\Models\Product;
    use App\Models\Center;
@endphp
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
                        {{ Center::find($centerId)->name }} : inventaire de produits avec des stocks
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
                        <th>No</th>
                        <th>product</th>
                        <th>stock</th>

                    </tr>
                    @foreach ($centers as $center)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ Product::find($center->product_id)->name  }}</td>
                            <td>{{ $center->quantity }}</td>


                        </tr>
                    @endforeach
                </table>

            </div>
        </div>
    </div>

    {!! $centers->links() !!}

@endsection
