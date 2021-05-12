<script type="text/javascript">

    console.log($title);

    $(document).ready(function() {
        messages();
    });

    function messages() {

        Swal.fire({
            title: "<?= $title ?>",
            text: "<?= $text ?>",
            icon: "<?= $icon ?>",
            confirmButtonText: "<?= $confirmButtonText ?>"
        });

    };
</script>