<?php
#---------------------------------------------------------------------------------------------------
require 'i-tatarajah.php';
#---------------------------------------------------------------------------------------------------
spl_autoload_register(function ($namaClass)
{
	# buat pecahan tatasusunan $namaClass
	$class = explode('\\', $namaClass); //print_r($class) . '<br>';
	# semak kewujudan class
	//echo '<?hr>nama class:' . $class[count($class)-1] . ' | ';
	$cariFail = GetMatchingFiles(GetContents('Aplikasi/Kelas'),$class[count($class)-1] . '.php');
	# jika fail wujud, masukkan
	foreach($cariFail as $kitabApa)
	{	//echo '$kitabApa->' . $kitabApa . '<br>';
		if (file_exists($kitabApa)) require $kitabApa;
		//else echo 'tidak jumpa daa<br>';
	}//*/
});
#---------------------------------------------------------------------------------------------------
$aplikasi = new \Aplikasi\Kitab\Peta2();