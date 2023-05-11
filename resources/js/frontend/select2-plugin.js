const { default: axios } = require("axios");

let province_select = '.select-province',
    city_select = '.select-city',
    district_select = '.select-district';

let provinces, city, district;

const defaultConfig = {
    theme : "bootstrap4"
}

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
        theme: defaultConfig.theme,
        disabled: true,
        data: []
    }

    selects.forEach(element => {
        $(element).select2(configs).val(null).trigger('change');
    });
}

function initSelect2(){

    const configs = defaultConfig;

    $(province_select).select2(configs);

    disable_select([city_select, district_select]);

    loadProvince();
}

async function loadProvince(){
    const res = await axios.get('/ajax/load-province');

    const configs = {
        theme: defaultConfig.theme,
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
        theme: defaultConfig.theme,
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
        theme: defaultConfig.theme,
        data: res.data,
        disabled: false
    }

    $(district_select).select2(configs);
}


