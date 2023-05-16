const { default: axios } = require("axios");

let province_select = '.select-province',
    city_select = '.select-city',
    district_select = '.select-district',
    brand_select = '.select-brand',
    category_select = '.select-category',
    size_select = '.select-size';

let provinces, city, district;

$.fn.select2.defaults.set( "theme", "bootstrap" );

$(document).ready(function() {

        if (
            province_select.length||
            city_select.length||
            district_select.length
            ) {

            initSelect2();

        }
})

function disable_select(selects) {
    const configs = {
        disabled: true,
        data: []
    }

    selects.forEach(element => {
        $(element).select2(configs).val(null).trigger('change');
    });
}

function initSelect2(){

    // Load Area Select
    $(province_select).select2();
    disable_select([city_select, district_select]);
    loadProvince();

    // Load Servey Select
    $(brand_select).select2({
        allowClear: true,
        maximumSelectionLength: 2
    });

    $(category_select).select2();
    $(size_select).select2();
}

async function loadProvince(){
    const res = await axios.get('/ajax/load-province');

    const configs = {
        data: res.data
    }

    $(province_select).select2(configs).on('select2:select', function (e) {
        var data = e.params.data;

        if (data.selected == true) {
            loadCity(data.id);
        }
    });
}

async function loadCity(id) {
    disable_select([city_select, district_select]);
    $(city_select).empty();

    const res = await axios.get('/ajax/load-city/'+id);

    const configs = {
        data: res.data,
        disabled: false
    }

    $(city_select).select2(configs).on('select2:select', function (e) {
        var data = e.params.data;

        if (data.selected == true) {
            loadDistrict(data.id);
        }
    });
}

async function loadDistrict(id){
    disable_select([district_select]);
    $(district_select).empty();

    const res = await axios.get('/ajax/load-district/'+id);

    const configs = {
        data: res.data,
        disabled: false
    }

    $(district_select).select2(configs);
}


