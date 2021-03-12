@extends('cores.layouts.master')

@section('content')


            <router-view :key="$route.path"></router-view>

@endsection