@extends('templates.master')

@section('title', 'StokBox Home')

@section('head')
@endsection

@section('content') 
<h1>Dashboard</h1>
<h2>Welcome, {{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</h2>
<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam eius, maxime rerum totam soluta eaque excepturi placeat sed ipsam aliquam mollitia veniam laudantium illum ullam vitae explicabo magnam natus dolorum.</p>

@endsection