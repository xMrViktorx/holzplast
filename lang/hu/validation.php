<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => 'A(z) :attribute el kell legyen fogadva.',
    'active_url' => 'A(z) :attribute nem érvényes URL.',
    'after' => 'A(z) :attribute dátumnak kell lennie :date után.',
    'after_or_equal' => 'A(z) :attribute dátumnak kell lennie :date után vagy ugyanannak a dátumnak.',
    'alpha' => 'A(z) :attribute csak betűket tartalmazhat.',
    'alpha_dash' => 'A(z) :attribute csak betűket, számokat, kötőjeleket és alsóvonásokat tartalmazhat.',
    'alpha_num' => 'A(z) :attribute csak betűket és számokat tartalmazhat.',
    'array' => 'A(z) :attribute tömbnek kell lennie.',
    'before' => 'A(z) :attribute dátumnak kell lennie :date előtt.',
    'before_or_equal' => 'A(z) :attribute dátumnak kell lennie :date előtt vagy ugyanannak a dátumnak.',
    'between' => [
        'numeric' => 'A(z) :attribute értéke :min és :max között kell legyen.',
        'file' => 'A(z) :attribute mérete :min és :max kilobájt között kell legyen.',
        'string' => 'A(z) :attribute hossza :min és :max karakter között kell legyen.',
        'array' => 'A(z) :attribute tömbje :min és :max elem között kell legyen.',
    ],
    'boolean' => 'A(z) :attribute mezőnek igaznak vagy hamisnak kell lennie.',
    'confirmed' => 'A(z) :attribute megerősítése nem egyezik.',
    'date' => 'A(z) :attribute nem érvényes dátum.',
    'date_equals' => 'A(z) :attribute dátumnak kell lennie :date dátumnak.',
    'date_format' => 'A(z) :attribute formátuma nem egyezik a következővel: :format.',
    'different' => 'A(z) :attribute és :other különböző kell legyen.',
    'digits' => 'A(z) :attribute pontosan :digits számjegyből kell álljon.',
    'digits_between' => 'A(z) :attribute értéke :min és :max számjegy között kell legyen.',
    'dimensions' => 'A(z) :attribute érvénytelen képméretekkel rendelkezik.',
    'distinct' => 'A(z) :attribute mező értéke ismétlődik.',
    'email' => 'A(z) :attribute érvényes e-mail címnek kell lennie.',
    'ends_with' => 'A(z) :attribute valamelyik a következők közül kell végződjön: :values.',
    'exists' => 'A kiválasztott :attribute érvénytelen.',
    'file' => 'A(z) :attribute fájlnak kell lennie.',
    'filled' => 'A(z) :attribute mező kitöltése kötelező.',
    'gt' => [
        'numeric' => 'A(z) :attribute értéke nagyobb kell legyen mint :value.',
        'file' => 'A(z) :attribute mérete nagyobb kell legyen mint :value kilobájt.',
        'string' => 'A(z) :attribute hossza nagyobb kell legyen mint :value karakter.',
        'array' => 'A(z) :attribute tömbjének több mint :value eleme kell legyen.',
    ],
    'gte' => [
        'numeric' => 'A(z) :attribute értéke legalább :value kell legyen.',
        'file' => 'A(z) :attribute mérete legalább :value kilobájt kell legyen.',
        'string' => 'A(z) :attribute hossza legalább :value karakter kell legyen.',
        'array' => 'A(z) :attribute tömbjének legalább :value eleme kell legyen.',
    ],
    'image' => 'A(z) :attribute képnek kell lennie.',
    'in' => 'A kiválasztott :attribute érvénytelen.',
    'in_array' => 'A(z) :attribute mező nem létezik a(z) :other-ben.',
    'integer' => 'A(z) :attribute értéke egész számnak kell lennie.',
    'ip' => 'A(z) :attribute érvényes IP címnek kell lennie.',
    'ipv4' => 'A(z) :attribute érvényes IPv4 címnek kell lennie.',
    'ipv6' => 'A(z) :attribute érvényes IPv6 címnek kell lennie.',
    'json' => 'A(z) :attribute érvényes JSON szövegnek kell lennie.',
    'lt' => [
        'numeric' => 'A(z) :attribute értéke kisebb kell legyen mint :value.',
        'file' => 'A(z) :attribute mérete kisebb kell legyen mint :value kilobájt.',
        'string' => 'A(z) :attribute hossza kisebb kell legyen mint :value karakter.',
        'array' => 'A(z) :attribute tömbjének kevesebb mint :value eleme kell legyen.',
    ],
    'lte' => [
        'numeric' => 'A(z) :attribute értéke legfeljebb :value lehet.',
        'file' => 'A(z) :attribute mérete legfeljebb :value kilobájt lehet.',
        'string' => 'A(z) :attribute hossza legfeljebb :value karakter lehet.',
        'array' => 'A(z) :attribute tömbjének legfeljebb :value eleme lehet.',
    ],
    'max' => [
        'numeric' => 'A(z) :attribute értéke nem lehet nagyobb mint :max.',
        'file' => 'A(z) :attribute mérete nem lehet nagyobb mint :max kilobájt.',
        'string' => 'A(z) :attribute hossza nem lehet nagyobb mint :max karakter.',
        'array' => 'A(z) :attribute tömbjének nem lehet több mint :max eleme.',
    ],
    'mimes' => 'A(z) :attribute fájltípusnak kell lennie: :values.',
    'mimetypes' => 'A(z) :attribute fájltípusnak kell lennie: :values.',
    'min' => [
        'numeric' => 'A(z) :attribute értéke legalább :min kell legyen.',
        'file' => 'A(z) :attribute mérete legalább :min kilobájt kell legyen.',
        'string' => 'A(z) :attribute hossza legalább :min karakter kell legyen.',
        'array' => 'A(z) :attribute tömbjének legalább :min eleme kell legyen.',
    ],
    'not_in' => 'A kiválasztott :attribute érvénytelen.',
    'not_regex' => 'A(z) :attribute formátuma érvénytelen.',
    'numeric' => 'A(z) :attribute értéke számnak kell lennie.',
    'password' => 'A(z) :attribute jelszó érvénytelen.',
    'present' => 'A(z) :attribute mezőnek jelen kell lennie.',
    'regex' => 'A(z) :attribute formátuma érvénytelen.',
    'required' => 'A(z) :attribute mező kitöltése kötelező.',
    'required_if' => 'A(z) :attribute mező kitöltése kötelező, ha a(z) :other értéke :value.',
    'required_unless' => 'A(z) :attribute mező kitöltése kötelező, hacsak a(z) :other értéke :values.',
    'required_with' => 'A(z) :attribute mező kitöltése kötelező, ha a(z) :values érték jelen van.',
    'required_with_all' => 'A(z) :attribute mező kitöltése kötelező, ha minden következő érték jelen van: :values.',
    'required_without' => 'A(z) :attribute mező kitöltése kötelező, ha a(z) :values érték nincs jelen.',
    'required_without_all' => 'A(z) :attribute mező kitöltése kötelező, ha egyik következő érték sem jelen van: :values.',
    'same' => 'A(z) :attribute és :other kell egyeznie.',
    'size' => [
        'numeric' => 'A(z) :attribute értéke pontosan :size kell legyen.',
        'file' => 'A(z) :attribute mérete pontosan :size kilobájt kell legyen.',
        'string' => 'A(z) :attribute hossza pontosan :size karakter kell legyen.',
        'array' => 'A(z) :attribute tömbjének pontosan :size eleme kell legyen.',
    ],
    'starts_with' => 'A(z) :attribute értékének valamelyikkel kell kezdődnie: :values.',
    'string' => 'A(z) :attribute értéke karakterláncnak kell lennie.',
    'timezone' => 'A(z) :attribute érvényes időzónának kell lennie.',
    'unique' => 'A(z) :attribute már foglalt.',
    'uploaded' => 'A(z) :attribute feltöltése nem sikerült.',
    'url' => 'A(z) :attribute érvényes URL-nek kell lennie.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [
        'password' => 'jelszó',
        'name'  => 'név',
        'slug' => 'elérési útvonal',
        'category_id' => 'kategória',
        'description' => 'leírás',
        'image' => 'kép',
        'price' => 'ár',
        'amount' => 'mennyiség',
        'billing.first_name' => 'vezetéknév',
        'billing.last_name' => 'keresztnév',
        'billing.email' => 'email',
        'billing.country' => 'ország',
        'billing.city' => 'város',
        'billing.postcode' => 'irányítószám',
        'billing.address' => 'utca',
        'billing.house_number' => 'házszám',
        'billing.phone' => 'telefonszám',
        'billing.company' => 'cég neve',
        'billing.tax_number' => 'adószám',
        'shipping.first_name' => 'vezetéknév',
        'shipping.last_name' => 'keresztnév',
        'shipping.email' => 'email',
        'shipping.country' => 'ország',
        'shipping.city' => 'város',
        'shipping.postcode' => 'irányítószám',
        'shipping.address' => 'utca',
        'shipping.house_number' => 'házszám',
        'shipping.phone' => 'telefonszám',
        'shipping.company' => 'cég neve',
    ],

];
