<script src=" {{ asset('assets/vendor/jquery-validation/jquery.validate.min.js') }}"></script>
    <!-- Form validate init -->
<script>
    function setValidateForm(rules, messages = []) {
        jQuery(".form-valide").validate({
            rules,
            messages,
            ignore: [],
            errorClass: "invalid-feedback animated fadeInUp",
            errorElement: "div",
            errorPlacement: function(error, element) {
                jQuery(element).parents(".form-group").append(error)
            },
            highlight: function(e) {
                jQuery(e).removeClass("is-invalid").addClass("is-invalid")
            },
            unhighlight: function(e) {
                jQuery(e).removeClass("is-invalid")
            },
        });
    }

</script>