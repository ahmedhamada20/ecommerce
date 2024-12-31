<script src="{{asset('dash/assets/js/lib/jquery-3.7.1.min.js')}}"></script>
<!-- Bootstrap js -->
<script src="{{asset('dash/assets/js/lib/bootstrap.bundle.min.js')}}"></script>
<!-- Apex Chart js -->
<script src="{{asset('dash/assets/js/lib/apexcharts.min.js')}}"></script>
<!-- Data Table js -->
<script src="{{asset('dash/assets/js/lib/dataTables.min.js')}}"></script>
<!-- Iconify Font js -->
<script src="{{asset('dash/assets/js/lib/iconify-icon.min.js')}}"></script>
<!-- jQuery UI js -->
<script src="{{asset('dash/assets/js/lib/jquery-ui.min.js')}}"></script>
<!-- Vector Map js -->
<script src="{{asset('dash/assets/js/lib/jquery-jvectormap-2.0.5.min.js')}}"></script>
<script src="{{asset('dash/assets/js/lib/jquery-jvectormap-world-mill-en.js')}}"></script>
<!-- Popup js -->
<script src="{{asset('dash/assets/js/lib/magnifc-popup.min.js')}}"></script>
<!-- Slick Slider js -->
<script src="{{asset('dash/assets/js/lib/slick.min.js')}}"></script>
<!-- prism js -->
<script src="{{asset('dash/assets/js/lib/prism.js')}}"></script>
<!-- file upload js -->
<script src="{{asset('dash/assets/js/lib/file-upload.js')}}"></script>
<!-- audioplayer -->
<script src="{{asset('dash/assets/js/lib/audioplayer.js')}}"></script>

<!-- main js -->
<script src="{{asset('dash/assets/js/app.js')}}"></script>
<script>
    $(document).ready(function () {
        const $tableBody = $('#dataTable tbody'); // Table body
        const allRows = $tableBody.find('tr').clone(); // Clone all rows initially to keep a clean copy

        // Filter rows based on Entries Selector
        $('#entriesSelector').on('change', function () {
            const selectedValue = $(this).val();
            const totalRows = allRows.length;

            $tableBody.empty(); // Clear table body to prevent duplication

            if (selectedValue === 'all') {
                // Append all rows if "All" is selected
                $tableBody.append(allRows);
            } else {
                const limit = parseInt(selectedValue);

                // Append only the first 'limit' rows
                $tableBody.append(allRows.slice(0, limit));
            }
        });

        // Search functionality
        $('#tableSearch').on('keyup', function () {
            const value = $(this).val().toLowerCase().trim();

            $tableBody.find('tr').filter(function () {
                const isVisible = $(this).text().toLowerCase().indexOf(value) > -1;
                $(this).toggle(isVisible);
            });
        });

        // Trigger the change event to apply the initial limit
        $('#entriesSelector').trigger('change');
    });
</script>

<script src="https://cdn.ckeditor.com/ckeditor5/44.1.0/ckeditor5.umd.js"></script>
<script>
    const {
        ClassicEditor,
        Essentials,
        Paragraph,
        Bold,
        Italic,
        Font
    } = CKEDITOR;
    ClassicEditor
        .create( document.querySelector( '#editor' ), {
            licenseKey: "eyJhbGciOiJFUzI1NiJ9.eyJleHAiOjE3NjY3OTM1OTksImp0aSI6IjRhMTRkOTA1LTVhMmUtNDM4OS1iYmNiLTMzZDI1MzA4MmFhNSIsInVzYWdlRW5kcG9pbnQiOiJodHRwczovL3Byb3h5LWV2ZW50LmNrZWRpdG9yLmNvbSIsImRpc3RyaWJ1dGlvbkNoYW5uZWwiOlsiY2xvdWQiLCJkcnVwYWwiXSwiZmVhdHVyZXMiOlsiRFJVUCJdLCJ2YyI6ImZhMzcxZTgyIn0.26yfc5Rl8TABtlxPiBHb6IJQCVpn4UO7wssH7KvVU2nT5t4K6krhk1mktE3e0gztxjKpd1MRIWgw7OMYOjrztg",
            plugins: [ Essentials, Paragraph, Bold, Italic, Font ],
            toolbar: [
                'undo', 'redo', '|', 'bold', 'italic', '|',
                'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor'
            ]
        } )
        .then( editor => {
            window.editor = editor;
        } )
        .catch( error => {
            console.error( error );
        } );
    ClassicEditor
        .create( document.querySelector( '#editor2' ), {
            licenseKey: "eyJhbGciOiJFUzI1NiJ9.eyJleHAiOjE3NjY3OTM1OTksImp0aSI6IjRhMTRkOTA1LTVhMmUtNDM4OS1iYmNiLTMzZDI1MzA4MmFhNSIsInVzYWdlRW5kcG9pbnQiOiJodHRwczovL3Byb3h5LWV2ZW50LmNrZWRpdG9yLmNvbSIsImRpc3RyaWJ1dGlvbkNoYW5uZWwiOlsiY2xvdWQiLCJkcnVwYWwiXSwiZmVhdHVyZXMiOlsiRFJVUCJdLCJ2YyI6ImZhMzcxZTgyIn0.26yfc5Rl8TABtlxPiBHb6IJQCVpn4UO7wssH7KvVU2nT5t4K6krhk1mktE3e0gztxjKpd1MRIWgw7OMYOjrztg",
            plugins: [ Essentials, Paragraph, Bold, Italic, Font ],
            toolbar: [
                'undo', 'redo', '|', 'bold', 'italic', '|',
                'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor'
            ]
        } )
        .then( editor => {
            window.editor = editor;
        } )
        .catch( error => {
            console.error( error );
        } );
</script>
<script>
    $(document).ready(function () {
        const table = $('#dataTable').DataTable({
            paging: true,

            lengthMenu: [[10, 25, 50, 100], [10, 25, 50, 100]],
            searching: true,
            ordering: true,
            info: true,
            responsive: true
        });

        // Handle "Select All" checkbox
        $('#selectAll').on('change', function () {
            const isChecked = $(this).is(':checked');
            // Select all checkboxes in the current page
            $('#dataTable tbody .row-checkbox').prop('checked', isChecked);
        });

        // Handle individual row checkbox change
        $('#dataTable tbody').on('change', '.row-checkbox', function () {
            const totalCheckboxes = $('#dataTable tbody .row-checkbox').length;
            const checkedCheckboxes = $('#dataTable tbody .row-checkbox:checked').length;

            // Update the "Select All" checkbox state based on individual checkbox changes
            $('#selectAll').prop('checked', totalCheckboxes === checkedCheckboxes);
        });

        // Function to get selected rows (for further processing if needed)
        function getSelectedRows() {
            const selectedRows = [];
            $('#dataTable tbody .row-checkbox:checked').each(function () {
                selectedRows.push($(this).data('id')); // Add the data-id of selected rows
            });
            console.log('Selected Rows:', selectedRows);
        }

        // Example: Get selected rows on a button click (add a button in the UI if needed)
        $('#getSelectedButton').on('click', function () {
            getSelectedRows();
        });
    });
</script>
@yield('js')
