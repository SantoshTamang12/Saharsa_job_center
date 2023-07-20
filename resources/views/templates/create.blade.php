@extends('adminlte::page')

@section('title', 'Add ' . $title)

{{-- @section('content_header') --}}
{{--    <h1>Add {{$title}}</h1> --}}
{{-- @stop --}}

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/plugins/summernote/summernote-bs4.min.css') }}">
    {{--    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet"> --}}
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">

    <style>
        .card {
            border-radius: 1rem !important;
        }
    </style>
    @stack('styles')
@stop
@section('content')
    <section class="content pt-3">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col">
                    <!-- general form elements -->
                    <div class="card border-0 elevation-0">
                        <div class="card-header bg-transparent">
                            <h3 class="card-title">Add {{ $title }}</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form class="form repeater" id="form" name="myForm" action="{{ route($route . 'store') }}"
                            method="post" enctype="multipart/form-data">
                            <div class="card-body">
                                @csrf
                                @if ($errors->any())
                                    @foreach ($errors->all() as $error)
                                        <div class="alert alert-danger" role="alert">
                                            {{ $error }}
                                        </div>
                                    @endforeach
                                @endif
                                <input name="add_more" type="hidden" id="add-more" value="{{ false }}">
                                @yield('form_content')

                            </div>
                            <div class="card-footer bg-transparent">
                                <button type="submit" id="button_submit"
                                    class="button_submit btn btn-primary float-right">Submit
                                </button>
                                <a href="javascript:history.back();"
                                    class="btn btn-outline-secondary float-right mr-2 py-1 px-2"><i
                                        class="fas fa-arrow-left fa-sm"></i> Go Back</a>

                                @if (isset($addMoreButton))
                                    <button type="submit" id="button_submit_add"
                                        class="button_submit btn btn-primary float-right">
                                        Submit & Add new
                                    </button>
                                @endif
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
@section('js')

    {{--    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script> --}}
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

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

                $('#form').find('.invalidDateMsg').each(function() {
                    valid = false;
                });

                if (!valid) {
                    return;
                } else {
                    $('#form').submit();
                }

            });
        });
    </script>

    @stack('scripts')
    <script>
        $(document).on('select2:open', () => {
            document.querySelector('.select2-search__field').focus();
        });
    </script>
@endsection
