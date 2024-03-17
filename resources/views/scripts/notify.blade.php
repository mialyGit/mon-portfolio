@session('message')
    <script type="text/javascript">
        $.notify({
            message: "{{ session()->get('message') }}",
            // icon: 'fa fa-check' 
        },{
            type: "success",
            placement : {from:"bottom",align:"right"},
            delay: 0,
	        timer: 0,
        });
    </script>
@endsession