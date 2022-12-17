<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Invoice | Clubsbasic</title>
    <!--favicon-->
    <link rel="shortcut icon" type="image/x-icon" href="img/LOGO%20Asset%2013ldpi.png">
    <style>
        /* heading */

        h1 {
            font: bold 100% sans-serif;
            letter-spacing: 0.5em;
            text-align: center;
            text-transform: uppercase;
        }

        /* table */

        table {
            font-size: 85%;
            table-layout: fixed;
            width: 100%;
        }

        table {
            border-spacing: 2px;
        }

        th,
        td {
            border-width: 1px;
            padding: 0.5em;
            position: relative;
            text-align: left;
        }

        th,
        td {
            border-style: solid;
        }

        th {
            background: #079e8d;
            border-color: #BBB;
            color: #fff;
        }

        td {
            border-color: #DDD;
            text-align: center;
        }

        /* page */

        html {
            font: 16px/1 'Open Sans', sans-serif;
            overflow: auto;
            padding: 0.5in;
        }

        html {
            background: #999;
            cursor: default;
        }

        body {
            box-sizing: border-box;
            height: 11in;
            margin: 0 auto;
            overflow: hidden;
            padding: 0.5in;
            width: 8.5in;
        }

        body {
            background: #FFF;
            border-radius: 1px;
            box-shadow: 0 0 1in -0.25in rgba(0, 0, 0, 0.5);
        }

        /* header */

        .invoice-header {
            margin: 0 0 3em;
        }

        .invoice-header:after {
            clear: both;
            content: "";
            display: table;
        }

        .invoice-header h1 {
            background: #079e8d;
            border-radius: 0.25em;
            color: #FFF;
            margin: 0 0 1em;
            padding: 0.5em 0;
        }

        .invoice-header .address {
            float: left;

        }

        .invoice-customer {
            font-style: normal;
        }


        .invoice-header .address p {
            margin: 10px 0;
        }


        .invoice-customer h5 {
            font-size: 17px;
            margin: 0;
            background: #079e8d;
            padding: 5px;
            color: #fff;
            margin-bottom: 20px;
        }

        .invoice-customer p {
            margin: 10px 0;
        }

        .invo-total-price th,
        .invo-total-price td {
            color: #000 !important;
        }

        .invo-total-price {
            background: #eeeeee;
            color: #fff;
        }

        .invoice-terms {
            float: left;
            width: 50%;
            border: 1px solid #ddd;
        }

        .invoice-terms ol {
            margin: 0;
            padding-inline-start: 20px;
        }

        .invoice-terms h4 {
            margin: 0;
            background: #079e8d;
            padding: 3px;
            color: #fff;
            font-size: 15px;
        }

        .tc-ol {
            padding: 10px;
        }

        .tc-ol ol li {
            margin-bottom: 10px;
        }

        /* article */

        article,
        article address,
        table.meta,
        table.inventory {
            margin: 0 0 30px;
        }

        article:after {
            clear: both;
            content: "";
            display: table;
        }

        article address {
            float: left;
        }

        .row {
            display: flex;
        }

        .col-md-4 {
            flex-grow: 1;
            text-align: center;
        }

        /* table meta & balance */

        table.meta,
        table.balance {
            float: right;
            width: 41%;
        }

        table.meta:after,
        table.balance:after {
            clear: both;
            content: "";
            display: table;
        }

        /* table meta */
        .meta-box {
            width: 41%;
            float: right;
        }

        .meta-box table.meta {
            width: 100%;
        }

        .meta-box p {
            margin: 10px 0;
            text-align: right;
        }

        table.meta th {
            width: 40%;
            background: #eee;
            color: black;
        }

        table.meta td {
            width: 60%;
        }

        /* table items */

        table.inventory {
            clear: both;
            width: 100%;
        }

        table.inventory th {
            font-weight: bold;
            text-align: center;
        }

        .inventory select {
            padding: 5px 7px;
        }

        .inventory .in-price {
            text-transform: uppercase;
        }

        /* table balance */

        table.balance th {
            background: #EEE;
            color: #000;
        }

        table.balance th,
        table.balance td {
            width: 50%;
        }

        table.balance td {
            text-align: right;
        }

        /* aside */

        aside h1 {
            border: none;
            border-width: 0 0 1px;
            margin: 0 0 1em;
        }

        aside h1 {
            border-color: #999;
            border-bottom-style: solid;
        }


        @media print {
            * {
                -webkit-print-color-adjust: exact;
            }

            html {
                background: none;
                padding: 0;
            }

            body {
                box-shadow: none;
                margin: 0;
            }

            span:empty {
                display: none;
            }

            .add,
            .cut {
                display: none;
            }
        }

        @page {
            margin: 0;
        }
    </style>
