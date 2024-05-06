<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Production Schedule</title>
</head>

<body>
    <style>
        table {
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }

        .width-100 {
            width: 100%;
        }

        .pagination {
            display: flex;
            list-style: none;
            padding: 0;
        }

        .pagination li {
            margin-right: 5px;
        }

        .pagination li a,
        .pagination li span {
            padding: 5px 10px;
            border: 1px solid #ccc;
            color: #333;
            text-decoration: none;
            transition: background-color 0.3s;
        }

        .pagination li.active a {
            background-color: #007bff;
            color: #fff;
            border-color: #007bff;
        }

        .pagination li.disabled span {
            background-color: #f8f9fa;
            color: #6c757d;
            border-color: #dee2e6;
            cursor: not-allowed;
        }

        .pagination li a:hover {
            background-color: #007bff;
            color: #fff;
            border-color: #007bff;
        }

        .d-flex.justify-content-between.flex-fill.d-sm-none>ul.pagination {
            display: none;
        }
    </style>
    <div class="container">
        @yield('content')
    </div>
</body>

</html>
