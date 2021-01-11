# Data Structure of interviews

## Normalisierung

### Single- und Multiselect
Zurzeit machen wir einen Unterschied wie folgt: 
```php
// Single Select
[ 'q1' => '1' ];

// Multiselect
[ 'q1_1' => '1', 'q1_2' => '0', 'q1_3' => '0' ];
```

Stattdessen sollten wir beide Typen im selben Format schreiben:

```php
// Single Select
[ 'q1_1' => '1', 'q1_2' => '0', 'q1_3' => '0' ];

// Multiselect
[ 'q1_1' => '1', 'q1_2' => '0', 'q1_3' => '0' ];
```
Dies würde uns auch eine Order-Variable sparen.

### Advanced data structure
In so einer Schreibweise fehlen uns immernoch einige wichtige informationen.  
Ebenso müssten wir Daten per Hand extrahieren (z.B. wenn wir die Order-Variable wollen,
müssen wir die ID's anhand der Keys im Array auslesen).  
  
Daher empfiehlt es sich eine andere Struktur zu nutzen (_type_, _rows_ und _columns_ sind optional):
```php
// Select (multiple and single)
[
    'name' => 'q1',
    'type' => 'select',
    'rows' => ['1', '2', '3'],
    'columns' => [], 
    'answers' => [
        '1' => '1',
        '2' => '0',
        '3' => '0'
    ],
];

// Grid (multi dimensional)
[
    'name' => 'q3',
    'type' => 'grid',
    'rows' => ['1', '2', '3'],
    'columns' => ['1', '2', '99'], 
    'answers' => [
        '1' => ['1' => '1', '2' => '0', '99' => '0'],
        '2' => ['1' => '0', '2' => '0', '99' => '1'],
        '3' => ['1' => '0', '2' => '0', '99' => '1'],
    ],
];
```
In dieser Form könnten die Daten in JSON-Format konvertiert werden und in einer MySQL  
oder Postgresql Datenbank abgelegt werden. (Beide unterstützen den Typ JSON)