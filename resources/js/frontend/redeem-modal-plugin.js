$('#redeemModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal

    if (button.length == 0) {
        var reward_id = window.reward_id;
        var reward_point = window.reward_point;
        var reward_current_point = window.reward_current_point;
        var reward_image = window.reward_image;
        var reward_name = window.reward_name;
    }else{
        var reward_id = button.data('reward-id') // Extract info from data-* attributes
        var reward_point = button.data('reward-point') // Extract info from data-* attributes
        var reward_current_point = button.data('reward-current-point') // Extract info from data-* attributes
        var reward_image = button.data('reward-image') // Extract info from data-* attributes
        var reward_name = button.data('reward-name') // Extract info from data-* attributes

        window.reward_id = reward_id;
        window.reward_point = reward_point;
        window.reward_current_point = reward_current_point;
        window.reward_image = reward_image;
        window.reward_name = reward_name;
    }



    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)
    modal.find('.modal-body .reward-img').attr('src', reward_image);
    modal.find('.modal-body .card-title').text(reward_name)
    modal.find('.modal-body .point').text(`${reward_point.toLocaleString("de-DE")} pts`);
    modal.find('.modal-body .reedem_cur_user_point').html(
        `<p class="mb-0">POIN KAMU</p><p>${reward_current_point.toLocaleString("de-DE")}</p>`
    );
    modal.find('.modal-body .reedem_reward_point').html(
        `<p class="mb-0">TUKAR HADIAH</p><p>${reward_point.toLocaleString("de-DE")} pts</p>`
    );

    let total = reward_current_point - reward_point;

    modal.find('.modal-body .reedem_total_user_point').html(
        `<p class="mb-0">SISA POIN</p><p>${total.toLocaleString("de-DE")} pts</p>`
    );

    modal.find('#current_redeem_id').val(reward_id);

});

$('#addressModal').on('shown.bs.modal', function (event) {
    $('#redeemModal').modal('hide');
});

$('#addressModal').on('hidden.bs.modal', function (event) {
    setTimeout(() => {
        $('#redeemModal').modal('show');
    }, 1000);
});

// Livewire listener event

window.addEventListener('address-changed', event => {
    $('#current_address_id').val(event.detail.id)
    $('#current_address').html(event.detail.address.address)
    $('#current_province').html(event.detail.address.rel_province.name)
    $('#current_city').html(event.detail.address.rel_city.name)
    $('#current_district').html(event.detail.address.rel_district.name)
    $('#current_postcode').html(event.detail.address.postal_code)
});

$('#save_current_address').on('click', () => {
    $('#addressModal').modal('hide');
});

$('#submit-reward').on('click', function(e) {
    // $('#resultModal').modal('show');
    $(this).attr('disabled', true);

    const url = $(this).attr('data-submit-url');
    const reward_id = window.reward_id;
    const address_id = $('#current_address_id').val();

    axios.post(url, {
        reward_id: reward_id,
        address_id: address_id
    })
    .then(function (response) {
        if (response.status == 200) {
            $(this).attr('disabled', false);
            $('#redeemModal').modal('hide');
            $('#resultModal').find('#remaining-poin').text(response.data.point_now);
            $('#resultModal').modal('show');
        }else{
            window.location.reload();
        }
    })
    .catch(function (error) {
        console.log(error);
        $(this).attr('disabled', false);

        alert('Sistem sibuk, cobalah beberapa saat lagi');
        window.location.reload();
    });
});

$('#resultModal').on('hidden.bs.modal', function (event) {
    window.location.reload();
});



