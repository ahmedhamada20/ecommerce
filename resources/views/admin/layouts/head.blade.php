<meta charset="utf-8" />
<title>@yield('title')</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="A fully responsive premium admin dashboard template" />
<meta name="author" content="Techzaa" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<link href="{{asset('dash/assets/vendor/gridjs/theme/mermaid.min.css')}}" rel="stylesheet" type="text/css" />
<!-- App favicon -->
<link rel="shortcut icon" href="{{asset('dash/assets/images/favicon.ico')}}">

<!-- Vendor css (Require in all Page) -->
<link href="{{asset('dash/assets/css/vendor.min.css')}}" rel="stylesheet" type="text/css" />

<!-- Icons css (Require in all Page) -->
<link href="{{asset('dash/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />

<!-- App css (Require in all Page) -->
<link href="{{asset('dash/assets/css/app-rtl.min.css')}}" rel="stylesheet" type="text/css" />

<!-- Theme Config js (Require in all Page) -->
<script src="{{asset('dash/assets/js/config.js')}}"></script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&display=swap" rel="stylesheet">
<link href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.bootstrap5.min.css" rel="stylesheet">

@yield('css')
