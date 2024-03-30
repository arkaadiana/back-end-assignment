<?php

class Karyawan {
    private $upah_per_jam;
    private $jam_kerja;

    public function __construct($upah_per_jam, $jam_kerja) {
        $this->upah_per_jam = $upah_per_jam;
        $this->jam_kerja = $jam_kerja;
    }

    public function getUpahPerJam() {
        return $this->upah_per_jam;
    }

    public function getJamKerja() {
        return $this->jam_kerja;
    }
}

?>
