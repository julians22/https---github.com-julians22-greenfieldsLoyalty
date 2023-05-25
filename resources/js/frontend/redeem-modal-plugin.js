$('#redeemModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var reward_id = button.data('reward-id') // Extract info from data-* attributes
    var reward_point = button.data('reward-point') // Extract info from data-* attributes
    var reward_current_point = button.data('reward-current-point') // Extract info from data-* attributes
    var reward_image = button.data('reward-image') // Extract info from data-* attributes
    var reward_name = button.data('reward-name') // Extract info from data-* attributes

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
})
