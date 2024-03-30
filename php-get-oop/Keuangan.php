<?php

class Keuangan {
    const STANDAR_JAM_KERJA = 48;

    public static function hitungUpahTotal(Karyawan $karyawan) {
        $upah_per_jam = $karyawan->getUpahPerJam();
        $jam_kerja = $karyawan->getJamKerja();
    
        if ($upah_per_jam <= 0 || $jam_kerja <= 0) {
            return false;
        }
    
        // Hitung upah total
        if ($jam_kerja <= self::STANDAR_JAM_KERJA) {
            $upah_total = $upah_per_jam * $jam_kerja;
        } else {
            $upah_normal = $upah_per_jam * self::STANDAR_JAM_KERJA;
            $upah_lembur = ($jam_kerja - self::STANDAR_JAM_KERJA) * ($upah_per_jam * 1.15);
            $upah_total = $upah_normal + $upah_lembur;
        }
    
        return $upah_total;
    }
}

?>
