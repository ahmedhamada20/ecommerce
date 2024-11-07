
<script src="{{asset('dash/assets/js/vendor.js')}}"></script>

<!-- App Javascript (Require in all Page) -->
<script src="{{asset('dash/assets/js/app.js')}}"></script>

<!-- Vector Map Js -->
<script src="{{asset('dash/assets/vendor/jsvectormap/js/jsvectormap.min.js')}}"></script>
<script src="{{asset('dash/assets/vendor/jsvectormap/maps/world-merc.js')}}"></script>
<script src="{{asset('dash/assets/vendor/jsvectormap/maps/world.js')}}"></script>
<script src="{{asset('dash/assets/ckeditor/ckeditor.js')}}"></script>
<!-- Dashboard Js -->
<script src="{{asset('dash/assets/js/pages/dashboard.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js"></script>

<script>
    $(document).ready(function () {
        $('#example').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Arabic.json"
            }
        });
    });
</script>
@yield('js')
