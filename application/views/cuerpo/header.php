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
        <link rel="stylesheet"  href="<?php echo base_url(); ?>plugins/loading/jquery.loading.min.css">
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
            .timeline {
                list-style: none;
                padding: 20px 0 20px;
                position: relative;
            }

            .timeline:before {
                top: 0;
                bottom: 0;
                position: absolute;
                content: " ";
                width: 3px;
                background-color: #eeeeee;
                left: 50%;
                margin-left: -1.5px;
            }

            .timeline > li {
                margin-bottom: 20px;
                position: relative;
            }

            .timeline > li:before,
            .timeline > li:after {
                content: " ";
                display: table;
            }

            .timeline > li:after {
                clear: both;
            }

            .timeline > li:before,
            .timeline > li:after {
                content: " ";
                display: table;
            }

            .timeline > li:after {
                clear: both;
            }

            .timeline > li > .timeline-panel {
                width: 46%;
                float: left;
                border: 1px solid #d4d4d4;
                border-radius: 2px;
                padding: 20px;
                position: relative;
                -webkit-box-shadow: 0 1px 6px rgba(0, 0, 0, 0.175);
                box-shadow: 0 1px 6px rgba(0, 0, 0, 0.175);
            }

            .timeline > li > .timeline-panel:before {
                position: absolute;
                top: 26px;
                right: -15px;
                display: inline-block;
                border-top: 15px solid transparent;
                border-left: 15px solid #ccc;
                border-right: 0 solid #ccc;
                border-bottom: 15px solid transparent;
                content: " ";
            }

            .timeline > li > .timeline-panel:after {
                position: absolute;
                top: 27px;
                right: -14px;
                display: inline-block;
                border-top: 14px solid transparent;
                border-left: 14px solid #fff;
                border-right: 0 solid #fff;
                border-bottom: 14px solid transparent;
                content: " ";
            }

            .timeline > li > .timeline-badge {
                color: #fff;
                width: 50px;
                height: 50px;
                line-height: 50px;
                font-size: 1.4em;
                text-align: center;
                position: absolute;
                top: 16px;
                left: 50%;
                margin-left: -25px;
                background-color: #999999;
                z-index: 100;
                border-top-right-radius: 50%;
                border-top-left-radius: 50%;
                border-bottom-right-radius: 50%;
                border-bottom-left-radius: 50%;
            }

            .timeline > li.timeline-inverted > .timeline-panel {
                float: right;
            }

            .timeline > li.timeline-inverted > .timeline-panel:before {
                border-left-width: 0;
                border-right-width: 15px;
                left: -15px;
                right: auto;
            }

            .timeline > li.timeline-inverted > .timeline-panel:after {
                border-left-width: 0;
                border-right-width: 14px;
                left: -14px;
                right: auto;
            }

            .timeline-badge.primary {
                background-color: #2e6da4 !important;
            }

            .timeline-badge.success {
                background-color: #3f903f !important;
            }

            .timeline-badge.warning {
                background-color: #f0ad4e !important;
            }

            .timeline-badge.danger {
                background-color: #d9534f !important;
            }

            .timeline-badge.info {
                background-color: #5bc0de !important;
            }

            .timeline-title {
                margin-top: 0;
                color: inherit;
            }

            .timeline-body > p,
            .timeline-body > ul {
                margin-bottom: 0;
            }

            .timeline-body > p + p {
                margin-top: 5px;
            }

            .table>thead>tr>th, .table>tbody>tr>th, .table>tfoot>tr>th, .table>thead>tr>td, .table>tbody>tr>td, .table>tfoot>tr>td {
                vertical-align: middle;
            }
        </style>
    </head>
  <body>