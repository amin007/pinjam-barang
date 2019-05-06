<?php
/* Ini class untuk
 * 1. capai fungsi $this->parseURL() dan masukkan dalam $url
 * 2. cari controller => kawal
 * 3. cari method => fungsi
 * 4. masukkan tatasusunan dalam params jika ada
 * 5. jalankan controller & method, serta kirim params jika ada
 */
namespace Aplikasi\Kitab;//echo __NAMESPACE__;
class Peta2
{
####################################################################################################
#---------------------------------------------------------------------------------------------------
	public function parseURL()
	{
		//$this->semakPembolehubah($_GET,'_GET');
		if( isset($_GET['url']) )
		{
			$url = rtrim($_GET['url'], '/');
			$url = filter_var($url, FILTER_SANITIZE_URL);
			$url = explode('/', $url);
			return $url;
		}
	}
#---------------------------------------------------------------------------------------------------
	public function __construct()
	{
		//echo '<hr> Nama class : ' . __METHOD__ . '<hr>';
		# 1. capai fungsi $this->parseURL() dan masukkan dalam $url
		$url = $this->parseURL();
		list($url,$Url) = $this->semakURL($url);
		//$this->debugData($url,$Url);#semak untuk masa depan

		# 2. cari controller => kawal
		$url = $this->semakKawal($url,$Url);
		//$this->semakPembolehubah($url,'url selepas class');

	}
#---------------------------------------------------------------------------------------------------
	function semakKawal($url,$Url)
	{
		if( file_exists(KAWAL . '/' . $url[0] . '.php') )
		{
			$this->kawal = $Url[0];
			//echo 'lokasi fail:' . KAWAL . '/' . $url[0] . '.php<hr>';
			//echo 'nama class:' . $this->kawal . '<hr>';
			require_once KAWAL . '/' . $url[0] . '.php';
			unset($url[0]);
		}
		$this->kawal = new $this->kawal;# nilai default adalah index

		return $url;
	}
#---------------------------------------------------------------------------------------------------
####################################################################################################
}