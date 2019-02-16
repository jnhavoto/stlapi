<script src="{{ asset('theme/plugins/jquery/jquery.min.js') }}"></script>

<script src="{{ asset('js/dropzone.js') }}"></script>

<!-- Bootstrap tether Core JavaScript -->
<script src="{{ asset('theme/plugins/popper/popper.min.js') }}"></script>
<script src="{{ asset('theme/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
<!-- slimscrollbar scrollbar JavaScript -->
<script src="{{ asset('theme/js/jquery.slimscroll.js') }}"></script>
<!--Wave Effects -->
<script src="{{ asset('theme/js/waves.js') }}"></script>
<!--Menu sidebar -->
<script src="{{ asset('theme/js/sidebarmenu.js') }}"></script>
<!--stickey kit -->
<script src="{{ asset('theme/plugins/sticky-kit-master/dist/sticky-kit.min.js') }}"></script>
<script src="{{ asset('theme/plugins/sparkline/jquery.sparkline.min.js') }}"></script>
<!--Custom JavaScript -->
<script src="{{ asset('theme/js/custom.min.js') }}"></script>
<!-- ============================================================== -->
<!-- This page plugins -->
<!-- ============================================================== -->
<!-- chartist chart -->

<script src="{{ asset('theme/plugins/chartist-js/dist/chartist.min.js') }}"></script>
<script src="{{ asset('theme/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js') }}"></script>

<!--c3 JavaScript -->
<script src="{{ asset('theme/plugins/d3/d3.min.js') }}"></script>
<script src="{{ asset('theme/plugins/c3-master/c3.min.js') }}"></script>
<!-- Chart JS -->
<script src="{{ asset('theme/js/dashboard1.js') }}"></script>
<!-- ============================================================== -->
<!-- Style switcher -->
<!-- ============================================================== -->
<script src="{{ asset('theme/plugins/styleswitcher/jQuery.style.switcher.js') }}"></script>
{{-->>>>>>> 295d75aa0c2291c9160945b1239640761e56ecc1--}}
<script src="{{ asset('js/select2.min.js')}}"></script>

<script src="{{ asset('js/select2.js')}}"></script>
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.js"></script>--}}

<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>

<!-- This is data table -->
<script src="{{ asset('theme/plugins/datatables/jquery.dataTables.min.js') }}"></script>

<script>
    $(document).ready(function () {
        $('#myTable').DataTable();
        $(document).ready(function () {
            var table = $('#example').DataTable({
                "columnDefs": [{
                    "visible": false,
                    "targets": 2
                }],
                "order": [
                    [2, 'asc']
                ],
                "displayLength": 25,
                "drawCallback": function (settings) {
                    var api = this.api();
                    var rows = api.rows({
                        page: 'current'
                    }).nodes();
                    var last = null;
                    api.column(2, {
                        page: 'current'
                    }).data().each(function (group, i) {
                        if (last !== group) {
                            $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
                            last = group;
                        }
                    });
                }
            });
            // Order by the grouping
            $('#example tbody').on('click', 'tr.group', function () {
                var currentOrder = table.order()[0];
                if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                    table.order([2, 'desc']).draw();
                } else {
                    table.order([2, 'asc']).draw();
                }
            });
        });
    });
    // $('#example23').DataTable({
    //     dom: 'Bfrtip',
    //     buttons: [
    //         'copy', 'csv', 'excel', 'pdf', 'print'
    //     ]
    // });
</script>

@yield('dropzones')


