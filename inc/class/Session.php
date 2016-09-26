<?php
class Session {
    public function __construct() {
        session_start();
    }
    public function __destruct() {
        unset($this);
    }

    public function register($time, $array) {

        foreach ($array as $key => $value) {
            $_SESSION['session_id']    = session_id();
            $_SESSION[$key]            = $value;
            $_SESSION['session_start'] = $this->newTime();
            $_SESSION['session_time']  = intval($time);
        }
    }

    public function wes_mlebu() {
        if (!empty($_SESSION['session_id']) and isset($_SESSION['username']) and ($_SESSION['username'] != '')) {
            return true;
        } else {
            return false;
        }
    }

    public function set($key, $value) {
        $_SESSION[$key] = $value;
    }

    public function get($key) {
        return $_SESSION[$key];
    }

    public function getSession() {
        return $_SESSION;
    }
    public function getSessionId() {
        return $_SESSION['session_id'];
    }
    public function getusernmae() {
        return $_SESSION['username'];
    }
    public function getlevel() {
        return $_SESSION['level'];
    }
    public function getlengkap() {
        return $_SESSION['namalengkap'];
    }
    public function wes_entek() {
        if ($_SESSION['session_start'] < $this->timeNow()) {
            return true;
        } else {
            return false;
        }
    }

    public function renew() {
        $_SESSION['session_start'] = $this->newTime();
    }

    public function timeNow() {
        $currentHour = date('H');
        $currentMin  = date('i');
        $currentSec  = date('s');
        $currentMon  = date('m');
        $currentDay  = date('d');
        $currentYear = date('y');
        return mktime($currentHour, $currentMin, $currentSec, $currentMon, $currentDay, $currentYear);
    }

    public function newTime() {
        if (isset($_SESSION['session_time']) and $_SESSION['session_time'] != '') {
            $currentHour = date('H');
        }

        $currentMin  = date('i');
        $currentSec  = date('s');
        $currentMon  = date('m');
        $currentDay  = date('d');
        $currentYear = date('y');
        $stime       = $currentMin + 60;
        return mktime(date('H'), $stime, $currentSec, $currentMon, $currentDay, $currentYear);
    }

    public function end() {
        session_destroy();
        $_SESSION = array();
    }
}