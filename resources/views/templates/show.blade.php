@extends('adminlte::page')
@section('css')
    @stack('styles')
    <style>
        .textDiv {
            display: flex;
            flex-direction: row;
            align-items: center;
        }

        .divider {
            flex-grow: 1;
            border-top: 1px solid #9f9f9f;
            /*height: 0.1px;*/
            /*background-color: #9f9f9f;*/
            margin: 0 30px;
        }

        .titleText {
            flex-grow: 0;
        }

        label {
            color: #a4a4a4;
            font-weight: 500 !important;
        }
    </style>
@stop
@section('title', 'Show ' . $title)
{{-- @section('content_header') --}}
{{--    <h1>View {{$title}}</h1> --}}
{{-- @stop --}}

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col">
                    <div class="textDiv mt-3" id="nonPrintableContent">
                        <div class="titleText">
                            <h4 class="font-weight-light">{{ $title }} Details</h4>
                        </div>
                        <div class="divider"></div>
                        @if (!isset($hideEdit))
                            <a href="{{ route($route . 'edit', $item->id) }}" class="btn btn-primary float-right px-3">
                                Edit
                            </a>
                            @if (isset($showPrint))
                                <a class="btn btn-outline-info float-right  ml-2 px-3" onclick="window.print()">
                                    Print
                                </a>
                            @endif
                        @endif
                        {{--                            <hr style="height:0.1px; border:none; color:#000; background-color:#000; width:60%; text-align:center; margin: auto;"></h4> --}}
                    </div>
                    <!-- general form elements -->
                    <div class="card mt-2 elevation-0 rounded-lg border-1">
                        <div class="card-body">
                            @yield('form_content')

                        </div>

                    </div>
                    <!-- /.card -->
                    <div id="nonPrintableContent">
                        <a href="javascript:history.back();" class="btn btn-outline-secondary float-right"><i
                                class="fas fa-arrow-left fa-sm"></i> Go Back</a>
                    </div>
                </div>
                <!--/.col (left) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
@endsection

@section('js')
    @stack('scripts')
    <script>
        jQuery(document).ready(function() {
            $('#form input').attr('readonly', true);
            $('#form select').attr('disabled', true);
        });
    </script>
    <script>
        $(document).on('select2:open', () => {
            document.querySelector('.select2-search__field').focus();
        });
    </script>
@stop
