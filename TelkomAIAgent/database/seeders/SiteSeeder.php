<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Site;

class SiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $siteIds = [

            'BGS001',
            'BGS002',
            'BGS003',
            'BGS004',
            'BGS005',
            'BGS006',
            'BGS007',
            'BGS008',
            'BGS009',
            'BGS010',
            'BGS013',
            'BGS014',
            'BGS016',
            'BGS017',

            'BKG001',
            'BKG003',
            'BKG004',
            'BKG005',
            'BKG006',
            'BKG007',
            'BKG008',
            'BKG010',
            'BKG011',
            'BKG012',
            'BKG014',
            'BKG016',
            'BKG022',
            'BKG023',
            'BKG024',
            'BKG025',
            'BKG026',
            'BKG027',
            'BKG122',
            'BKG028',
            'BKG029',
            'BKG030',
            'BKG031',
            'BKG032',
            'BKG034',
            'BKG035',
            'BKG036',
            'BKG037',
            'BKG040',
            'BKG041',
            'BKG042',
            'BKG043',
            'BKG044',
            'BKG045',
            'BKG046',
            'BKG048',
            'BKG049',
            'BKG050',
            'BKG052',
            'BKG053',
            'BKG054',
            'BKG055',
            'BKG056',
            'BKG057',
            'BKG058',
            'BKG059',
            'BKG061',
            'BKG062',
            'BKG063',
            'BKG064',
            'BKG065',
            'BKG066',
            'BKG067',
            'BKG068',
            'BKG069',
            'BKG070',
            'BKG071',
            'BKG072',
            'BKG073',
            'BKG074',
            'BKG075',
            'BKG076',
            'BKG077',
            'BKG123',
            'BKG079',
            'BKG080',
            'BKG083',
            'BKG085',
            'BKG086',
            'BKG087',
            'BKG088',
            'BKG089',
            'BKG090',
            'BKG091',
            'BKG093',
            'BKG094',
            'BKG095',
            'BKG096',
            'BKG097',
            'BKG098',
            'BKG099',
            'BKG100',
            'BKG101',
            'BKG102',
            'BKG103',
            'BKG104',

        ];

        $status = [

            'Normal',
            'Preventive Maintenance',
            'Corrective Maintenance',
            'Link Down',
            'Power Failure',
            'Rectifier Alarm',
            'Battery Low',
            'VSWR Alarm',
            'Backhaul Problem',
            'Device Replacement',
            'Monitoring',
            'Resolved',

        ];

        $note = [

            'Site dalam kondisi normal, seluruh layanan berjalan dengan baik.',
            'Preventive maintenance sedang dilakukan sesuai jadwal pemeliharaan rutin.',
            'Teknisi sedang melakukan perbaikan perangkat akibat gangguan hardware.',
            'Gangguan pada jalur transmisi (backhaul/link transmission), proses penelusuran sedang berlangsung.',
            'Site mengalami gangguan catu daya, menunggu suplai listrik kembali normal.',
            'Alarm rectifier terdeteksi, teknisi sedang melakukan pengecekan sistem power.',
            'Kapasitas baterai berada di bawah ambang batas, penggantian baterai sedang dijadwalkan.',
            'Alarm VSWR terdeteksi pada sektor antena, dilakukan pemeriksaan feeder dan jumper.',
            'Gangguan koneksi backhaul, koordinasi dengan tim transmisi sedang berlangsung.',
            'Penggantian perangkat RRU/BBU sedang dilakukan oleh teknisi lapangan.',
            'Site telah pulih dan sedang dimonitor untuk memastikan kondisi tetap stabil.',
            'Gangguan telah selesai ditangani dan site kembali beroperasi normal.',

        ];

        foreach ($siteIds as $i => $siteId) {

            Site::create([

                'site_id'   => $siteId,
                'site_name' => 'Site ' . $siteId,
                'region'    => 'Dumai',
                'status'    => $status[$i % count($status)],
                'note'      => $note[$i % count($note)],

            ]);
        }
    }
}
