{{--<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js" type="text/javascript"></script>--}}
<script src="{{ asset(config('neptrox.asset_path.admin.vendor').'jquery.dataTables.js') }}"></script>
<script src="{{ asset(config('neptrox.asset_path.admin.vendor').'dataTables.bootstrap.js') }}"></script>

<script>

    (function (options) {

        var route_url = options.dataTableConfigVariable.route_url;
        var columns = options.dataTableConfigVariable.columns;
        var order = options.dataTableConfigVariable.orderColumn;
        if (order == 'undefined' || order == null || order == "") {
            order = 1;
        }
        var config = {
            "dom": '<t>' +
            '<"card-footer card-pagination"<"row"<"col-md-8"p><"col-md-4 form-design1 right"l>>>',
            "oLanguage": {
                "sLengthMenu": " _MENU_ ",
                "sSearchPlaceholder": "Search",
                "oPaginate": {
                    "sNext": "<span aria-hidden='true'>»</span><span class='sr-only'>Next</span>",
                    "sPrevious": "<span aria-hidden='true'>«</span><span class='sr-only'>Previous</span>"
                },
            },
            processing: true,
            serverSide: true,
            ajax: {
                type: 'POST',
                url: route_url.dataTable_url,
                data: {
                    _token: $('meta[name=csrf-token]').attr("content")
                }
            },
            columns: columns,
            'order': [[order, 'asc']]
        };

        //initialize dataTables
        var table = $('table.table').DataTable(config);

        $('#searchField').keyup(function(){
            table.search($(this).val()).draw() ;
        });


        //Enables or disables the performer and reload the ajax after success
        $('body').on('click', '.enableDisable', function (e) {
            e.preventDefault();
            var url = $(this).attr('href');
            $.ajax({
                type: 'GET',
                url: url,
                success: function (response) {
                    table.ajax.reload(null, false);
                }
            });
        });

        //toggle all checkbox checked or unchecked
        $('body').on('click', 'input[name="checkAll"]', function () {
            var checkBoxes = $("input[name=checkbox\\[\\]]");
            checkBoxes.prop("checked", $(this).prop("checked"));
        });

        //enable selected performers
        $('body').on('click', '#enable', function (e) {
            var url = route_url.enableAll;
            enableDisablePerformer(e, url);
        });

        //disable selected performers
        $('body').on('click', '#disable', function (e) {
            var url = route_url.disableAll;
            enableDisablePerformer(e, url);
        });

        function enableDisablePerformer(e, url) {
            e.preventDefault();
            var formData = $('input[name^=checkbox]');
            var data = {};
            formData.each(function (index) {
                if ($(this).is(':checked')) {
                    data[index] = $(this).val();
                }
            });
            $.ajax({
                type: 'POST',
                url: url,
                data: {
                    _token: $('meta[name=csrf-token]').attr("content"),
                    id: data
                },
                success: function (response) {
                    if (response == 'ok') {
                        table.ajax.reload(null, false);
                        $('body').find('input[name="checkAll"]').prop('checked', false);
                    }
                }
            });
        }


        //Delete confirmation popup
        $('body').on('click', '.try-sweet-warningConfirm', function () {
            var id = $(this).attr('id');
            swal({
                title: "{{ trans($trans_path.'general.delete.sure') }}",
                text: "{{ trans($trans_path.'general.delete.message') }}",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "{{ trans($trans_path.'general.delete.confirmButtonColor') }}",
                confirmButtonText: "{{ trans('general.button.delete') }}",
                cancelButtonText: "{{ trans('general.button.cancel') }}",
                closeOnConfirm: true
            }, function (isConfirm) {
                if (isConfirm) {
                    $.ajax({
                        type: 'POST',
                        url: route_url.delete,
                        data: {
                            _token: $('meta[name=csrf-token]').attr("content"),
                            id: id
                        },
                        success: function (response) {
                            table.row($(this).closest('tr')).remove().draw();
                            if (response == 'ok') {
                                swal({
                                    title: "{{ trans($trans_path.'general.status.delete') }}",
                                    text: "{{ trans($trans_path.'general.status.deleted') }}",
                                    type: "success",
                                    timer: 2000,
                                    confirmButtonColor: "{{ trans($trans_path.'general.delete.confirmButtonColor') }}"
                                });
                            }
                        }
                    });

                }
            });
        });

        //Delete bulk confirmation popup
        $('body').on('click', '#delete', function () {
            swal({
                title: "{{ trans($trans_path.'general.delete.sure') }}",
                text: "{{ trans($trans_path.'general.delete.message') }}",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "{{ trans($trans_path.'general.delete.confirmButtonColor') }}",
                confirmButtonText: "{{ trans('general.button.delete') }}",
                cancelButtonText: "{{ trans('general.button.cancel') }}",
                closeOnConfirm: true
            }, function (isConfirm) {
                if (isConfirm) {
                    var url =route_url.delete;
                    deleteBulkPerformer(url);
                    $('body').find('input[name="checkAll"]').prop('checked', false);
                    swal({
                        title: "{{ trans($trans_path.'general.status.delete') }}",
                        text: "{{ trans($trans_path.'general.status.deleted') }}",
                        type: "success",
                        timer: 2000,
                        confirmButtonColor: "{{ trans($trans_path.'general.delete.confirmButtonColor') }}"
                    });
                }
            });
        });

        function deleteBulkPerformer(url){
            var formData = $('input[name^=checkbox]');

            var data = {};
            formData.each(function (index) {
                if ($(this).is(':checked')) {
                    data[index] = $(this).val();
                }
            });
            $.ajax({
                type: 'POST',
                url: url,
                data: {
                    _token: $('meta[name=csrf-token]').attr("content"),
                    id: data,
                    bulk: 'bulk'
                },
                success: function (response) {
                    if (response == 'ok') {
                        table.row($(this).closest('tr')).remove().draw();
                    }
                }
            });
        }

    })({dataTableConfigVariable:dataTableConfigVariable});

</script>