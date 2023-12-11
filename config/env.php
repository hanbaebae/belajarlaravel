<?php

return [
  'default_password' => env('DEFAULT_PASSWORD'),
  'app_env' => env('APP_ENV'),
  'recaptcha_key' => [
    'secret' => env('RECAPTCHA_SECRET_KEY', false),
    'site' => env('RECAPTCHA_SITE_KEY', false),
  ],
  'role' => [
    'admin'     => env('ROLE_ADMIN_ID', 1),
    'kabid'     => env('ROLE_KABID_ID', 2),
    'kadis'     => env('ROLE_KADIS_ID', 3),
    'konselor'  => env('ROLE_KONSELOR_ID', 4),
    'subkord'   => env('ROLE_SUBKORD_ID', 5),
    'opd'       => env('ROLE_OPD_ID', 6),
    'hotline'   => env('ROLE_HOTLINE_ID', 7),
    'asisten'   => env('ROLE_ASISTEN_ID', 8),
    'kelurahan'   => env('ROLE_KELURAHAN_ID', 9),
    'kecamatan'   => env('ROLE_KECAMATAN_ID', 10),
    'klien'   => env('ROLE_KLIEN_ID', 11),
    'psikolog'   => env('ROLE_PSIKOLOG_ID', 12),
    'penulis'   => env('ROLE_PENULIS_KONTEN_ID', 13),
    'mahasiswa'   => env('ROLE_MAHASISWA_ID', 14),
    'fasilitator'   => env('ROLE_FASILITATOR_ID', 15),
  ],
  'ttd_kadis' => [
    'nama' => env('NAMA_KADIS', 'Dra. IDA WIDAYATI, MM'),
    'jabatan' => env('JABATAN_KADIS', 'Pembina Tk. I'),
    'nip' => env('NIP_KADIS', '196809081996022002'),
  ],
];
