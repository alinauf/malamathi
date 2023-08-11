<?php

namespace Database\Seeders;

use App\Models\Atoll;
use App\Models\Island;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;

class AtollSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $atolls = [
            [
                "code" => "MLE",
                "name" => "Male' City",
                "islands" => [
                    [
                        "atoll_code" => "MLE",
                        "name" => "Male'"
                    ],
                    [
                        "atoll_code" => "MLE",
                        "name" => "Villimale'"
                    ],
                    [
                        "atoll_code" => "MLE",
                        "name" => "Hulhumale'"
                    ]
                ]
            ],
            [
                "code" => "HA",
                "name" => "North Thiladhunmathi",
                "atoll_capital" => "Dhidhdhoo",
                "islands" => [
                    [
                        "atoll_code" => "HA",
                        "name" => "Baarah"
                    ],
                    [
                        "atoll_code" => "HA",
                        "name" => "Dhidhdhoo"
                    ],
                    [
                        "atoll_code" => "HA",
                        "name" => "Filladhoo"
                    ],
                    [
                        "atoll_code" => "HA",
                        "name" => "Hoarafushi"
                    ],
                    [
                        "atoll_code" => "HA",
                        "name" => "Ihavandhoo"
                    ],
                    [
                        "atoll_code" => "HA",
                        "name" => "Kelaa"
                    ],
                    [
                        "atoll_code" => "HA",
                        "name" => "Maarandhoo"
                    ],
                    [
                        "atoll_code" => "HA",
                        "name" => "Mulhadhoo"
                    ],
                    [
                        "atoll_code" => "HA",
                        "name" => "Muraidhoo"
                    ],
                    [
                        "atoll_code" => "HA",
                        "name" => "Thakandhoo"
                    ],
                    [
                        "atoll_code" => "HA",
                        "name" => "Thurakunu"
                    ],
                    [
                        "atoll_code" => "HA",
                        "name" => "Uligamu"
                    ],
                    [
                        "atoll_code" => "HA",
                        "name" => "Utheemu"
                    ],
                    [
                        "atoll_code" => "HA",
                        "name" => "Vashafaru"
                    ]
                ]
            ],
            [
                "code" => "HDh",
                "name" => "South Thiladhunmathi",
                "atoll_capital" => "Kulhudhuffushi",
                "islands" => [
                    [
                        "atoll_code" => "HDh",
                        "name" => "Finey"
                    ],
                    [
                        "atoll_code" => "HDh",
                        "name" => "Hanimaadhoo"
                    ],
                    [
                        "atoll_code" => "HDh",
                        "name" => "Hirimaradhoo"
                    ],
                    [
                        "atoll_code" => "HDh",
                        "name" => "Kulhudhuffushi"
                    ],
                    [
                        "atoll_code" => "HDh",
                        "name" => "Kumundhoo"
                    ],
                    [
                        "atoll_code" => "HDh",
                        "name" => "Kuribi"
                    ],
                    [
                        "atoll_code" => "HDh",
                        "name" => "Makunudhoo"
                    ],
                    [
                        "atoll_code" => "HDh",
                        "name" => "Naivaadhoo"
                    ],
                    [
                        "atoll_code" => "HDh",
                        "name" => "Nellaidhoo"
                    ],
                    [
                        "atoll_code" => "HDh",
                        "name" => "Neykurendhoo"
                    ],
                    [
                        "atoll_code" => "HDh",
                        "name" => "Nolhivaramu"
                    ],
                    [
                        "atoll_code" => "HDh",
                        "name" => "Nolhivaranfaru"
                    ],
                    [
                        "atoll_code" => "HDh",
                        "name" => "Vaikaradhoo"
                    ]
                ]
            ],
            [
                "code" => "Sh",
                "name" => "North Miladhunmadulu",
                "atoll_capital" => "Funadhoo",
                "islands" => [
                    [
                        "atoll_code" => "Sh",
                        "name" => "Bilehffahi"
                    ],
                    [
                        "atoll_code" => "Sh",
                        "name" => "Feevah"
                    ],
                    [
                        "atoll_code" => "Sh",
                        "name" => "Feydhoo"
                    ],
                    [
                        "atoll_code" => "Sh",
                        "name" => "Foakaidhoo"
                    ],
                    [
                        "atoll_code" => "Sh",
                        "name" => "Funadhoo"
                    ],
                    [
                        "atoll_code" => "Sh",
                        "name" => "Goidhoo"
                    ],
                    [
                        "atoll_code" => "Sh",
                        "name" => "Kaditheemu"
                    ],
                    [
                        "atoll_code" => "Sh",
                        "name" => "Komandoo"
                    ],
                    [
                        "atoll_code" => "Sh",
                        "name" => "Lhaimagu"
                    ],
                    [
                        "atoll_code" => "Sh",
                        "name" => "Maaugoodhoo"
                    ],
                    [
                        "atoll_code" => "Sh",
                        "name" => "Maroshi"
                    ],
                    [
                        "atoll_code" => "Sh",
                        "name" => "Milandhoo"
                    ],
                    [
                        "atoll_code" => "Sh",
                        "name" => "Narudhoo"
                    ],
                    [
                        "atoll_code" => "Sh",
                        "name" => "Noomaraa"
                    ]
                ]
            ],
            [
                "code" => "N",
                "name" => "South Miladhunmadulu",
                "atoll_capital" => "Manadhoo",
                "islands" => [
                    [
                        "atoll_code" => "N",
                        "name" => "Fodhdhoo"
                    ],
                    [
                        "atoll_code" => "N",
                        "name" => "Hebadhoo"
                    ],
                    [
                        "atoll_code" => "N",
                        "name" => "Holhudhoo"
                    ],
                    [
                        "atoll_code" => "N",
                        "name" => "Kedhikolhudhoo"
                    ],
                    [
                        "atoll_code" => "N",
                        "name" => "Kudafari"
                    ],
                    [
                        "atoll_code" => "N",
                        "name" => "Landhoo"
                    ],
                    [
                        "atoll_code" => "N",
                        "name" => "Lhohi"
                    ],
                    [
                        "atoll_code" => "N",
                        "name" => "Maafaru"
                    ],
                    [
                        "atoll_code" => "N",
                        "name" => "Maalhendhoo"
                    ],
                    [
                        "atoll_code" => "N",
                        "name" => "Magoodhoo"
                    ],
                    [
                        "atoll_code" => "N",
                        "name" => "Manadhoo"
                    ],
                    [
                        "atoll_code" => "N",
                        "name" => "Miladhoo"
                    ],
                    [
                        "atoll_code" => "N",
                        "name" => "Velidhoo"
                    ]
                ]
            ],
            [
                "code" => "R",
                "name" => "North Maalhosmadulu",
                "atoll_capital" => "Ungufaaru",
                "islands" => [
                    [
                        "atoll_code" => "R",
                        "name" => "Agolhitheemu"
                    ],
                    [
                        "atoll_code" => "R",
                        "name" => "Alifushi"
                    ],
                    [
                        "atoll_code" => "R",
                        "name" => "Fainu"
                    ],
                    [
                        "atoll_code" => "R",
                        "name" => "Hulhudhuffaaru"
                    ],
                    [
                        "atoll_code" => "R",
                        "name" => "Iguraidhoo"
                    ],
                    [
                        "atoll_code" => "R",
                        "name" => "Innamaadhoo"
                    ],
                    [
                        "atoll_code" => "R",
                        "name" => "Kinolhas"
                    ],
                    [
                        "atoll_code" => "R",
                        "name" => "Maakurathu"
                    ],
                    [
                        "atoll_code" => "R",
                        "name" => "Maduvvari"
                    ],
                    [
                        "atoll_code" => "R",
                        "name" => "Meedhoo"
                    ],
                    [
                        "atoll_code" => "R",
                        "name" => "Rasgetheemu"
                    ],
                    [
                        "atoll_code" => "R",
                        "name" => "Rasmaadhoo"
                    ],
                    [
                        "atoll_code" => "R",
                        "name" => "Ungufaaru"
                    ],
                    [
                        "atoll_code" => "R",
                        "name" => "Vaadhoo"
                    ],
                    [
                        "atoll_code" => "R",
                        "name" => "Dhuvaafaru"
                    ]
                ]
            ],
            [
                "code" => "B",
                "name" => "South Maalhosmadulu",
                "atoll_capital" => "Eydhafushi",
                "islands" => [
                    [
                        "atoll_code" => "B",
                        "name" => "Dharavandhoo"
                    ],
                    [
                        "atoll_code" => "B",
                        "name" => "Dhonfanu"
                    ],
                    [
                        "atoll_code" => "B",
                        "name" => "Eydhafushi"
                    ],
                    [
                        "atoll_code" => "B",
                        "name" => "Fehendhoo"
                    ],
                    [
                        "atoll_code" => "B",
                        "name" => "Fulhadhoo"
                    ],
                    [
                        "atoll_code" => "B",
                        "name" => "Goidhoo"
                    ],
                    [
                        "atoll_code" => "B",
                        "name" => "Hithaadhoo"
                    ],
                    [
                        "atoll_code" => "B",
                        "name" => "Kamadhoo"
                    ],
                    [
                        "atoll_code" => "B",
                        "name" => "Kendhoo"
                    ],
                    [
                        "atoll_code" => "B",
                        "name" => "Kihaadhoo"
                    ],
                    [
                        "atoll_code" => "B",
                        "name" => "Kudarikilu"
                    ],
                    [
                        "atoll_code" => "B",
                        "name" => "Maalhos"
                    ],
                    [
                        "atoll_code" => "B",
                        "name" => "Thulhaadhoo"
                    ]
                ]
            ],
            [
                "code" => "Lh",
                "name" => "Faadhippolhu",
                "atoll_capital" => "Naifaru",
                "islands" => [
                    [
                        "atoll_code" => "Lh",
                        "name" => "Hinnavaru"
                    ],
                    [
                        "atoll_code" => "Lh",
                        "name" => "Kurendhoo"
                    ],
                    [
                        "atoll_code" => "Lh",
                        "name" => "Naifaru"
                    ],
                    [
                        "atoll_code" => "Lh",
                        "name" => "Olhuvelifushi"
                    ]
                ]
            ],
            [
                "code" => "K",
                "name" => "Male' Atoll",
                "atoll_capital" => "Thulusdhoo",
                "islands" => [
                    [
                        "atoll_code" => "K",
                        "name" => "Dhiffushi"
                    ],
                    [
                        "atoll_code" => "K",
                        "name" => "Gaafuru"
                    ],
                    [
                        "atoll_code" => "K",
                        "name" => "Gulhi"
                    ],
                    [
                        "atoll_code" => "K",
                        "name" => "Guraidhoo"
                    ],
                    [
                        "atoll_code" => "K",
                        "name" => "Himmafushi"
                    ],
                    [
                        "atoll_code" => "K",
                        "name" => "Huraa"
                    ],
                    [
                        "atoll_code" => "K",
                        "name" => "Kaashidhoo"
                    ],
                    [
                        "atoll_code" => "K",
                        "name" => "Maafushi"
                    ],
                    [
                        "atoll_code" => "K",
                        "name" => "Thulusdhoo"
                    ]
                ]
            ],
            [
                "code" => "AA",
                "name" => "North Ari Atoll",
                "atoll_capital" => "Rasdhoo",
                "islands" => [
                    [
                        "atoll_code" => "AA",
                        "name" => "Bodufolhudhoo"
                    ],
                    [
                        "atoll_code" => "AA",
                        "name" => "Feridhoo"
                    ],
                    [
                        "atoll_code" => "AA",
                        "name" => "Himandhoo"
                    ],
                    [
                        "atoll_code" => "AA",
                        "name" => "Maalhos"
                    ],
                    [
                        "atoll_code" => "AA",
                        "name" => "Mathiveri"
                    ],
                    [
                        "atoll_code" => "AA",
                        "name" => "Rasdhoo"
                    ],
                    [
                        "atoll_code" => "AA",
                        "name" => "Thoddoo"
                    ],
                    [
                        "atoll_code" => "AA",
                        "name" => "Ukulhas"
                    ]
                ]
            ],
            [
                "code" => "ADh",
                "name" => "South Ari Atoll",
                "atoll_capital" => "Mahibadhoo",
                "islands" => [
                    [
                        "atoll_code" => "ADh",
                        "name" => "Hangnameedhoo"
                    ],
                    [
                        "atoll_code" => "ADh",
                        "name" => "Omadhoo"
                    ],
                    [
                        "atoll_code" => "ADh",
                        "name" => "Kuburudhoo"
                    ],
                    [
                        "atoll_code" => "ADh",
                        "name" => "Dhagethi"
                    ],
                    [
                        "atoll_code" => "ADh",
                        "name" => "Dhidhdhoo"
                    ],
                    [
                        "atoll_code" => "ADh",
                        "name" => "Dhigurah "
                    ],
                    [
                        "atoll_code" => "ADh",
                        "name" => "Fenfushi"
                    ],
                    [
                        "atoll_code" => "ADh",
                        "name" => "Maamigili"
                    ],
                    [
                        "atoll_code" => "ADh",
                        "name" => "Mahibadhoo"
                    ],
                    [
                        "atoll_code" => "ADh",
                        "name" => "Mandhoo"
                    ]
                ]
            ],
            [
                "code" => "V",
                "name" => "Felidhu Atoll",
                "atoll_capital" => "Felidhoo",
                "islands" => [
                    [
                        "atoll_code" => "V",
                        "name" => "Felidhoo"
                    ],
                    [
                        "atoll_code" => "V",
                        "name" => "Fulidhoo"
                    ],
                    [
                        "atoll_code" => "V",
                        "name" => "Keyodhoo"
                    ],
                    [
                        "atoll_code" => "V",
                        "name" => "Rakeedhoo"
                    ],
                    [
                        "atoll_code" => "V",
                        "name" => "Thinadhoo"
                    ]
                ]
            ],
            [
                "code" => "M",
                "name" => "Mulakatholhu",
                "atoll_capital" => "Muli",
                "islands" => [
                    [
                        "atoll_code" => "M",
                        "name" => "Dhiggaru"
                    ],
                    [
                        "atoll_code" => "M",
                        "name" => "Kolhufushi "
                    ],
                    [
                        "atoll_code" => "M",
                        "name" => "Maduvvari"
                    ],
                    [
                        "atoll_code" => "M",
                        "name" => "Mulah"
                    ],
                    [
                        "atoll_code" => "M",
                        "name" => "Muli"
                    ],
                    [
                        "atoll_code" => "M",
                        "name" => "Naalaafushi"
                    ],
                    [
                        "atoll_code" => "M",
                        "name" => "Raiymandhoo"
                    ],
                    [
                        "atoll_code" => "M",
                        "name" => "Veyvah"
                    ]
                ]
            ],
            [
                "code" => "F",
                "name" => "North Nilandhe Atoll",
                "atoll_capital" => "Nilandhoo",
                "islands" => [
                    [
                        "atoll_code" => "F",
                        "name" => "Biledhdhoo"
                    ],
                    [
                        "atoll_code" => "F",
                        "name" => "Dharaboodhoo"
                    ],
                    [
                        "atoll_code" => "F",
                        "name" => "Feeali"
                    ],
                    [
                        "atoll_code" => "F",
                        "name" => "Magoodhoo"
                    ],
                    [
                        "atoll_code" => "F",
                        "name" => "Nilandhoo"
                    ]
                ]
            ],
            [
                "code" => "Dh",
                "name" => "South Nilandhe Atoll",
                "atoll_capital" => "Kudahuvadhoo",
                "islands" => [
                    [
                        "atoll_code" => "Dh",
                        "name" => "Bandidhoo"
                    ],
                    [
                        "atoll_code" => "Dh",
                        "name" => "Hulhudheli"
                    ],
                    [
                        "atoll_code" => "Dh",
                        "name" => "Kudahuvadhoo"
                    ],
                    [
                        "atoll_code" => "Dh",
                        "name" => "Maaeboodhoo"
                    ],
                    [
                        "atoll_code" => "Dh",
                        "name" => "Meedhoo"
                    ],
                    [
                        "atoll_code" => "Dh",
                        "name" => "Rinbudhoo"
                    ]
                ]
            ],
            [
                "code" => "Th",
                "name" => "Kolhumadulu",
                "atoll_capital" => "Veymandoo",
                "islands" => [
                    [
                        "atoll_code" => "Th",
                        "name" => "Buruni"
                    ],
                    [
                        "atoll_code" => "Th",
                        "name" => "Vilufushi"
                    ],
                    [
                        "atoll_code" => "Th",
                        "name" => "Madifushi"
                    ],
                    [
                        "atoll_code" => "Th",
                        "name" => "Dhiyamigili"
                    ],
                    [
                        "atoll_code" => "Th",
                        "name" => "Guraidhoo"
                    ],
                    [
                        "atoll_code" => "Th",
                        "name" => "Kadoodhoo"
                    ],
                    [
                        "atoll_code" => "Th",
                        "name" => "Vandhoo"
                    ],
                    [
                        "atoll_code" => "Th",
                        "name" => "Hirilandhoo"
                    ],
                    [
                        "atoll_code" => "Th",
                        "name" => "Gaadhiffushi"
                    ],
                    [
                        "atoll_code" => "Th",
                        "name" => "Thimarafushi"
                    ],
                    [
                        "atoll_code" => "Th",
                        "name" => "Veymandoo"
                    ],
                    [
                        "atoll_code" => "Th",
                        "name" => "Kinbidhoo"
                    ],
                    [
                        "atoll_code" => "Th",
                        "name" => "Omadhoo"
                    ]
                ]
            ],
            [
                "code" => "L",
                "name" => "Hadhdhunmathi",
                "atoll_capital" => "Fonadhoo",
                "islands" => [
                    [
                        "atoll_code" => "L",
                        "name" => "Dhabidhoo"
                    ],
                    [
                        "atoll_code" => "L",
                        "name" => "Fonadhoo"
                    ],
                    [
                        "atoll_code" => "L",
                        "name" => "Gaadhoo"
                    ],
                    [
                        "atoll_code" => "L",
                        "name" => "Gan"
                    ],
                    [
                        "atoll_code" => "L",
                        "name" => "Hithadhoo"
                    ],
                    [
                        "atoll_code" => "L",
                        "name" => "Isdhoo"
                    ],
                    [
                        "atoll_code" => "L",
                        "name" => "Kunahandhoo"
                    ],
                    [
                        "atoll_code" => "L",
                        "name" => "Maabaidhoo"
                    ],
                    [
                        "atoll_code" => "L",
                        "name" => "Maamendhoo"
                    ],
                    [
                        "atoll_code" => "L",
                        "name" => "Maavah"
                    ],
                    [
                        "atoll_code" => "L",
                        "name" => "Mundoo"
                    ],
                    [
                        "atoll_code" => "L",
                        "name" => "Kalaidhoo"
                    ]
                ]
            ],
            [
                "code" => "GA",
                "name" => "North Huvadhu Atoll",
                "atoll_capital" => "Viligili",
                "islands" => [
                    [
                        "atoll_code" => "GA",
                        "name" => "Dhaandhoo"
                    ],
                    [
                        "atoll_code" => "GA",
                        "name" => "Dhevvadhoo"
                    ],
                    [
                        "atoll_code" => "GA",
                        "name" => "Gemanafushi"
                    ],
                    [
                        "atoll_code" => "GA",
                        "name" => "Kanduhulhudhoo"
                    ],
                    [
                        "atoll_code" => "GA",
                        "name" => "Kondey"
                    ],
                    [
                        "atoll_code" => "GA",
                        "name" => "Kolamaafushi"
                    ],
                    [
                        "atoll_code" => "GA",
                        "name" => "Maamendhoo"
                    ],
                    [
                        "atoll_code" => "GA",
                        "name" => "Nilandhoo"
                    ],
                    [
                        "atoll_code" => "GA",
                        "name" => "Viligili"
                    ]
                ]
            ],
            [
                "code" => "GDh",
                "name" => "South Huvadhu Atoll",
                "atoll_capital" => "Thinadhoo",
                "islands" => [
                    [
                        "atoll_code" => "GDh",
                        "name" => "Faresmaathodaa"
                    ],
                    [
                        "atoll_code" => "GDh",
                        "name" => "Fiyoari"
                    ],
                    [
                        "atoll_code" => "GDh",
                        "name" => "Gadhdhoo"
                    ],
                    [
                        "atoll_code" => "GDh",
                        "name" => "Hoadedhdhoo"
                    ],
                    [
                        "atoll_code" => "GDh",
                        "name" => "Madeveli"
                    ],
                    [
                        "atoll_code" => "GDh",
                        "name" => "Nadallaa"
                    ],
                    [
                        "atoll_code" => "GDh",
                        "name" => "Rathafandhoo"
                    ],
                    [
                        "atoll_code" => "GDh",
                        "name" => "Thinadhoo"
                    ],
                    [
                        "atoll_code" => "GDh",
                        "name" => "Vaadhoo"
                    ]
                ]
            ],
            [
                "code" => "Gn",
                "name" => "Fuvahmulah",
                "atoll_capital" => "Fuvahmulah",
                "islands" => [
                    [
                        "atoll_code" => "Gn",
                        "name" => "Fuvahmulah"
                    ]
                ]
            ],
            [
                "code" => "S",
                "name" => "Addu Atoll",
                "atoll_capital" => "Hithadhoo",
                "islands" => [
                    [
                        "atoll_code" => "S",
                        "name" => "Meedhoo"
                    ],
                    [
                        "atoll_code" => "S",
                        "name" => "Feydhoo"
                    ],
                    [
                        "atoll_code" => "S",
                        "name" => "Hithadhoo"
                    ],
                    [
                        "atoll_code" => "S",
                        "name" => "Maradhoo"
                    ],
                    [
                        "atoll_code" => "S",
                        "name" => "Maradhoofeydhoo"
                    ],
                    [
                        "atoll_code" => "S",
                        "name" => "Hulhudhoo"
                    ]
                ]
            ]
        ];

        foreach ($atolls as $atoll) {

            $isCity = false;
            if (isset($atoll['code'])) {
                if ($atoll['code'] == 'S' || $atoll['code'] == 'Gn' || $atoll['code'] == 'MLE') {
                    $isCity = true;
                }
            }


            $newAtoll = Atoll::create([
                'code' => $atoll['code'],
                'name' => $atoll['name'],
                'is_city' => $isCity,
            ]);


            foreach ($atoll['islands'] as $island) {
                $newIsland = new Island();
                $newIsland->atoll_id = $newAtoll->id;
                $newIsland->island_category_id = 5;
                $newIsland->name = $island['name'];
                $newIsland->code = $island['atoll_code'];
                $newIsland->save();
            }
        }


        $islands = [
            [
                "atoll_code" => "F",
                "island_name" => "Feeali",
                "latitude" => 3.269859,
                "longitude" => 73.00217
            ],
            [
                "atoll_code" => "F",
                "island_name" => "Dharanboodhoo",
                "latitude" => 3.078585,
                "longitude" => 72.963386
            ],
            [
                "atoll_code" => "F",
                "island_name" => "Bilehdhoo",
                "latitude" => 3.118307,
                "longitude" => 72.98409
            ],
            [
                "atoll_code" => "F",
                "island_name" => "Magoodhoo",
                "latitude" => 3.118307,
                "longitude" => 72.98409
            ],
            [
                "atoll_code" => "F",
                "island_name" => "Nilandhoo",
                "latitude" => 3.063024,
                "longitude" => 72.925489
            ],
            [
                "atoll_code" => "V",
                "island_name" => "Rakeedhoo",
                "latitude" => 3.31494,
                "longitude" => 73.469823
            ],
            [
                "atoll_code" => "V",
                "island_name" => "Thinadhoo",
                "latitude" => 3.487673,
                "longitude" => 73.537856
            ],
            [
                "atoll_code" => "V",
                "island_name" => "Keyodhoo",
                "latitude" => 3.462117,
                "longitude" => 73.55011
            ],
            [
                "atoll_code" => "V",
                "island_name" => "Fulidhoo",
                "latitude" => 3.680477,
                "longitude" => 73.415786
            ],
            [
                "atoll_code" => "V",
                "island_name" => "Felidhoo",
                "latitude" => 3.471751,
                "longitude" => 73.547044
            ],
            [
                "atoll_code" => "Dh",
                "island_name" => "Bandidhoo",
                "latitude" => 2.936944,
                "longitude" => 72.991113
            ],
            [
                "atoll_code" => "Dh",
                "island_name" => "Kudahuvadhoo",
                "latitude" => 2.671707,
                "longitude" => 72.893716
            ],
            [
                "atoll_code" => "Dh",
                "island_name" => "Meedhoo",
                "latitude" => 2.998282,
                "longitude" => 73.006371
            ],
            [
                "atoll_code" => "Dh",
                "island_name" => "Hulhudheli",
                "latitude" => 2.858436,
                "longitude" => 72.846363
            ],
            [
                "atoll_code" => "Dh",
                "island_name" => "Rinbudhoo",
                "latitude" => 2.92564,
                "longitude" => 72.895893
            ],
            [
                "atoll_code" => "Dh",
                "island_name" => "Maaenboodhoo",
                "latitude" => 2.695566,
                "longitude" => 72.963335
            ],
            [
                "atoll_code" => "Dh",
                "island_name" => "Vaani",
                "latitude" => 2.72511,
                "longitude" => 73.00322
            ],
            [
                "atoll_code" => "Lh",
                "island_name" => "Olhuvelifushi",
                "latitude" => 5.278309,
                "longitude" => 73.606382
            ],
            [
                "atoll_code" => "Lh",
                "island_name" => "Naifaru",
                "latitude" => 5.445225,
                "longitude" => 73.365165
            ],
            [
                "atoll_code" => "Lh",
                "island_name" => "Hinnavaru",
                "latitude" => 5.491961,
                "longitude" => 73.412152
            ],
            [
                "atoll_code" => "Lh",
                "island_name" => "Kurendhoo",
                "latitude" => 5.333784,
                "longitude" => 73.463614
            ],
            [
                "atoll_code" => "AA",
                "island_name" => "Himandhoo",
                "latitude" => 3.921612,
                "longitude" => 72.744502
            ],
            [
                "atoll_code" => "AA",
                "island_name" => "Rasdhoo",
                "latitude" => 4.263105,
                "longitude" => 72.991977
            ],
            [
                "atoll_code" => "AA",
                "island_name" => "Thoddoo",
                "latitude" => 4.437322,
                "longitude" => 72.945631
            ],
            [
                "atoll_code" => "AA",
                "island_name" => "Maalhos",
                "latitude" => 3.98648,
                "longitude" => 72.719628
            ],
            [
                "atoll_code" => "AA",
                "island_name" => "Feridhoo",
                "latitude" => 4.051082,
                "longitude" => 72.725161
            ],
            [
                "atoll_code" => "AA",
                "island_name" => "Mathiveri",
                "latitude" => 4.191563,
                "longitude" => 72.745802
            ],
            [
                "atoll_code" => "AA",
                "island_name" => "Bodufolhudhoo",
                "latitude" => 4.185455,
                "longitude" => 72.773479
            ],
            [
                "atoll_code" => "AA",
                "island_name" => "Ukulhas",
                "latitude" => 4.214655,
                "longitude" => 72.863734
            ],
            [
                "atoll_code" => "ADh",
                "island_name" => "Maamigili",
                "latitude" => 3.47667,
                "longitude" => 72.836916
            ],
            [
                "atoll_code" => "ADh",
                "island_name" => "Kunburudhoo",
                "latitude" => 3.775587,
                "longitude" => 72.923693
            ],
            [
                "atoll_code" => "ADh",
                "island_name" => "Mandhoo",
                "latitude" => 3.697902,
                "longitude" => 72.710082
            ],
            [
                "atoll_code" => "ADh",
                "island_name" => "Mahibadhoo",
                "latitude" => 3.75722,
                "longitude" => 72.969066
            ],
            [
                "atoll_code" => "ADh",
                "island_name" => "Hangnaameedhoo",
                "latitude" => 3.849337,
                "longitude" => 72.95539
            ],
            [
                "atoll_code" => "ADh",
                "island_name" => "Fenfushi",
                "latitude" => 3.489213,
                "longitude" => 72.78291
            ],
            [
                "atoll_code" => "ADh",
                "island_name" => "Dhigurah",
                "latitude" => 3.52692,
                "longitude" => 72.9241
            ],
            [
                "atoll_code" => "ADh",
                "island_name" => "Omadhoo",
                "latitude" => 3.7916,
                "longitude" => 72.961131
            ],
            [
                "atoll_code" => "ADh",
                "island_name" => "Dhidhdhoo",
                "latitude" => 3.484906,
                "longitude" => 72.879502
            ],
            [
                "atoll_code" => "ADh",
                "island_name" => "Dhangethi",
                "latitude" => 3.606805,
                "longitude" => 72.955405
            ],
            [
                "atoll_code" => "Th",
                "island_name" => "Guraidhoo",
                "latitude" => 2.324968,
                "longitude" => 73.319421
            ],
            [
                "atoll_code" => "Th",
                "island_name" => "Vilufushi",
                "latitude" => 2.502818,
                "longitude" => 73.308229
            ],
            [
                "atoll_code" => "Th",
                "island_name" => "Kandoodhoo",
                "latitude" => 2.321204,
                "longitude" => 72.916608
            ],
            [
                "atoll_code" => "Th",
                "island_name" => "Kinbidhoo",
                "latitude" => 2.168105,
                "longitude" => 73.066
            ],
            [
                "atoll_code" => "Th",
                "island_name" => "Thimarafushi",
                "latitude" => 2.205529,
                "longitude" => 73.142935
            ],
            [
                "atoll_code" => "Th",
                "island_name" => "Buruni",
                "latitude" => 2.558714,
                "longitude" => 73.105995
            ],
            [
                "atoll_code" => "Th",
                "island_name" => "Madifushi",
                "latitude" => 2.356963,
                "longitude" => 73.354817
            ],
            [
                "atoll_code" => "Th",
                "island_name" => "Vandhoo",
                "latitude" => 2.291691,
                "longitude" => 72.941997
            ],
            [
                "atoll_code" => "Th",
                "island_name" => "Omadhoo",
                "latitude" => 2.167358,
                "longitude" => 73.023549
            ],
            [
                "atoll_code" => "Th",
                "island_name" => "Hirilandhoo",
                "latitude" => 2.269611,
                "longitude" => 72.93253
            ],
            [
                "atoll_code" => "Th",
                "island_name" => "Veymandoo",
                "latitude" => 2.186917,
                "longitude" => 73.094457
            ],
            [
                "atoll_code" => "Th",
                "island_name" => "Dhiyamigili",
                "latitude" => 2.340187,
                "longitude" => 73.336931
            ],
            [
                "atoll_code" => "Th",
                "island_name" => "Gaadhiffushi",
                "latitude" => 2.253139,
                "longitude" => 73.2124
            ],
            [
                "atoll_code" => "N",
                "island_name" => "Maalhendhoo",
                "latitude" => 5.902501,
                "longitude" => 73.456039
            ],
            [
                "atoll_code" => "N",
                "island_name" => "Holhudhoo",
                "latitude" => 5.754955,
                "longitude" => 73.262794
            ],
            [
                "atoll_code" => "N",
                "island_name" => "Miladhoo",
                "latitude" => 5.790502,
                "longitude" => 73.362318
            ],
            [
                "atoll_code" => "N",
                "island_name" => "Kudafari",
                "latitude" => 5.882637,
                "longitude" => 73.400451
            ],
            [
                "atoll_code" => "N",
                "island_name" => "Fodhdhoo",
                "latitude" => 5.743517,
                "longitude" => 73.215791
            ],
            [
                "atoll_code" => "N",
                "island_name" => "Velidhoo",
                "latitude" => 5.663899,
                "longitude" => 73.274239
            ],
            [
                "atoll_code" => "N",
                "island_name" => "Maafaru",
                "latitude" => 5.824048,
                "longitude" => 73.476542
            ],
            [
                "atoll_code" => "N",
                "island_name" => "Landhoo",
                "latitude" => 5.88174,
                "longitude" => 73.466435
            ],
            [
                "atoll_code" => "N",
                "island_name" => "Kendhikulhudhoo",
                "latitude" => 5.952303,
                "longitude" => 73.4152
            ],
            [
                "atoll_code" => "N",
                "island_name" => "Manadhoo",
                "latitude" => 5.766205,
                "longitude" => 73.410972
            ],
            [
                "atoll_code" => "N",
                "island_name" => "Lhohi",
                "latitude" => 5.815795,
                "longitude" => 73.377399
            ],
            [
                "atoll_code" => "N",
                "island_name" => "Magoodhoo",
                "latitude" => 5.776299,
                "longitude" => 73.362182
            ],
            [
                "atoll_code" => "N",
                "island_name" => "Henbadhoo",
                "latitude" => 5.967417,
                "longitude" => 73.392908
            ],
            [
                "atoll_code" => "Sh",
                "island_name" => "Feevah",
                "latitude" => 6.348893,
                "longitude" => 73.209658
            ],
            [
                "atoll_code" => "Sh",
                "island_name" => "Komandoo",
                "latitude" => 6.054858,
                "longitude" => 73.05452
            ],
            [
                "atoll_code" => "Sh",
                "island_name" => "Narudhoo",
                "latitude" => 6.264328,
                "longitude" => 73.218099
            ],
            [
                "atoll_code" => "Sh",
                "island_name" => "Lhaimagu",
                "latitude" => 6.168837,
                "longitude" => 73.251372
            ],
            [
                "atoll_code" => "Sh",
                "island_name" => "Foakaidhoo",
                "latitude" => 6.326729,
                "longitude" => 73.149293
            ],
            [
                "atoll_code" => "Sh",
                "island_name" => "Maroshi",
                "latitude" => 6.209848,
                "longitude" => 73.061094
            ],
            [
                "atoll_code" => "Sh",
                "island_name" => "Milandhoo",
                "latitude" => 6.287913,
                "longitude" => 73.245671
            ],
            [
                "atoll_code" => "Sh",
                "island_name" => "Funadhoo",
                "latitude" => 6.150369,
                "longitude" => 73.290725
            ],
            [
                "atoll_code" => "Sh",
                "island_name" => "Bilehfahi",
                "latitude" => 6.338018,
                "longitude" => 72.973835
            ],
            [
                "atoll_code" => "Sh",
                "island_name" => "Noomaraa",
                "latitude" => 6.434146,
                "longitude" => 73.069023
            ],
            [
                "atoll_code" => "Sh",
                "island_name" => "Maaungoodhoo",
                "latitude" => 6.073091,
                "longitude" => 73.283869
            ],
            [
                "atoll_code" => "Sh",
                "island_name" => "Kanditheemu",
                "latitude" => 6.440665,
                "longitude" => 72.915696
            ],
            [
                "atoll_code" => "Sh",
                "island_name" => "Feydhoo",
                "latitude" => 6.360313,
                "longitude" => 73.048712
            ],
            [
                "atoll_code" => "Sh",
                "island_name" => "Goidhoo",
                "latitude" => 6.430076,
                "longitude" => 72.929577
            ],
            [
                "atoll_code" => "B",
                "island_name" => "Dharavandhoo",
                "latitude" => 5.157685,
                "longitude" => 73.13017
            ],
            [
                "atoll_code" => "B",
                "island_name" => "Eydhafushi",
                "latitude" => 5.103483,
                "longitude" => 73.070395
            ],
            [
                "atoll_code" => "B",
                "island_name" => "Hithaadhoo",
                "latitude" => 5.007428,
                "longitude" => 72.922791
            ],
            [
                "atoll_code" => "B",
                "island_name" => "Thulhaadhoo",
                "latitude" => 5.022891,
                "longitude" => 72.83998
            ],
            [
                "atoll_code" => "B",
                "island_name" => "Kendhoo",
                "latitude" => 5.275378,
                "longitude" => 73.01015
            ],
            [
                "atoll_code" => "B",
                "island_name" => "Kudarikilu",
                "latitude" => 5.300333,
                "longitude" => 73.070785
            ],
            [
                "atoll_code" => "B",
                "island_name" => "Goidhoo",
                "latitude" => 4.870928,
                "longitude" => 73.000051
            ],
            [
                "atoll_code" => "B",
                "island_name" => "Fehendhoo",
                "latitude" => 4.882001,
                "longitude" => 72.967133
            ],
            [
                "atoll_code" => "B",
                "island_name" => "Kihaadhoo",
                "latitude" => 5.215138,
                "longitude" => 73.125177
            ],
            [
                "atoll_code" => "B",
                "island_name" => "Dhonfan",
                "latitude" => 5.187738,
                "longitude" => 73.123047
            ],
            [
                "atoll_code" => "B",
                "island_name" => "Maalhos",
                "latitude" => 5.134814,
                "longitude" => 73.108144
            ],
            [
                "atoll_code" => "B",
                "island_name" => "Fulhadhoo",
                "latitude" => 4.885731,
                "longitude" => 72.933336
            ],
            [
                "atoll_code" => "B",
                "island_name" => "Kamadhoo",
                "latitude" => 5.281926,
                "longitude" => 73.137016
            ],
            [
                "atoll_code" => "M",
                "island_name" => "Dhiggaru",
                "latitude" => 3.112102,
                "longitude" => 73.565258
            ],
            [
                "atoll_code" => "M",
                "island_name" => "Mulah",
                "latitude" => 2.946387,
                "longitude" => 73.584256
            ],
            [
                "atoll_code" => "M",
                "island_name" => "Veyvah",
                "latitude" => 2.95584,
                "longitude" => 73.599765
            ],
            [
                "atoll_code" => "M",
                "island_name" => "Maduvvari",
                "latitude" => 3.104647,
                "longitude" => 73.572897
            ],
            [
                "atoll_code" => "M",
                "island_name" => "Kolhufushi",
                "latitude" => 2.78081,
                "longitude" => 73.42444
            ],
            [
                "atoll_code" => "M",
                "island_name" => "Naalaafushi",
                "latitude" => 2.895659,
                "longitude" => 73.577401
            ],
            [
                "atoll_code" => "M",
                "island_name" => "Muli",
                "latitude" => 2.918991,
                "longitude" => 73.581365
            ],
            [
                "atoll_code" => "M",
                "island_name" => "Raiymandhoo",
                "latitude" => 3.08901,
                "longitude" => 73.639095
            ],
            [
                "atoll_code" => "K",
                "island_name" => "Male'",
                "latitude" => 4.17503,
                "longitude" => 73.509878
            ],
            [
                "atoll_code" => "K",
                "island_name" => "Gulhi",
                "latitude" => 3.990986,
                "longitude" => 73.509114
            ],
            [
                "atoll_code" => "K",
                "island_name" => "Thulusdhoo",
                "latitude" => 4.374358,
                "longitude" => 73.650439
            ],
            [
                "atoll_code" => "K",
                "island_name" => "Guraidhoo",
                "latitude" => 3.900871,
                "longitude" => 73.468191
            ],
            [
                "atoll_code" => "K",
                "island_name" => "Gaafaru",
                "latitude" => 4.736115,
                "longitude" => 73.499846
            ],
            [
                "atoll_code" => "K",
                "island_name" => "Kaashidhoo",
                "latitude" => 4.956995,
                "longitude" => 73.459609
            ],
            [
                "atoll_code" => "K",
                "island_name" => "Maafushi",
                "latitude" => 3.941452,
                "longitude" => 73.489391
            ],
            [
                "atoll_code" => "K",
                "island_name" => "Hinmafushi",
                "latitude" => 4.308904,
                "longitude" => 73.571863
            ],
            [
                "atoll_code" => "K",
                "island_name" => "Huraa",
                "latitude" => 4.334328,
                "longitude" => 73.600693
            ],
            [
                "atoll_code" => "K",
                "island_name" => "Dhiffushi",
                "latitude" => 4.442153,
                "longitude" => 73.713752
            ],
            [
                "atoll_code" => "K",
                "island_name" => "Unverified",
                "latitude" => 0,
                "longitude" => 0
            ],
            [
                "atoll_code" => "Gn",
                "island_name" => "Fuvahmulah",
                "latitude" => -0.294287,
                "longitude" => 73.425799
            ],
            [
                "atoll_code" => "L",
                "island_name" => "Isdhoo",
                "latitude" => 2.119007,
                "longitude" => 73.568444
            ],
            [
                "atoll_code" => "L",
                "island_name" => "Fonadhoo",
                "latitude" => 1.836324,
                "longitude" => 73.504239
            ],
            [
                "atoll_code" => "L",
                "island_name" => "Maamendhoo",
                "latitude" => 1.818038,
                "longitude" => 73.389866
            ],
            [
                "atoll_code" => "L",
                "island_name" => "Maavah",
                "latitude" => 1.885328,
                "longitude" => 73.242347
            ],
            [
                "atoll_code" => "L",
                "island_name" => "Gan",
                "latitude" => 1.911136,
                "longitude" => 73.539758
            ],
            [
                "atoll_code" => "L",
                "island_name" => "Kalaidhoo",
                "latitude" => 1.988794,
                "longitude" => 73.537528
            ],
            [
                "atoll_code" => "L",
                "island_name" => "Mundoo",
                "latitude" => 2.011052,
                "longitude" => 73.533739
            ],
            [
                "atoll_code" => "L",
                "island_name" => "Kunahandhoo",
                "latitude" => 1.783307,
                "longitude" => 73.368361
            ],
            [
                "atoll_code" => "L",
                "island_name" => "Maabaidhoo",
                "latitude" => 2.030136,
                "longitude" => 73.532199
            ],
            [
                "atoll_code" => "L",
                "island_name" => "Hithadhoo",
                "latitude" => 1.795657,
                "longitude" => 73.388047
            ],
            [
                "atoll_code" => "L",
                "island_name" => "Dhanbidhoo",
                "latitude" => 2.093724,
                "longitude" => 73.54434
            ],
            [
                "atoll_code" => "L",
                "island_name" => "Gaadhoo",
                "latitude" => 1.821457,
                "longitude" => 73.45209
            ],
            [
                "atoll_code" => "Ha",
                "island_name" => "Hoarafushi",
                "latitude" => 6.981879,
                "longitude" => 72.896653
            ],
            [
                "atoll_code" => "Ha",
                "island_name" => "Baarah",
                "latitude" => 6.816916,
                "longitude" => 73.213152
            ],
            [
                "atoll_code" => "Ha",
                "island_name" => "Kelaa",
                "latitude" => 6.951845,
                "longitude" => 73.21546
            ],
            [
                "atoll_code" => "Ha",
                "island_name" => "Dhidhdhoo",
                "latitude" => 6.88712,
                "longitude" => 73.114046
            ],
            [
                "atoll_code" => "Ha",
                "island_name" => "Muraidhoo",
                "latitude" => 6.837774,
                "longitude" => 73.167143
            ],
            [
                "atoll_code" => "Ha",
                "island_name" => "Molhadhoo",
                "latitude" => 7.016098,
                "longitude" => 72.996464
            ],
            [
                "atoll_code" => "Ha",
                "island_name" => "Utheemu",
                "latitude" => 6.835027,
                "longitude" => 73.11227
            ],
            [
                "atoll_code" => "Ha",
                "island_name" => "Ihavandhoo",
                "latitude" => 6.953145,
                "longitude" => 72.926103
            ],
            [
                "atoll_code" => "Ha",
                "island_name" => "Filladhoo",
                "latitude" => 6.897072,
                "longitude" => 73.235269
            ],
            [
                "atoll_code" => "Ha",
                "island_name" => "Vashafaru",
                "latitude" => 6.898663,
                "longitude" => 73.164148
            ],
            [
                "atoll_code" => "Ha",
                "island_name" => "Maarandhoo",
                "latitude" => 6.8524,
                "longitude" => 72.984406
            ],
            [
                "atoll_code" => "Ha",
                "island_name" => "Thuraakunu",
                "latitude" => 7.103806,
                "longitude" => 72.898976
            ],
            [
                "atoll_code" => "Ha",
                "island_name" => "Uligan",
                "latitude" => 7.083835,
                "longitude" => 72.925094
            ],
            [
                "atoll_code" => "Ha",
                "island_name" => "Thakandhoo",
                "latitude" => 6.844469,
                "longitude" => 72.995584
            ],
            [
                "atoll_code" => "R",
                "island_name" => "Hulhudhuffaaru",
                "latitude" => 5.766033,
                "longitude" => 73.012617
            ],
            [
                "atoll_code" => "R",
                "island_name" => "Maduvvari",
                "latitude" => 5.486265,
                "longitude" => 72.896006
            ],
            [
                "atoll_code" => "R",
                "island_name" => "Alifushi",
                "latitude" => 5.967254,
                "longitude" => 72.953034
            ],
            [
                "atoll_code" => "R",
                "island_name" => "Kandholhudhoo",
                "latitude" => 5.618734,
                "longitude" => 72.855096
            ],
            [
                "atoll_code" => "R",
                "island_name" => "Rasgetheemu",
                "latitude" => 5.807783,
                "longitude" => 73.003198
            ],
            [
                "atoll_code" => "R",
                "island_name" => "Fainu",
                "latitude" => 5.463281,
                "longitude" => 73.034446
            ],
            [
                "atoll_code" => "R",
                "island_name" => "Meedhoo",
                "latitude" => 5.458021,
                "longitude" => 72.955283
            ],
            [
                "atoll_code" => "R",
                "island_name" => "Vaadhoo",
                "latitude" => 5.85538,
                "longitude" => 72.991073
            ],
            [
                "atoll_code" => "R",
                "island_name" => "Inguraidhoo",
                "latitude" => 5.476875,
                "longitude" => 73.036303
            ],
            [
                "atoll_code" => "R",
                "island_name" => "Innamaadhoo",
                "latitude" => 5.549437,
                "longitude" => 73.0438
            ],
            [
                "atoll_code" => "R",
                "island_name" => "Rasmaadhoo",
                "latitude" => 5.562959,
                "longitude" => 73.043478
            ],
            [
                "atoll_code" => "R",
                "island_name" => "Maakurathu",
                "latitude" => 5.606037,
                "longitude" => 73.043154
            ],
            [
                "atoll_code" => "R",
                "island_name" => "Kinolhas",
                "latitude" => 5.448406,
                "longitude" => 73.030504
            ],
            [
                "atoll_code" => "R",
                "island_name" => "Ungoofaaru",
                "latitude" => 5.668157,
                "longitude" => 73.030155
            ],
            [
                "atoll_code" => "R",
                "island_name" => "Angolhitheemu",
                "latitude" => 5.792765,
                "longitude" => 73.00662
            ],
            [
                "atoll_code" => "R",
                "island_name" => "Dhuvaafaru",
                "latitude" => 5.618333,
                "longitude" => 72.855556
            ],
            [
                "atoll_code" => "GA",
                "island_name" => "Dhaandhoo",
                "latitude" => 0.621114,
                "longitude" => 73.462094
            ],
            [
                "atoll_code" => "GA",
                "island_name" => "Dhevvadhoo",
                "latitude" => 0.556858,
                "longitude" => 73.242237
            ],
            [
                "atoll_code" => "GA",
                "island_name" => "Maamendhoo",
                "latitude" => 0.713464,
                "longitude" => 73.438891
            ],
            [
                "atoll_code" => "GA",
                "island_name" => "Kolamaafushi",
                "latitude" => 0.837154,
                "longitude" => 73.185015
            ],
            [
                "atoll_code" => "GA",
                "island_name" => "Kondey",
                "latitude" => 0.499554,
                "longitude" => 73.549653
            ],
            [
                "atoll_code" => "GA",
                "island_name" => "Vilingili",
                "latitude" => 0.755293,
                "longitude" => 73.434885
            ],
            [
                "atoll_code" => "GA",
                "island_name" => "Nilandhoo",
                "latitude" => 0.636416,
                "longitude" => 73.446208
            ],
            [
                "atoll_code" => "GA",
                "island_name" => "Kanduhulhudhoo",
                "latitude" => 0.351344,
                "longitude" => 73.539993
            ],
            [
                "atoll_code" => "GA",
                "island_name" => "Gemanafushi",
                "latitude" => 0.442017,
                "longitude" => 73.568521
            ],
            [
                "atoll_code" => "GA",
                "island_name" => "Dhiyadhoo",
                "latitude" => 0.476468,
                "longitude" => 73.558971
            ],
            [
                "atoll_code" => "HDh",
                "island_name" => "Kulhudhuffushi",
                "latitude" => 6.623269,
                "longitude" => 73.069457
            ],
            [
                "atoll_code" => "HDh",
                "island_name" => "Hanimaadhoo",
                "latitude" => 6.766965,
                "longitude" => 73.177794
            ],
            [
                "atoll_code" => "HDh",
                "island_name" => "Hirimaradhoo",
                "latitude" => 6.724919,
                "longitude" => 73.024126
            ],
            [
                "atoll_code" => "HDh",
                "island_name" => "Vaikaradhoo",
                "latitude" => 6.549727,
                "longitude" => 72.952869
            ],
            [
                "atoll_code" => "HDh",
                "island_name" => "Nolhivaranfaru",
                "latitude" => 6.693313,
                "longitude" => 73.120619
            ],
            [
                "atoll_code" => "HDh",
                "island_name" => "Kumundhoo",
                "latitude" => 6.571084,
                "longitude" => 73.051639
            ],
            [
                "atoll_code" => "HDh",
                "island_name" => "Finey",
                "latitude" => 6.746074,
                "longitude" => 73.053514
            ],
            [
                "atoll_code" => "HDh",
                "island_name" => "Nellaidhoo",
                "latitude" => 6.71494,
                "longitude" => 72.946828
            ],
            [
                "atoll_code" => "HDh",
                "island_name" => "Kurinbi",
                "latitude" => 6.665513,
                "longitude" => 72.996598
            ],
            [
                "atoll_code" => "HDh",
                "island_name" => "Naivaadhoo",
                "latitude" => 6.747121,
                "longitude" => 72.934249
            ],
            [
                "atoll_code" => "HDh",
                "island_name" => "Neykurendhoo",
                "latitude" => 6.542908,
                "longitude" => 72.979807
            ],
            [
                "atoll_code" => "HDh",
                "island_name" => "Makunudhoo",
                "latitude" => 6.409141,
                "longitude" => 72.705201
            ],
            [
                "atoll_code" => "HDh",
                "island_name" => "Nolhivaran",
                "latitude" => 6.662525,
                "longitude" => 73.082409
            ],
            [
                "atoll_code" => "HDh",
                "island_name" => "Maavaidhoo",
                "latitude" => 6.515374,
                "longitude" => 73.053782
            ],
            [
                "atoll_code" => "HDh",
                "island_name" => "Kunburudhoo",
                "latitude" => 6.658286,
                "longitude" => 73.027382
            ],
            [
                "atoll_code" => "GDh",
                "island_name" => "Thinadhoo",
                "latitude" => 0.530185,
                "longitude" => 72.997227
            ],
            [
                "atoll_code" => "GDh",
                "island_name" => "Fiyoaree",
                "latitude" => 0.22127,
                "longitude" => 73.136639
            ],
            [
                "atoll_code" => "GDh",
                "island_name" => "Hoandedhdhoo",
                "latitude" => 0.444125,
                "longitude" => 73.003249
            ],
            [
                "atoll_code" => "GDh",
                "island_name" => "Faresmaathodaa",
                "latitude" => 0.19902,
                "longitude" => 73.189809
            ],
            [
                "atoll_code" => "GDh",
                "island_name" => "Madaveli",
                "latitude" => 0.45901,
                "longitude" => 72.999236
            ],
            [
                "atoll_code" => "GDh",
                "island_name" => "Nadellaa",
                "latitude" => 0.29359,
                "longitude" => 73.040729
            ],
            [
                "atoll_code" => "GDh",
                "island_name" => "Rathafandhoo",
                "latitude" => 0.253248,
                "longitude" => 73.104873
            ],
            [
                "atoll_code" => "GDh",
                "island_name" => "Gadhdhoo",
                "latitude" => 0.289472,
                "longitude" => 73.456435
            ],
            [
                "atoll_code" => "GDh",
                "island_name" => "Vaadhoo",
                "latitude" => 0.227282,
                "longitude" => 73.273878
            ],
            [
                "atoll_code" => "S",
                "island_name" => "Hithadhoo",
                "latitude" => -0.615665,
                "longitude" => 73.09365
            ],
            [
                "atoll_code" => "S",
                "island_name" => "Hulhudhoo",
                "latitude" => -0.588981,
                "longitude" => 73.230504
            ],
            [
                "atoll_code" => "S",
                "island_name" => "Meedhoo",
                "latitude" => -0.582866,
                "longitude" => 73.233483
            ],
            [
                "atoll_code" => "S",
                "island_name" => "Maradhoo",
                "latitude" => -0.665054,
                "longitude" => 73.119106
            ],
            [
                "atoll_code" => "S",
                "island_name" => "Feydhoo",
                "latitude" => -0.681034,
                "longitude" => 73.136387
            ],
            [
                "atoll_code" => "S",
                "island_name" => "Maradhoofeydhoo",
                "latitude" => -0.673394,
                "longitude" => 73.125882
            ]
        ];

        foreach ($islands as $island) {
            $islandName = trim($island['island_name']);
            $searchedIsland = Island::where('code', $island['atoll_code'])->where('name', $islandName)->get()->first();
            if (isset($searchedIsland)) {
                $searchedIsland->latitude = $island['latitude'];
                $searchedIsland->longitude = $island['longitude'];
                $searchedIsland->save();
            }

        }


    }
}
