<?php

return [
    'online_stores' => [
        [
            'name' => 'Tokopedia',
            'title' => 'Greenfields Official Store',
            'url' => 'https://www.tokopedia.com/greenfields/product',
            'image' => '/img/online-stores/tokopedia.png'
        ],
        [
            'name' => 'Astro',
            'title' => 'Astro',
            'url' => 'https://astroid.link/3ATKzDaFRtb',
            'image' => '/img/online-stores/astro.png'
        ],
        [
            'name' => 'Japfa Best',
            'title' => 'Japfa best online',
            'url' => 'https://linktr.ee/japfabestonline',
            'image' => '/img/online-stores/japfa.png'
        ],
        [
            'name' => 'Bananas',
            'title' => 'Bananas',
            'url' => 'https://www.bananas.id/',
            'image' => '/img/online-stores/bananas.jpg'
        ],
        [
            'name' => 'Shopee',
            'title' => 'Japfa Best Official Shop',
            'url' => 'https://shopee.co.id/mall/search?keyword=greenfields&shop=269483414',
            'image' => '/img/online-stores/shopee.png'
        ],
        [
            'name' => 'Blibli',
            'title' => 'Greenfields Official Store',
            'url' => 'https://www.blibli.com/brand/greenfields-official-store?page=1&start=0&intent=true&brandName=greenfields-official-store&multiCategory=true&sort=7',
            'image' => '/img/online-stores/blibli.png'
        ],
        [
            'name' => 'Indomaret Klik',
            'title' => 'Indomaret Klik',
            'url' => 'https://www.klikindomaret.com/search/?key=greenfields',
            'image' => '/img/online-stores/indomaretklik.png'
        ],
        [
            'name' => 'Harnic ID',
            'title' => 'Greenfields Store',
            'url' => 'https://harnic.id/url/greenfield',
            'image' => '/img/online-stores/harnic.png'
        ],
        [
            'name' => 'Sayur Box',
            'title' => 'Sayur Box',
            'url' => 'https://www.sayurbox.com/search?q=greenfields',
            'image' => '/img/online-stores/sayurbox.png'
        ],
        [
            'name' => 'Segari',
            'title' => 'Segari',
            'url' => 'https://segari.id/search?query=greenfields',
            'image' => '/img/online-stores/segari.png'
        ],
        [
            'name' => 'Grabmart kilat',
            'title' => 'Grabmart kilat',
            'url' => '#',
            'image' => '/img/online-stores/grabmart.png'
        ],
        [
            'name' => 'Alfa Gift',
            'title' => 'Alfa Gift',
            'url' => 'https://alfagift.id/find/Greenfields',
            'image' => '/img/online-stores/alfagift.png'
        ],
    ],
    'courier' => [
        [
            'name' => 'RPX',
            'value' => 'RPX'
        ],
        [
            'name' => 'JNE',
            'value' => 'JNE'
        ],
        [
            'name' => 'Gojek',
            'value' => 'Gojek'
        ],
        [
            'name' => 'Gosend',
            'value' => 'Gosend'
        ],
        [
            'name' => 'J&T',
            'value' => 'J&T'
        ],
        [
            'name' => 'Tiki',
            'value' => 'Tiki'
        ],
    ],
    'sku' => [
        'channel' => [
            'Offline' => [
                'Minis',
                'Hyper',
                'Super',
                'MTI A',
                'MTI B',
                'General Trade'
            ],
            'Online' => [
                'Ecommerce',
                'Quickcommerce',
                'Home Delivery',
            ]
        ],
        'offline_channel' => [
            'Minimarket', 'Hypermarket', 'Supermarket', 'MTI A', 'MTI B', 'General Trade'
        ],
        'online_channel' => [
            'Ecommerce', 'QuickCommerce'
        ],
        'flavour' => [
            'Full Cream',
            'Skimmed / Non Fat',
            'Low Fat',
            'Chocomalt',
            'Fresh Jersey',
            'Strawberry',
            'Low Fat Mochaccino',
            'Original Yogurt',
            'Strawberry Yogurt',
            'Blueberry Yogurt',
            'Mango Yogurt',
            'Raspberry Yogurt',
            'Lychee Yogurt',
            'Mixed Berry Yogurt',
            'Mango Peach Yogurt',
            'Plain Yogurt',
            'Peach Yogurt',
            'Summer soursoup Yogurt',
            'Tropical Banana Yogurt',
            'Mixed Fruit Yogurt',
            'Bocconcini Cheese',
            'Ricotta Cheese',
            'Mozarella Cheese',
            'Whipping Cream',
            'Extra Go Chocomalt',
            'Extra Glam Strawberry Rosemilk with Collagen',
            'Extra Chill Vanilla Chamomile',
            'Extra Cheers Honey Earl Grey '
        ],
        'template' => "Tanggal Struk:\nNomor Struk:\nChannel: Offline / Online\nSub-Channel: Offline(Minimarket / Hypermarket / Supermarket / MTI A / MTI B), Online (Ecommerce / QuickCommerce)\nDaerah Toko: (Jawa Barat / Jawa Tengah / Etc)\nNama Toko: (Toko Albarkah)\nKategori produk apa: Fresh Milk / UHT Big Pack / UHT Small Pack / Yogurt / Cheese / Whipping Cream\nPacksize: (1L / 1.89 L)\nFlavor: (Full Cream / Strawberry / Chocolate / Low Fat / Skimmed / dll)\nQty Purchase: (1 / 2 / 3)\nNormal Price: xxx\nDiscount Price: xxx\nTotal Price: xxxx",

        // Packsize available configs
        'packsize' => [
            '1.89 L',
            '1 L',
            '500 ml',
            '250 ml',
            '200 ml',
            '125 ml',
            '105 ml',
            '1 kg',
            '500 gram',
            '200 gram',
            'shredded 200 gram',
            '250 gram',
            '125 gram',
            '110 gram',
            '330 gram',
        ],
        'categories' => [
            'Fresh Milk',
            'UHT Big Pack',
            'UHT Small Pack',
            'Yogurt Pouch',
            'Yogurt Cup',
            'Yogurt RTD',
            'Cheese',
            'Whipping Cream',
        ],

    ],
    'offline_reward_id' => env('OFFLINE_REWARD_ID', 1),
    'offline_user_utm' => env('OFFLINE_USER_UTM', 'offline')
];
