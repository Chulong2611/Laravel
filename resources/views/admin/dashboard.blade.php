@extends('admin.layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <h4 class="mb-4">Admin Dashboard</h4>
    <?php
    echo "<h2>Welcome back,  <b style='text-decoration: underline;'>" ?>{{ Auth::guard('admin')->user()->name }}<?php echo"</b> !!!</h2>"
    ?>
@endsection
