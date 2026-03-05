<?php

/**
 * Mengembalikan isi segment berdasar number yg dikirim / false.
 *
 * @param int $number The segment number for which we want to return the value of
 *
 * @return string|false
 */
function getSegment(int $number)
{
    // $request = \Config\Services::request();

    // if ($request->uri->getTotalSegments() >= $number && $request->uri->getSegment($number)) {
    //     return $request->uri->getSegment($number);
    // } else {
    //     return false;
    // }

    $uri = service('uri');
    // if ($request->uri->getTotalSegments() >= $number && $request->uri->getSegment($number)) {
    //     return $request->uri->getSegment($number);
    // } else {
    //     return false;
    // }
    return $uri->getSegment($number);
}


/**
 * Mengubah format date sql ke tanggalan indonesia
 *
 * @param string $tanggal
 * @return tanggalindonesia
 */
function tanggal_indonesia($tanggal = '0000-00-00', $singkat = false)
{
    if (isset($tanggal) && $tanggal != NULL) {
        $tanggalArray = explode('-', $tanggal);
        switch ($tanggalArray[1]) {
            case '01':
                $bulan = $singkat ? "Jan" : "Januari";
                break;
            case '02':
                $bulan = $singkat ? "Feb" : "Februari";
                break;
            case '03':
                $bulan = $singkat ? "Mar" : "Maret";
                break;
            case '04':
                $bulan = $singkat ? "Apr" : "April";
                break;
            case '05':
                $bulan = "Mei";
                break;
            case '06':
                $bulan = $singkat ? "Jun" : "Juni";
                break;
            case '07':
                $bulan = $singkat ? "Jul" : "Juli";
                break;
            case '08':
                $bulan = $singkat ? "Ags" : "Agustus";
                break;
            case '09':
                $bulan = $singkat ? "Sep" : "September";
                break;
            case '10':
                $bulan = $singkat ? "Okt" : "Oktober";
                break;
            case '11':
                $bulan = $singkat ? "Nov" : "November";
                break;
            case '12':
                $bulan = $singkat ? "Des" : "Desember";
                break;
            default:
                $bulan = "";
        }

        if ($tanggalArray[0] == '0000') $tanggalArray[0] = '';
        if ($tanggalArray[2] == '00') $tanggalArray[2] = '';

        return $tanggalArray[2] . ' ' . $bulan . ' ' . $tanggalArray[0];
    }
}

function bulan_indonesia($bulan)
{
    $bulan = strval($bulan);
    if (strlen($bulan) == 2 && $bulan[0] == '0')
        $bulan = $bulan[1];

    switch ($bulan) {
        case '1':
            $bulan = "Januari";
            break;
        case '2':
            $bulan = "Februari";
            break;
        case '3':
            $bulan = "Maret";
            break;
        case '4':
            $bulan = "April";
            break;
        case '5':
            $bulan = "Mei";
            break;
        case '6':
            $bulan = "Juni";
            break;
        case '7':
            $bulan = "Juli";
            break;
        case '8':
            $bulan = "Agustus";
            break;
        case '9':
            $bulan = "September";
            break;
        case '10':
            $bulan = "Oktober";
            break;
        case '11':
            $bulan = "November";
            break;
        case '12':
            $bulan = "Desember";
            break;
        case '13':
            $bulan = "Gaji 13";
            break;
        case '14':
            $bulan = "THR";
            break;
    }

    return $bulan;
}

function hari_indonesia($hari)
{

    switch ($hari) {
        case 'Sunday':
            $hari = "Minggu";
            break;
        case 'Monday':
            $hari = "Senin";
            break;
        case 'Tuesday':
            $hari = "Selasa";
            break;
        case 'Wednesday':
            $hari = "Rabu";
            break;
        case 'Thursday':
            $hari = "Kamis";
            break;
        case 'Friday':
            $hari = "Jumat";
            break;
        case 'Saturday':
            $hari = "Sabtu";
            break;
    }

    return $hari;
}

/**
 * konversi text uang ke int
 */
function uang_to_int($uang, $desimal = FALSE)
{
    $uang = trim($uang);
    //cek jika ada text rupiah
    $uang = substr($uang, 0, 2) == 'Rp' ? str_replace('Rp', '', $uang) : $uang;
    $uang = substr($uang, 0, 1) == '.' ? str_replace('.', '', $uang) : $uang;
    $uang = str_replace(' ', '', $uang);

    //cek tanda koma desimal, hapus desimal nya
    $uang = substr($uang, -3, 1) == '.' || substr($uang, -3, 1) == ',' ? substr($uang, 0, -3) : $uang;

    //hilangkan tanda ribuan
    $uang = str_replace('.', '', $uang);
    $uang = str_replace(',', '', $uang);
    // $uang = (int)$uang;

    return $uang;
}

/**
 * konversi int ke uang
 */
function int_to_uang($uang)
{
    return 'Rp. ' . number_format($uang, 0, ',', '.');
}

function esctrim($text)
{
    if ($text)
        return esc(trim($text));
    else
        return $text;
}

function sekarang()
{
    return date('Y-m-d H:i:s');
}
