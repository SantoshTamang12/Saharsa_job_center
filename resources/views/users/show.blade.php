@extends('templates.show')
@section('css')
@stop
@section('form_content')
    <div class="row my-4">
        <div class="col-md-6">
            {{-- {{ dd($item->starts_at_np) }} --}}
            <label for=""><span class="show-text">Name</span> {{ $item->name }}</label><br><br>
            <label for=""><span class="show-text">Email</span> {{ $item->email }}</label><br><br>
        </div>
    </div>
@endsection
