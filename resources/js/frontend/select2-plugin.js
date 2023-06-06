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

            setTimeout(() => {
                const province_val = $(province_select).data('current-value');
                if (province_val) {
                    $(province_select).val(province_val);
                    $(province_select).trigger('change');
                }
            }, 500);

        }

        $(".form-control").focus((e) => {
            $(e).attr("autocomplete", "off");
        });


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
    $(province_select).select2()
    // .on('select2:select', function (e) {
    //     console.log(e);
    //     var data = e.params.data;
    //     if (data.selected == true) {
    //         loadCity(data.id);
    //     }
    // })
    .on('change.select2', function (e) {
        loadCity($(province_select).val());
    });
    disable_select([city_select, district_select]);
    // loadProvince();

    // Load Servey Select
    $(brand_select).select2({
        allowClear: true,
        maximumSelectionLength: 2,
        placeholder: "Kategori produk yang dikonsumsi 3 bulan terakhir?"
    });

    $(category_select).select2({
        placeholder: "Brand susu yang dikonsumsi 3 bulan terakhir?"
    });

    $('#others_packsize').hide();

    $(size_select).select2({
        placeholder: "Ukuran Kemasan"
    })
    .on('change.select2', (e) => {
        if (e.target.value == 'Others') {
            $('#others_packsize').show();
        }else{
            $('#others_packsize').hide();
        }
    });
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
    $(city_select).empty();
    disable_select([city_select, district_select]);

    const res = await axios.get('/ajax/load-city/'+id);

    const configs = {
        data: res.data,
        disabled: false
    }

    $(city_select).select2(configs).on('change.select2', function (e) {
        loadDistrict($(city_select).val());
    }).trigger('change');

    const city_val = $(city_select).data('current-value');
    setTimeout(() => {
        if (city_val) {
            $(city_select).val(city_val);
            $(city_select).trigger('change');
            $(city_select).data('current-value', 0);
        }
    }, 500);
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

    const district_val = $(district_select).data('current-value');
    setTimeout(() => {
        if (district_val) {
            $(district_select).val(district_val);
            $(district_select).trigger('change');
            $(district_select).data('current-value', 0);
        }
    }, 1000);



}


