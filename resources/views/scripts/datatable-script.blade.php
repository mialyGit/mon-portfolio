<script src="{{ asset('assets/js/plugins/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/select2.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/sweetalert.min.js') }}"></script>
<script>
    $("#type-media").select2({
        placeholder: "Filter by type",
        allowClear: true
    });
</script>
