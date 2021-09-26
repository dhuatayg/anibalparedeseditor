<!doctype html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Anibal Paredes Editor S.A.C.</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>plugins/select2/select2.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>plugins/select2/select2-bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>plugins/datatables/dataTables.bootstrap.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>plugins/datatables/extensions/Responsive/css/dataTables.responsive.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>plugins/daterangepicker/daterangepicker-bs3.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>plugins/datepicker/datepicker3.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>plugins/timepicker/bootstrap-timepicker.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>plugins/datetimepicker/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>plugins/loading/jquery.loading.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>dist/menu/css/default.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>dist/menu/css/component.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>plugins/sweetalert/sweetalert.css">
    <script src="<?php echo base_url(); ?>dist/menu/js/modernizr.custom.js"></script>
    <style>
        html {
            position: relative;
            min-height: 100%;
        }

        body {
            /* Margin bottom by footer height */
            margin-bottom: 60px;
        }


        .modal-title {
            line-height: 1;
        }

        .modal-body {
            /* padding: 8px; */
        }

        .page-header {
            margin: 0 0 0px;
        }

        .footer {
            position: absolute;
            bottom: 0;
            width: 100%;
            /* Set the fixed height of the footer here */
            height: 60px;
            background-color: #f5f5f5;
        }

        .dataTables_empty {
            text-align: center;
        }

        .dataTables_filter {
            display: none;
        }

        /*.modal-lg {
                    width: 1200px;
            }*/
        .typeahead {
            z-index: 1051;
        }

        td.details-control {
            background: url('http://www.datatables.net/examples/resources/details_open.png') no-repeat center center;
            cursor: pointer;
        }

        tr.details td.details-control {
            background: url('http://www.datatables.net/examples/resources/details_close.png') no-repeat center center;
        }

        #scrollable-dropdown-menu .tt-dropdown-menu {
            max-height: 150px;
            overflow-y: auto;
        }

        .table>thead>tr>th,
        .table>tbody>tr>th,
        .table>tfoot>tr>th,
        .table>thead>tr>td,
        .table>tbody>tr>td,
        .table>tfoot>tr>td {
            vertical-align: middle;
        }

        button {
            background: transparent;
            border: none;
            cursor: pointer;
            outline: none;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
    </style>

    <style>
        .section {
            background: black;
            padding: 50px 0;
        }

        .section .container {
            width: 90%;
            max-width: 1000px;
            margin: 0 auto;
            text-align: center;
        }

        .section h1 {
            font-size: 2.5rem;
        }

        .section h2 {
            font-size: 1.3rem;
        }



        /* TIMELINE
–––––––––––––––––––––––––––––––––––––––––––––––––– */

        .timeline {
            white-space: nowrap;
            overflow-x: hidden;
        }

        .timeline ol {
            font-size: 0;
            width: 100vw;
            padding: 150px 0;
            transition: all 1s;
        }

        .timeline ol li {
            position: relative;
            display: inline-block;
            list-style-type: none;
            width: 160px;
            height: 3px;
            background: #000;
        }

        .timeline ol li:last-child {
            width: 280px;
        }

        .timeline ol li:not(:first-child) {
            margin-left: 14px;
        }

        .timeline ol li:not(:last-child)::after {
            content: '';
            position: absolute;
            top: 50%;
            left: calc(100% + 1px);
            bottom: 0;
            width: 12px;
            height: 12px;
            transform: translateY(-50%);
            border-radius: 50%;
            background: #F45B69;
        }

        .timeline ol li div {
            position: absolute;
            left: calc(100% + 7px);
            width: 290px;
            padding: 15px;
            font-size: 1rem;
            white-space: normal;
            color: white;
            background: #3FC5A7;
        }

        .timeline ol li div::before {
            content: '';
            position: absolute;
            top: 100%;
            left: 0;
            width: 0;
            height: 0;
            border-style: solid;
        }

        .timeline ol li:nth-child(odd) div {
            top: -16px;
            transform: translateY(-100%);
        }

        .timeline ol li:nth-child(odd) div::before {
            top: 100%;
            border-width: 8px 8px 0 0;
            border-color: #3FC5A7 transparent transparent transparent;
        }

        .timeline ol li:nth-child(even) div {
            top: calc(100% + 16px);
        }

        .timeline ol li:nth-child(even) div::before {
            top: -8px;
            border-width: 8px 0 0 8px;
            border-color: transparent transparent transparent #3FC5A7;
        }

        .timeline time {
            display: block;
            font-size: 1.2rem;
            font-weight: bold;
            margin-bottom: 8px;
        }


        /* TIMELINE ARROWS
–––––––––––––––––––––––––––––––––––––––––––––––––– */

        .timeline .arrows {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }

        .timeline .arrows .arrow__prev {
            margin-right: 20px;
        }

        .timeline .disabled {
            opacity: .5;
        }

        .timeline .arrows img {
            width: 60px;
            height: 60px;
        }


        /* GENERAL MEDIA QUERIES
–––––––––––––––––––––––––––––––––––––––––––––––––– */
        @media screen and (max-width: 599px) {

            .timeline ol,
            .timeline ol li {
                width: auto;
            }

            .timeline ol {
                padding: 0;
                transform: none !important;
            }

            .timeline ol li {
                display: block;
                height: auto;
                background: transparent;
            }

            .timeline ol li:first-child {
                margin-top: 25px;
            }

            .timeline ol li:not(:first-child) {
                margin-left: auto;
            }

            .timeline ol li div {
                width: 94%;
                height: auto !important;
                margin: 0 auto 25px;
            }

            .timeline ol li div {
                position: static;
            }

            .timeline ol li:nth-child(odd) div {
                transform: none;
            }

            .timeline ol li:nth-child(odd) div::before,
            .timeline ol li:nth-child(even) div::before {
                left: 50%;
                top: 100%;
                transform: translateX(-50%);
                border: none;
                border-left: 1px solid white;
                height: 25px;
            }

            .timeline ol li:last-child,
            .timeline ol li:nth-last-child(2) div::before,
            .timeline ol li:not(:last-child)::after,
            .timeline .arrows {
                display: none;
            }
        }
    </style>


</head>

<body>