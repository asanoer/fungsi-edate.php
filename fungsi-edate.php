<?php
//Fungsi Edate Ini Akan Menjumlahkan Tanggal Sebulan Ke Depan
//Dan memberikan hasil tanggal yang sama kecuali tgl 28 - 31
//bisa berubah ,, silahkan cek fungsi edate dalam Excel.
//Pembuat fungsi, ASANOER.com

if (!function_exists('edate')){
	function edate($tgl='1990-10-27', $jml=1){
	//Pisahkan angka menurut tanda "-" menjadi array
	$tgl = explode("-", $tgl);
		$nHrn = (int)$tgl[2]; //nHrn = new Harian
		$nBln = (int)$tgl[1]; //nBln = new Bulan
		$nThn = (int)$tgl[0]; //nThn = new Tahun
	//Ulangi sampai $jml	
	for ($i=1; $i < $jml+1; $i++) { 
		$nBln++;
		//cek validasi bulan jika sudah 13 maka tahun ditambahkan dan
		//bulan menjadi satu kembali.
			 if($nBln == 13) {
			 	$nThn++;
			 	$nBln = 1;
			 }
		//Cek validasi tanggal, jika salah kurangi tanggal. 
		while (!checkdate($nBln, $nHrn, $nThn)) {
			$nHrn--;
		}
	}
	//Kembalikan tanggal (tipe string) format Y-m-d
		$Bulan = (strlen($nBln)==1)?"0".$nBln:$nBln;
		$Harian = (strlen($nHrn)==1)?"0".$nHrn:$nHrn;
		return $nThn."-".$Bulan."-".$Harian;
	}
}
?>