</head>

<body>
    <!--start invoice area-->
    <div class="main-invo">
        <div class="invoice-header">
            <div class="invoice-logo" style="overflow: hidden; margin-bottom: 15px;">
                <img src="{{ asset('login_assets/img/rsz_11d_legal_logo.png') }}" alt="image" class="brand-image"
                    style="opacity:1">
            </div>
            <h1>Invoice</h1>
            <div class="address">
                <div class="invoice-self">
                    <p><strong>From</strong></p>
                    <p>365/B, Modhubag, Mogbazar, Hatirjheel, Dhaka
                        - 1217, Bangladesh</p>
                    <p>Cell: 01717406688 </p>
                    <p>Tel: 01717406688 </p>
                    <p>Email: niamulkabir.adv@gmail.com</p>
                </div>
            </div>
        </div>
        <article>
            <address>
                <div class="invoice-customer">
                    <h5>Customer</h5>
                    @php
                        if ($data->class_of_cases == 'District Court') {
                            $case = App\Models\CriminalCase::where('id', $data->case_no)->first();
                        } elseif ($data->class_of_cases == 'Special Court') {
                            $case = App\Models\LabourCase::where('id', $data->case_no)->first();
                        } elseif ($data->class_of_cases == 'High Court Division') {
                            $case = App\Models\HighCourtCase::where('id', $data->case_no)->first();
                        } elseif ($data->class_of_cases == 'Appellate Division') {
                            $case = App\Models\AppellateCourtCase::where('id', $data->case_no)->first();
                        }

                    @endphp

                    <address>
                        <strong>{{ $case->client_name_write }}</strong><br>
                        {{ $case->client_address }}

                    </address>
                </div>
            </address>
            <div class="meta-box">
                <table class="meta">

                    <tr>
                        <th>DATE</th>
                        <td>{{ date('d-m-Y') }}</td>
                    </tr>
                    <tr>
                        <th>INVOICE NO</th>
                        <td>{{ $data->billing_no }}</td>
                    </tr>
                    <tr>
                        <th>CASE NO</th>
                        <td>{{ $case->case_no }}</td>
                    </tr>
                </table>
            </div>
            <table class="inventory">
                <thead>
                    <tr>
                        <th width="10%"><span>S.N</span></th>
                        <th><span>Bill Type</span></th>
                        <th><span>Amount</span></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><span>1</span></td>
                        <td><span> {{ $data->bill_type_name }}
                            </span></td>
                        <td><span class="in-price">{{ $data->bill_amount }}</span></td>
                    </tr>
                </tbody>
            </table>
            {{-- <article>
                            <div class="invoice-terms">
                                <h4>Terms and Condition</h4>
                                <div class="tc-ol">
                                    <ol>
                                        <li>Write Something ...................................</li>
                                        <li>Write Something ...................................</li>
                                    </ol>
                                </div>
                            </div> --}}

            <table class="meta">
                <tr>
                    <th>Sutotal</th>
                    <td>{{ $data->bill_amount }}</td>
                </tr>
                <tr class="total-border"></tr>
                <tr class="invo-total-price">
                    <th>Total</th>
                    <td>{{ $data->bill_amount }}</td>
                </tr>
            </table>
        </article>
        </article>
        <div class="row">
            <div class="col-md-4">
                <div class="text-center">
                    <hr width="50%">
                    Accountant
                </div>
            </div>
            <div class="col-md-4">
                <div class="text-center">
                    <hr width="50%">
                    Checked By
                </div>
            </div>
            <div class="col-md-4">
                <div class="text-center">
                    <hr width="50%">
                    Received By
                </div>
            </div>
        </div>
    </div>
    <!--end invoice area-->


    <script>
        window.addEventListener('DOMContentLoaded', function() {
            window.print();
}, true);
    </script>

</body>

</html>
