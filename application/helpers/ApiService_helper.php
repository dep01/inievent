<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

// TODO: api response custom
if (!function_exists('apiResult')) {
    function apiResult($status, $data, $message = "data not found") {
        $result = array(
            "status" => $status,
            "message" => $message,
            "data" => $data,
            
        );

        return $result;
    }   
}

// TODO: api response custom page
if (!function_exists('apiResultPage')) {
    function apiResultPage($status, $data, $message = "data not found", $totalRows = 0, $totalPages = 0, $currentPage = 0) {
        $result = array(
            "status" => $status,
            "message" => $message,
            "totalRows" => $totalRows,
            "totalPages" => $totalPages,
            "currentPage" => $currentPage,
            "data" => $data,
        );

        return $result;
    }   
}

// TODO: pagination handler
function paginationHandler($pageOriginal, $tableName) {
    $totalRows = countRecord($tableName);
    if ($totalRows > 0) {
        $totalPages = $totalRows / dataPerPage();
    } else {
        $totalPages = 0;
    }
    if ($pageOriginal > 0) {
        $page = ($pageOriginal * dataPerPage());
    } else {
        $page = 0;
    }

    $pagination = array(
        "totalRows" => $totalRows,
        "totalPages" => (int)$totalPages,
        "page" => $page
    );

    return $pagination;
}

// TODO: mendapatkan datetime sistem
function createdUpdatedAt() {
    date_default_timezone_set('Asia/Jakarta');
    $now = date("Y-m-d");

    return $now;
}

// TODO: generate number sequence otomatis berdasarkan prefix
function generateNumberSequence($prefixNum) {
    $ci = get_instance();
    $transDate = date('Y-m-d');
    $transDateTime = date("Y-m-d H:i:s");
    $monthNum = date('m');
    $yearNum = date('y');
    
    $numRows = getExistingNumber($prefixNum, $yearNum, $monthNum);
    if ($numRows > 0) {
        $lastNum = 0;
        $history = getLastNumber($prefixNum, $yearNum, $monthNum);
        $lastNum = $history[0]['lastNum']+ 1;

        // TODO: update history number
        $data = array("lastNum" => $lastNum);
        updateHistoryNumberSequence($prefixNum, $yearNum, $monthNum, $data);
    } else {
        $lastNum = 1;

        // TODO: tambah history number baru jika baru pertama kali dipanggil
        $data = array(
            "yearNum" => $yearNum,
            "monthNum" => $monthNum,
            "lastNum" => $lastNum,
            "prefixNumber" => $prefixNum
        );
        createHistoryNumberSequence($data);
    }

    $numLen = strlen($lastNum);
    switch ($numLen) {
        case 1:
            $newNumberId = "0000".$lastNum;
            break;
        case 2:
            $newNumberId = "000".$lastNum;
            break;
        case 3:
            $newNumberId = "00".$lastNum;
            break;
        case 4:
            $newNumberId = "0".$lastNum;
            break;
        case 5:
            $newNumberId = $lastNum;
            break;
        }

    return $prefixNum."/".$yearNum."/".$monthNum."-".$newNumberId;
}

// TODO: mengecek apakah sudah ada history number sequence
function getExistingNumber($prefixNum, $yearNum, $monthNum) {
    $ci = get_instance();
    $ci->db->where("prefixNumber", $prefixNum);
    $ci->db->where("yearNum", $yearNum);
    $ci->db->where("monthNum", $monthNum);
    $numRows = $ci->db->get("history_number")->num_rows();

    return $numRows;
}

// TODO: menambah history number sequence
function createHistoryNumberSequence($data) {
    $ci = get_instance();
    $ci->db->insert("history_number", $data);
}

// TODO: mendapatkan data history number sequence
function getLastNumber($prefixNum, $yearNum, $monthNum) {
    $ci = get_instance();
    $ci->db->where("prefixNumber", $prefixNum);
    $ci->db->where("yearNum", $yearNum);
    $ci->db->where("monthNum", $monthNum);
    $data = $ci->db->get("history_number")->result_array();

    return $data;
}

// TODO: update history number sequence
function updateHistoryNumberSequence($prefixNum, $yearNum, $monthNum, $data) {
    $ci = get_instance();
    $ci->db->where("prefixNumber", $prefixNum);
    $ci->db->where("yearNum", $yearNum);
    $ci->db->where("monthNum", $monthNum);
    $ci->db->update("history_number", $data);
}

// TODO: generate kode unik transaksi
function generateUniqueCode() {
    $random = rand(100, 300);
    return $random;
}

// TODO: mendapatkan total record per table
function countRecord($tableName) {
    $ci = get_instance();
    return $ci->db->count_all($tableName);
}

// TODO: jumlah data per pagination
function dataPerPage() {
    return 10;
}

// TODO: total page maksimal
function numOfPage($countRecord) {
    if ($countRecord > 0) {
        return $countRecord / dataPerPage();
    } else {
        return 0;
    }
}

// TODO: membuat slug
function slugify($text)
{
    // replace non letter or digits by -
    $text = preg_replace('~[^\pL\d]+~u', '-', $text);
    // transliterate
    $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
    // remove unwanted characters
    $text = preg_replace('~[^-\w]+~', '', $text);
    // trim
    $text = trim($text, '-');
    // remove duplicate -
    $text = preg_replace('~-+~', '-', $text);
    // lowercase
    $text = strtolower($text);
    if (empty($text)) {
        return 'n-a';
    }

    return $text;
}

// TODO: generate random session id jika belum login
function createRandomSessionId() {
    $val = date("Y-m-d H:i:s");
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789,-";
    srand((double)microtime() * 1000000);
    $i = 0;
    $pass = '';
    while ($i < $val) {
        $num = rand() % 64;
        $tmp = substr($chars, $num, 1);
        $pass = $pass . $tmp;
        $i++;
    }
    return $pass;
}