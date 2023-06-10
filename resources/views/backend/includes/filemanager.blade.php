<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>

<script>
    var route_prefix = "{{ env('APP_URL') }}/admin/laravel-filemanager";

    $('#lfm').filemanager('image');

    $('#lfm').filemanager('image', {prefix: route_prefix});

    $(document).ready(() => {
        const image_url = $('#rewardholder').data('url');
        if (image_url) {
            $('#rewardholder').append(
                $('<img>').attr('src', image_url)
            )
        }
    })
</script>
