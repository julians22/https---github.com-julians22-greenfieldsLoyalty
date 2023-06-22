import 'alpinejs'

window.$ = window.jQuery = require('jquery');
window.Swal = require('sweetalert2');

// CoreUI
require('@coreui/coreui');

// Boilerplate
require('../plugins');

require('jquery-viewer');
require('viewerjs');

// Livewire.on('swalError', )

window.addEventListener('swalError', event => {
    alert('Name updated to: ' + event);
})
