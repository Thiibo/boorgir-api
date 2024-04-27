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

    'accepted' => 'Het :attribute veld moet worden geaccepteerd.',
    'accepted_if' => 'Het :attribute veld moet worden geaccepteerd wanneer :other is :value.',
    'active_url' => 'Het :attribute veld moet een geldige URL zijn.',
    'after' => 'Het :attribute veld moet een datum na :date zijn.',
    'after_or_equal' => 'Het :attribute veld moet een datum na of gelijk aan :date zijn.',
    'alpha' => 'Het :attribute veld mag alleen letters bevatten.',
    'alpha_dash' => 'Het :attribute veld mag alleen letters, nummers, koppeltekens en underscores bevatten.',
    'alpha_num' => 'Het :attribute veld mag alleen letters en nummers bevatten.',
    'array' => 'Het :attribute veld moet een array zijn.',
    'ascii' => 'Het :attribute veld mag alleen single-byte alphanumerieke tekens en symbolen bevatten.',
    'before' => 'Het :attribute veld moet een datum voor :date zijn.',
    'before_or_equal' => 'Het :attribute veld moet een datum voor of gelijk aan :date zijn.',
    'between' => [
        'array' => 'Het :attribute veld moet tussen :min en :max items hebben.',
        'file' => 'Het :attribute veld moet tussen :min en :max kilobytes zijn.',
        'numeric' => 'Het :attribute veld moet tussen :min en :max zijn.',
        'string' => 'Het :attribute veld moet tussen :min en :max tekens lang zijn.',
    ],
    'boolean' => 'Het :attribute veld moet waar of onwaar zijn.',
    'can' => 'Het :attribute veld bevat een ongeoorloofde waarde.',
    'confirmed' => 'De :attribute field bevestiging klopt niet.',
    'current_password' => 'Het wachtwoord is incorrect.',
    'date' => 'Het :attribute veld moet een geldige datum zijn.',
    'date_equals' => 'Het :attribute veld moet een datum zijn gelijk aan :date.',
    'date_format' => 'Het :attribute veld moet het formaat :format hebben.',
    'decimal' => 'Het :attribute veld moet :decimal decimalen tellen.',
    'declined' => 'Het :attribute veld moet worden afgewezen.',
    'declined_if' => 'Het :attribute veld moet worden afgewezen wanneer :other :value is.',
    'different' => 'De :attribute en :other moeten verschillend zijn.',
    'digits' => 'Het :attribute veld moet :digits cijfers zijn.',
    'digits_between' => 'Het :attribute veld moet tussen :min en :max cijfers zijn.',
    'dimensions' => 'De afmetingen van de :attribute field zijn ongeldig.',
    'distinct' => 'De waarde van de :attribute field is niet uniek.',
    'doesnt_end_with' => 'Het :attribute veld mag niet eindigen met een van de volgende waarden: :values.',
    'doesnt_start_with' => 'Het :attribute veld mag niet beginnen met een van de volgende waarden: :values.',
    'email' => 'Het :attribute veld moet een geldig e-mailadres zijn.',
    'ends_with' => 'Het :attribute veld moet eindigen met een van de volgende waarden: :values.',
    'enum' => 'De geselecteerde :attribute is ongeldig.',
    'exists' => 'De geselecteerde :attribute is ongeldig.',
    'extensions' => 'Het :attribute veld moet een van de volgende extensies hebben: :values.',
    'file' => 'Het :attribute veld moet een bestand zijn.',
    'filled' => 'Het :attribute veld moet een waarde hebben.',
    'gt' => [
        'array' => 'Het :attribute veld moet meer dan :value items hebben.',
        'file' => 'Het :attribute veld moet groter zijn dan :value kilobytes.',
        'numeric' => 'Het :attribute veld moet groter zijn dan :value.',
        'string' => 'Het :attribute veld moet langer zijn dan :value tekens.',
    ],
    'gte' => [
        'array' => 'Het :attribute veld moet ten minste :value items hebben.',
        'file' => 'Het :attribute veld moet groter of gelijk zijn aan :value kilobytes.',
        'numeric' => 'Het :attribute veld moet groter of gelijk zijn aan :value.',
        'string' => 'Het :attribute veld moet langer of gelijk zijn aan :value tekens.',
    ],
    'hex_color' => 'De :attribute waarde moet een geldig hexadecimale kleurcode zijn.',
    'image' => 'De :attribute waarde moet een afbeelding zijn.',
    'in' => 'De geselecteerde :attribute is ongeldig.',
    'in_array' => 'De :attribute waarde moet bestaan in :other.',
    'hex_color' => 'Het :attribute veld moet een geldige hexadecimale kleurcode zijn.',
    'image' => 'Het :attribute veld moet een afbeelding zijn.',
    'in' => 'De geselecteerde :attribute is ongeldig.',
    'ipv6' => 'Het :attribute veld moet een geldig IPv6-adres zijn.',
    'json' => 'Het :attribute veld moet een geldige JSON-string zijn.',
    'lowercase' => 'Het :attribute veld moet alleen kleine letters bevatten.',
    'lt' => [
        'array' => 'Het :attribute veld mag niet meer dan :value items hebben.',
        'file' => 'Het :attribute veld mag niet groter zijn dan :value kilobytes.',
        'numeric' => 'Het :attribute veld mag niet groter zijn dan :value.',
        'string' => 'Het :attribute veld mag niet langer zijn dan :value tekens.',
    ],
    'lte' => [
        'array' => 'De :attribute waarde moet minder dan of gelijk aan :value items zijn.',
        'file' => 'Het :attribute veld mag niet groter zijn dan :value kilobytes.',
        'numeric' => 'Het :attribute veld mag niet groter zijn dan :value.',
        'string' => 'Het :attribute veld mag niet langer zijn dan :value tekens.',
    ],
    'mac_address' => 'Het :attribute veld moet een geldig MAC-adres zijn.',
    'max' => [
        'array' => 'Het :attribute veld mag niet meer dan :max items hebben.',
        'file' => 'Het :attribute veld mag niet groter zijn dan :max kilobytes.',
        'numeric' => 'Het :attribute veld mag niet groter zijn dan :max.',
        'string' => 'Het :attribute veld mag niet langer zijn dan :max tekens.',
    ],
    'max_digits' => 'Het :attribute veld moet geen meer dan :max cijfers hebben.',
    'mimes' => 'Het :attribute veld moet een bestand van het type :values zijn.',
    'mimetypes' => 'Het :attribute veld moet een bestand van het type :values zijn.',
    'min' => [
        'array' => 'Het :attribute veld moet ten minste :min items hebben.',
        'file' => 'Het :attribute veld moet ten minste :min kilobytes zijn.',
        'numeric' => 'Het :attribute veld moet ten minste :min zijn.',
        'string' => 'Het :attribute veld moet ten minste :min tekens zijn.',
    ],
    'min_digits' => 'Het :attribute veld moet minstens :min cijfers hebben.',
    'missing' => 'Het :attribute veld ontbreekt.',
    'missing_if' => 'Het :attribute veld ontbreekt als :other is :value.',
    'missing_unless' => 'Het :attribute veld ontbreekt tenzij :other is :value.',
    'missing_with' => 'Het :attribute veld ontbreekt wanneer :values aanwezig is.',
    'missing_with_all' => 'Het :attribute veld ontbreekt wanneer :values aanwezig zijn.',
    'multiple_of' => 'Het :attribute veld moet een veelvoud van :value zijn.',
    'not_in' => 'De geselecteerde :attribute is ongeldig.',
    'not_regex' => 'Het formaat van het :attribute veld is niet geldig.',
    'numeric' => 'Het :attribute veld moet een getal zijn.',
    'password' => [
        'letters' => 'Het :attribute veld moet ten minste één letter bevatten.',
        'mixed' => 'Het :attribute veld moet ten minste één hoofdletter en één kleine letter bevatten.',
        'numbers' => 'Het :attribute veld moet ten minste één getal bevatten.',
        'symbols' => 'Het :attribute veld moet ten minste één symbool bevatten.',
        'uncompromised' => 'Het opgegeven :attribute is eerder gelekt. Kies een ander :attribute.',
    ],
    'present' => 'Het :attribute veld moet aanwezig zijn.',
    'present_if' => 'Het :attribute veld moet aanwezig zijn wanneer :other is :value.',
    'present_unless' => 'Het :attribute veld moet aanwezig zijn tenzij :other is :value.',
    'present_with' => 'Het :attribute veld moet aanwezig zijn wanneer :values aanwezig is.',
    'present_with_all' => 'Het :attribute veld moet aanwezig zijn wanneer :values allemaal aanwezig zijn.',
    'prohibited' => 'Het :attribute veld is verboden.',
    'prohibited_if' => 'Het :attribute veld is verboden wanneer :other is :value.',
    'prohibited_unless' => 'Het :attribute veld is verboden tenzij :other is in :values.',
    'prohibits' => 'Het :attribute veld verbiedt de aanwezigheid van :other.',
    'regex' => 'Het formaat van het :attribute veld is ongeldig.',
    'required' => 'Het :attribute veld is verplicht.',
    'required_array_keys' => 'Het :attribute veld moet entries voor hebben: :values.',
    'required_if' => 'Het :attribute veld is verplicht wanneer :other is :value.',
    'required_if_accepted' => 'Het :attribute veld is verplicht wanneer :other wordt geaccepteerd.',
    'required_unless' => 'Het :attribute veld is verplicht tenzij :other in :values aanwezig is.',
    'required_with' => 'Het :attribute veld is verplicht wanneer :values aanwezig is.',
    'required_with_all' => 'Het :attribute veld is verplicht wanneer :values allemaal aanwezig zijn.',
    'required_without' => 'Het :attribute veld is verplicht wanneer :values niet aanwezig is.',
    'required_without_all' => 'Het :attribute veld is verplicht wanneer geen van de volgende waarden aanwezig zijn: :values.',
    'same' => 'Het :attribute veld moet overeenkomen met :other.',
    'size' => [
        'array' => 'De array moet :size items bevatten.',
        'file' => 'Het bestand moet :size kilobytes zijn.',
        'numeric' => 'Het getal moet :size zijn.',
        'string' => 'Het :attribute veld moet :size tekens lang zijn.',
    ],
    'starts_with' => 'Het :attribute veld moet beginnen met een van de volgende: :values.',
    'string' => 'Het :attribute veld moet een string zijn.',
    'timezone' => 'Het :attribute veld moet een geldige tijdzone zijn.',
    'unique' => 'Het :attribute is al bezet.',
    'uploaded' => 'Het :attribute uploaden is mislukt.',
    'uppercase' => 'Het :attribute veld moet hoofdlettergevoelig zijn.',
    'url' => 'Het :attribute veld moet een geldige URL zijn.',
    'ulid' => 'Het :attribute veld moet een geldig ULID zijn.',
    'uuid' => 'Het :attribute veld moet een geldig UUID zijn.',

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

    'attributes' => [],

];
