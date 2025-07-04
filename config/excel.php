<?php

use PhpOffice\PhpSpreadsheet\Reader\Csv;

return [
    'exports' => [
        'chunk_size'             => 1000,
        'pre_calculate_formulas' => false,
        'strict_null_comparison' => false,
        'csv'                    => [
            'delimiter'              => ',',
            'enclosure'              => '"',
            'line_ending'            => PHP_EOL,
            'use_bom'                => false,
            'include_separator_line' => false,
            'excel_compatibility'    => false,
            'output_encoding'        => '',
            'test_auto_detect'       => true,
        ],
        'properties'             => [
            'creator'        => '',
            'lastModifiedBy' => '',
            'title'          => '',
            'description'    => '',
            'subject'        => '',
            'keywords'       => '',
            'category'       => '',
            'manager'        => '',
            'company'        => '',
        ],
    ],

    'imports' => [
        'read_only'    => true,
        'ignore_empty' => false,
        'heading_row'  => [
            'formatter' => 'slug',
        ],
        'csv'          => [
            'delimiter'        => null,
            'enclosure'        => '"',
            'escape_character' => '\\',
            'contiguous'       => false,
            'input_encoding'   => Csv::GUESS_ENCODING,
        ],
        'properties'   => [
            'creator'        => '',
            'lastModifiedBy' => '',
            'title'          => '',
            'description'    => '',
            'subject'        => '',
            'keywords'       => '',
            'category'       => '',
            'manager'        => '',
            'company'        => '',
        ],
        'cells'        => [
            'middleware' => [
                // \Maatwebsite\Excel\Middleware\TrimCellValue::class,
                // \Maatwebsite\Excel\Middleware\ConvertEmptyCellValuesToNull::class,
            ],
        ],
    ],

    'extension_detector' => [
        'xlsx'     => 'Xlsx',
        'xlsm'     => 'Xlsx',
        'xltx'     => 'Xlsx',
        'xltm'     => 'Xlsx',
        'xls'      => 'Xls',
        'xlt'      => 'Xls',
        'ods'      => 'Ods',
        'ots'      => 'Ods',
        'slk'      => 'Slk',
        'xml'      => 'Xml',
        'gnumeric' => 'Gnumeric',
        'htm'      => 'Html',
        'html'     => 'Html',
        'csv'      => 'Csv',
        'tsv'      => 'Csv',
        'pdf'      => 'Dompdf', // atau 'Mpdf' / 'Tcpdf' jika kamu menggunakan PDF export
    ],

    'value_binder' => [
        'default' => Maatwebsite\Excel\DefaultValueBinder::class,
    ],

    'cache' => [
        'driver'      => 'memory',
        'batch'       => [
            'memory_limit' => 60000,
        ],
        'illuminate'  => [
            'store' => null,
        ],
        'default_ttl' => 10800,
    ],

    'transactions' => [
        'handler' => 'db',
        'db'      => [
            'connection' => null,
        ],
    ],

    'temporary_files' => [
        'local_path'          => storage_path('framework/cache/laravel-excel'),
        'local_permissions'   => [
            // 'dir'  => 0755,
            // 'file' => 0644,
        ],
        'remote_disk'         => null,
        'remote_prefix'       => null,
        'force_resync_remote' => null,
    ],
];
