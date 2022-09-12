@extends('layouts.app')

@section('content')
    <div class="aside-menu-wrapper flex-column-fluid" id="kt_aside_menu_wrapper">
        <!--begin::Menu Container-->
        <div id="kt_aside_menu" class="aside-menu my-4" data-menu-vertical="1" data-menu-scroll="1"
             data-menu-dropdown-timeout="500">
            <!--begin::Menu Nav-->
            <ul class="menu-nav">


                <li class="menu-item {{  url()->current()==url('centers/index') ? 'menu-item-active' : null }}"
                    aria-haspopup="true">
                    <a href="{{ route('centers.index') }}" class="menu-link">
                        <div class="mr-4 flex-shrink-0 text-center">
                            <i class="icon-md fas fa-shopping-cart text-danger"></i>
                        </div>
                        <span class="menu-text">Centers</span>
                    </a>
                </li>

                <li class="menu-item {{  url()->current()==url('products/index') ? 'menu-item-active' : null }}"
                    aria-haspopup="true">
                    <a href="{{ route('products.index') }}" class="menu-link">
                        <div class="mr-4 flex-shrink-0 text-center">
                            <i class="icon-md fas fa-cart-arrow-down text-danger"></i>
                        </div>
                        <span class="menu-text">Products</span>
                    </a>
                </li>

                <li class="menu-item {{  url()->current()==url('users/index') ? 'menu-item-active' : null }}"
                    aria-haspopup="true">
                    <a href="{{ route('users.index') }}" class="menu-link">
                        <div class="mr-4 flex-shrink-0 text-center">
                            <i class="icon-md fas fa-user text-danger"></i>
                        </div>
                        <span class="menu-text">Utilisateur s</span>
                    </a>
                </li>
            </ul>
            <!--end::Menu Nav-->
        </div>
        <!--end::Menu Container-->
    </div>
@endsection
