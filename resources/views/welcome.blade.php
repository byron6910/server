@extends('template.admin')
@section('content')

<div class="row">
    <div class="btn-group" data-toggle="buttons">
    <label class="btn btn-secondary active">
        <input type="checkbox"  autocomplete="off"> 1V
    </label>
    <label class="btn btn-secondary">
        <input type="checkbox" autocomplete="off"> 2P
    </label>
    </div>

    <div class="btn-group" data-toggle="buttons">
    <label class="btn btn-secondary active">
        <input type="checkbox"  autocomplete="off"> 3P
    </label>
    <label class="btn btn-secondary">
        <input type="checkbox" autocomplete="off"> 4V
    </label>
    </div>

    
</div>

<div class="row">
    <div class="btn-group" data-toggle="buttons">
    <label class="btn btn-secondary active">
        <input type="checkbox"  autocomplete="off"> 3P
    </label>
    <label class="btn btn-secondary">
        <input type="checkbox" autocomplete="off"> 4V
    </label>
    </div>
</div>

@endsection