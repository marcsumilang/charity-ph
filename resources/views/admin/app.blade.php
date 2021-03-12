@extends('admin.cores.layouts.master')

@section('content')


    <div class="content">
        <div class="container-fluid">


            <router-view :key="$route.path"></router-view>

        </div>
    </div>



@endsection