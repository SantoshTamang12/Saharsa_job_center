@extends('adminlte::page')


@section('title', 'Edit ' . $title)

{{-- @section('content_header') --}}
{{--    <h1>Edit {{$title}}</h1> --}}
{{-- @stop --}}

@section('content')
    <section class="content pt-3">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col">
                    <!-- general form elements -->
                    <div class="card border-0 elevation-0">
                        <div class="card-header bg-transparent">
                            <h3 class="card-title">Edit {{ $title }}</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form class="form repeater" id="form" action="{{ route($route . 'update', $item->id) }}"
                            method="post" enctype="multipart/form-data">
                            <div class="card-body">
                                @csrf
                                @method('PUT')
                                @if ($errors->any())
                                    @foreach ($errors->all() as $error)
                                        <div class="alert alert-danger" role="alert">
                                            {{ $error }}
                                        </div>
                                    @endforeach
                                @endif
                                @yield('form_content')

                            </div>

                            <div class="card-footer bg-transparent">
                                <button type="submit" id="button_submit"
                                    class="btn btn-primary float-right">Submit</button>
                                <a href="javascript:history.back();"
                                    class="btn btn-outline-secondary float-right mr-2 py-1 px-2"><i
                                        class="fas fa-arrow-left fa-sm"></i> Go Back</a>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->

                </div>
                <!--/.col (left) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>

@endsection

@section('css')
    <style>
        .card {
            border-radius: 1rem !important;
        }
    </style>
    @stack('styles')
@stop
@section('js')
    @yield('ext_js')
    @stack('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    {{--    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.19.0/jquery.validate.min.js"></script> --}}
    <script>
        $(document).ready(function() {
            $(document).on('keyup change', 'input, select', function() {
                $(this).css('border', '')
                $(this).parent().find('span.validationMsg:first').remove();
            });
            $(document).on('click', '.button_submit', function(e) {
                e.preventDefault();
                let valid = true;
                $('#form').find('input[type=tel]').each(function() {
                    var phoneNumber = $(this).val();
                    if (phoneNumber) {
                        if (phoneNumber.length === 9 || phoneNumber.length === 10) {
                            $(this).css('border', '')
                            $(this).parent().find('span.validationMsg:first').remove();
                            console.log("Valid phone number");
                        } else {
                            $(this).parent().find('span.validationMsg:first').remove();
                            $(this).css('border', '1px solid red')
                            $(this).parent().append(
                                `<span class="text-danger validationMsg" style="font-size:12px;">Invalid Phone Number</span>`
                                );
                            valid = false;
                        }
                    }
                });
                $('#form').find('input, select').each(function() {
                    if ($(this).prop('required')) {
                        if (!$(this).val()) {
                            $(this).parent().find('span.validationMsg:first').remove();
                            $(this).css('border', '1px solid red')
                            $(this).parent().append(
                                `<span class="text-danger validationMsg" style="font-size:12px;">This field is required</span>`
                                );
                            valid = false;
                        }
                    }
                });

                if (!valid) {
                    return;
                } else {
                    $('#form').submit();
                }

            });
        });
    </script>
    <script>
        $(document).on('select2:open', () => {
            document.querySelector('.select2-search__field').focus();
        });
    </script>
@endsection
