<?php

namespace App\Libraries;

class Fungsi
{   
    public static function KodeGenerate($lastKode, $lenght, $awalKode = null, $split = null) 
    {
        if($lastKode==null) {
            $angka = "00";
        } else {     
            $angka = substr($lastKode,$lenght);
        }
        $angkaTambah = (int)$angka+1;
        $new = sprintf("%02s",$angkaTambah); 
        return $awalKode.$split.$new;
    }

    public static function KodeGenerate2($lastKode, $lenght, $awalKode, $lenghtRepeat) 
    {
        if($lastKode==null) {
            $angka = '00';
        } else {
            $angka = substr($lastKode,$lenght);
        }
        $angkaTambah = (int)$angka+1;
        $angka0 = str_repeat('0',$lenghtRepeat - strlen($angkaTambah));
        $new = sprintf("%01s",$angkaTambah);
        return $awalKode.$angka0.$new;
    }
}
