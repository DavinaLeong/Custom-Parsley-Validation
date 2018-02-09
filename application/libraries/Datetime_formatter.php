<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datetime_formatter {

    public function format($dt_str, $format_str=SYSTEM_DATETIME_FORMAT, $dt_zone=SYSTEM_DATETIME_ZONE) {
        $datetime = new DateTime($dt_str, new DateTimeZone($dt_zone));
        return $datetime->format($format_str);
    }

    public function now($format_str=SYSTEM_DATETIME_FORMAT, $dt_zone=SYSTEM_DATETIME_ZONE) {
        return $this->format('now', $format_str, $dt_zone);
    }

    public function today($format_str=SYSTEM_DATETIME_FORMAT, $dt_zone=SYSTEM_DATETIME_ZONE) {
        return $this->format('today', $format_str, $dt_zone);
    }

    public function format_mysql($dt_str, $dt_zone=SYSTEM_DATETIME_ZONE) {
        return $this->format($dt_str, MYSQL_DATETIME_FORMAT, $dt_zone);
    }

    public function format_system_datetime($dt_str, $dt_zone=SYSTEM_DATETIME_ZONE) {
        return $this->format($dt_str, SYSTEM_DATETIME_FORMAT, $dt_zone);
    }

    public function format_system_date($dt_str, $dt_zone=SYSTEM_DATETIME_ZONE) {
        return $this->format($dt_str, SYSTEM_DATE_FORMAT, $dt_zone);
    }

    public function format_system_time($dt_str, $dt_zone=SYSTEM_DATETIME_ZONE) {
        return $this->format($dt_str, SYSTEM_TIME_FORMAT, $dt_zone);
    }

} //end Datetime_formatter