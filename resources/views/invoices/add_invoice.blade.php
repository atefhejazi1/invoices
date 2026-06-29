@extends('layouts.master')
@section('css')
    <!--- Internal Select2 css-->
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    <!---Internal Fileupload css-->
    <link href="{{ URL::asset('assets/plugins/fileuploads/css/fileupload.css') }}" rel="stylesheet" type="text/css" />
    <!---Internal Fancy uploader css-->
    <link href="{{ URL::asset('assets/plugins/fancyuploder/fancy_fileupload.css') }}" rel="stylesheet" />
    <!--Internal Sumoselect css-->
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/sumoselect/sumoselect-rtl.css') }}">
    <!--Internal  TelephoneInput css-->
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/telephoneinput/telephoneinput-rtl.css') }}">
@endsection
@section('title')
    {{ __('invoices.title_add') }}
@stop

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ __('invoices.title') }}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    {{ __('invoices.title_add') }}</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')

    @if (session()->has('Add'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('Add') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <!-- row -->
    <div class="row">

        <div class="col-lg-12 col-md-12">
            <form action="{{ route('invoices.store') }}" method="post" enctype="multipart/form-data"
                autocomplete="off">
                {{ csrf_field() }}

                {{-- 1 --}}
                <div class="card mb-4">
                    <div class="card-header bg-transparent">
                        <h5 class="card-title mb-0">{{ __('invoices.invoice_data') }}</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="inputName" class="control-label">{{ __('invoices.col_invoice_number') }}</label>
                                <input type="text" class="form-control form-control-lg" id="inputName" name="invoice_number"
                                    title="{{ __('invoices.please_enter_invoice_number') }}" required>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label>{{ __('invoices.col_invoice_date') }}</label>
                                <input class="form-control form-control-lg fc-datepicker" name="invoice_Date" placeholder="YYYY-MM-DD"
                                    type="text" value="{{ date('Y-m-d') }}" required>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label>{{ __('invoices.col_due_date') }}</label>
                                <input class="form-control form-control-lg fc-datepicker" name="Due_date" placeholder="YYYY-MM-DD"
                                    type="text" required>
                            </div>
                        </div>

                        {{-- 2 --}}
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="inputName" class="control-label">{{ __('invoices.col_section') }}</label>
                                <select name="Section" class="form-control form-control-lg SlectBox" onclick="console.log($(this).val())"
                                    onchange="console.log('change is firing')">
                                    <!--placeholder-->
                                    <option value="" selected disabled>{{ __('invoices.select_section') }}</option>
                                    @foreach ($sections as $section)
                                        <option value="{{ $section->id }}"> {{ $section->section_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="inputName" class="control-label">{{ __('invoices.col_product') }}</label>
                                <select id="product" name="product" class="form-control form-control-lg">
                                </select>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="inputName" class="control-label">{{ __('invoices.collection_amount') }}</label>
                                <input type="text" class="form-control form-control-lg" id="inputName" name="Amount_collection"
                                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                            </div>
                        </div>
                    </div>
                </div>

                {{-- 3 --}}
                <div class="card mb-4">
                    <div class="card-header bg-transparent">
                        <h5 class="card-title mb-0">{{ __('invoices.financial_details') }}</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="inputName" class="control-label">{{ __('invoices.commission_amount') }}</label>
                                <input type="text" class="form-control form-control-lg" id="Amount_Commission"
                                    name="Amount_Commission" title="{{ __('invoices.please_enter_commission_amount') }}"
                                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                                    required>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="inputName" class="control-label">{{ __('invoices.col_discount') }}</label>
                                <input type="text" class="form-control form-control-lg" id="Discount" name="Discount"
                                    title="{{ __('invoices.please_enter_discount_amount') }}"
                                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                                    value=0 required>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="inputName" class="control-label">{{ __('invoices.vat_rate') }}</label>
                                <select name="Rate_VAT" id="Rate_VAT" class="form-control form-control-lg" onchange="myFunction()">
                                    <!--placeholder-->
                                    <option value="" selected disabled>{{ __('invoices.select_vat_rate') }}</option>
                                    <option value=" 5%">5%</option>
                                    <option value="10%">10%</option>
                                </select>
                            </div>
                        </div>

                        {{-- 4 --}}
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="inputName" class="control-label">{{ __('invoices.vat_value') }}</label>
                                <input type="text" class="form-control form-control-lg" id="Value_VAT" name="Value_VAT" readonly>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="inputName" class="control-label">{{ __('invoices.total_with_tax') }}</label>
                                <input type="text" class="form-control form-control-lg" id="Total" name="Total" readonly>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- 5 --}}
                <div class="card mb-4">
                    <div class="card-header bg-transparent">
                        <h5 class="card-title mb-0">{{ __('invoices.notes_and_attachments') }}</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 mb-3">
                                <label for="exampleTextarea">{{ __('invoices.col_notes') }}</label>
                                <textarea class="form-control" id="exampleTextarea" name="note" rows="3"></textarea>
                            </div>
                        </div>

                        <p class="text-danger mb-1">* {{ __('invoices.attachment_format_hint') }} </p>

                        <div class="col-sm-12 col-md-12 px-0">
                            <input type="file" name="pic" class="dropify" accept=".pdf,.jpg, .png, image/jpeg, image/png"
                                data-height="70" />
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary btn-lg px-5">{{ __('invoices.save_data') }}</button>
                </div>
            </form>
        </div>
    </div>

    </div>

    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
    <!-- Internal Select2 js-->
    <script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>
    <!--Internal Fileuploads js-->
    <script src="{{ URL::asset('assets/plugins/fileuploads/js/fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fileuploads/js/file-upload.js') }}"></script>
    <!--Internal Fancy uploader js-->
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.ui.widget.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.iframe-transport.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.fancy-fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/fancy-uploader.js') }}"></script>
    <!--Internal  Form-elements js-->
    <script src="{{ URL::asset('assets/js/advanced-form-elements.js') }}"></script>
    <script src="{{ URL::asset('assets/js/select2.js') }}"></script>
    <!--Internal Sumoselect js-->
    <script src="{{ URL::asset('assets/plugins/sumoselect/jquery.sumoselect.js') }}"></script>
    <!--Internal  Datepicker js -->
    <script src="{{ URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>
    <!--Internal  jquery.maskedinput js -->
    <script src="{{ URL::asset('assets/plugins/jquery.maskedinput/jquery.maskedinput.js') }}"></script>
    <!--Internal  spectrum-colorpicker js -->
    <script src="{{ URL::asset('assets/plugins/spectrum-colorpicker/spectrum.js') }}"></script>
    <!-- Internal form-elements js -->
    <script src="{{ URL::asset('assets/js/form-elements.js') }}"></script>

    <script>
        var date = $('.fc-datepicker').datepicker({
            dateFormat: 'yy-mm-dd'
        }).val();

    </script>

    <script>
        $(document).ready(function() {
            $('select[name="Section"]').on('change', function() {
                var SectionId = $(this).val();
                if (SectionId) {
                    $.ajax({
                        url: "{{ URL::to('section') }}/" + SectionId,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('select[name="product"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="product"]').append('<option value="' +
                                    value + '">' + value + '</option>');
                            });
                        },
                    });

                } else {
                    console.log('AJAX load did not work');
                }
            });

        });

    </script>


    <script>
        function myFunction() {

            var Amount_Commission = parseFloat(document.getElementById("Amount_Commission").value);
            var Discount = parseFloat(document.getElementById("Discount").value);
            var Rate_VAT = parseFloat(document.getElementById("Rate_VAT").value);
            var Value_VAT = parseFloat(document.getElementById("Value_VAT").value);

            var Amount_Commission2 = Amount_Commission - Discount;


            if (typeof Amount_Commission === 'undefined' || !Amount_Commission) {

                alert('{{ __('invoices.please_enter_commission_amount') }}');

            } else {
                var intResults = Amount_Commission2 * Rate_VAT / 100;

                var intResults2 = parseFloat(intResults + Amount_Commission2);

                sumq = parseFloat(intResults).toFixed(2);

                sumt = parseFloat(intResults2).toFixed(2);

                document.getElementById("Value_VAT").value = sumq;

                document.getElementById("Total").value = sumt;

            }

        }

    </script>


@endsection
