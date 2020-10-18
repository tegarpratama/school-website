<?php

function mediumdate_indo($tgl){
   $ubah = gmdate($tgl, time()+60*60*8);
   $pecah = explode("-",$ubah);
   $tanggal = $pecah[2];
   $bulan = medium_bulan($pecah[1]);
   $tahun = $pecah[0];
   return $bulan . ' ' . $tanggal . ', ' . $tahun;
   // return $tanggal.'-'.$bulan.'-'.$tahun;
}

function medium_bulan($bln){
   switch ($bln)
   {
      case 1:
         return "Jan";
         break;
      case 2:
         return "Feb";
         break;
      case 3:
         return "Mar";
         break;
      case 4:
         return "Apr";
         break;
      case 5:
         return "Mei";
         break;
      case 6:
         return "Jun";
         break;
      case 7:
         return "Jul";
         break;
      case 8:
         return "Ags";
         break;
      case 9:
         return "Sep";
         break;
      case 10:
         return "Okt";
         break;
      case 11:
         return "Nov";
         break;
      case 12:
         return "Des";
         break;
   }
}