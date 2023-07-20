@extends('adminlte::page')

@section('title', $title)

{{-- @section('content_header') --}}
{{--    <h1>{{$title}} List</h1> --}}
{{-- @stop --}}

@section('css')
    @stack('styles')
@stop

@section('js')
    <style>
        .card {
            border-radius: 1rem !important;
            box-shadow: rgba(17, 17, 26, 0.05) 0px 0px 16px!important;
        }
        .card-title{
            font-size: 16px!important;
        }

        div.dataTables_wrapper div.dataTables_length select {
            width: 100px !important;
        }

        .dt-buttons button {
            border-color: #6c757d;
            background-color: white;
            background-image: none;
            color: #6c757d;

        }

        .dt-button.dropdown-item.buttons-columnVisibility.active {
            border-color: #6c757d !important;
            background-color: #6c757d !important;
            background-image: none !important;
            color: #ffffff;

        }

        .dt-buttons button:hover {
            border-color: #6c757d !important;
            background-color: #6c757d !important;
            background-image: none !important;
            color: #ffffff;

        }
        thead
        {
            color:#a6a6a6!important;
        }
        .input-group {
            flex-wrap: nowrap !important;
        }
    </style>
    @stack('scripts')
    <script>
        $(document).on('select2:open', () => {
            document.querySelector('.select2-search__field').focus();
        });
    </script>
@stop


@section('content')
    @if (session('success'))
        <div class="alert alert-success alert-block mt-2">
            <button type="button" class="close" data-dismiss="alert">×</button>
            {{ session('success') }}
        </div>
    @endif

    <section class="content pt-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="card m-0 elevation-0 border-0">
                        <div class="card-header bg-transparent">
                            <h3 class="card-title">{{ $title }}</h3>
                            @if (!isset($hideCreate))
                                @if (isset($filter))
                                    <a href="{{ route($route . 'create', ['filter' => $filter]) }}"
                                        class="btn btn-primary float-right">
                                        <i class="fa fa-plus"></i>
                                        <span class="kt-hidden-mobile">Add new</span>
                                    </a>
                                @elseif(isset($modalCreate))
                                    <button type="button" class="btn btn-primary float-right" data-toggle="modal"
                                        data-target="#exampleModal">
                                        <i class="fa fa-plus"></i>
                                        <span class="kt-hidden-mobile">Add new</span>
                                    </button>
                                @else
                                    <a href="{{ route($route . 'create') }}" class="btn btn-primary float-right">
                                        <i class="fa fa-plus"></i>
                                        <span class="kt-hidden-mobile">Add new</span>
                                    </a>
                                @endif
                            @endif
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            @yield('index_content')
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
@endsection
