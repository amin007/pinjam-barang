<?php
#---------------------------------------------------------------------------------------------------
function huruf($jenis , $papar)
{
	/*
	$_POST=strtoupper($_POST['']['']);
	$_POST=strtolower($_POST['']['']);
	$_POST=mb_convert_case($_POST[''][''], MB_CASE_TITLE);
	ucfirst
	*/

	switch ($jenis)
	{# mula - pilih $jenis
	case "BESAR": # huruf('BESAR', )
		$papar = strtoupper($papar);
		break;
	case "kecil": # huruf('kecil', )
		$papar = strtolower($papar);
		break;
	case "Besar": # huruf('Besar', )
		$papar = ucfirst($papar);
		break;
	case "Besar_Depan": # huruf('Besar_Depan', )
		$papar = mb_convert_case($papar, MB_CASE_TITLE);
		break;
	}# tamat - pilih $jenis

	return $papar;
}
#---------------------------------------------------------------------------------------------------
# lisfile2 - mula
function GetMatchingFiles($files, $search)
{
	if($files==false):
		return false;
	else:
		# Split to name and filetype
		if(strpos($search,"."))
		{
			$baseexp = substr($search,0,strpos($search,"."));
			$typeexp = substr($search,strpos($search,".")+1,strlen($search));
		}
		else
		{
			$baseexp = $search;
			$typeexp = "";
		}

		# Escape all regexp Characters
		$baseexp = preg_quote($baseexp);
		$typeexp = preg_quote($typeexp);

		# Allow ? and *
		$baseexp = str_replace(array("\*","\?"), array(".*","."), $baseexp);
		$typeexp = str_replace(array("\*","\?"), array(".*","."), $typeexp);

		# Search for Matches
		$i = 0;
		$matches = null; # $matches adalah array()
		foreach($files as $file)
		{
			$filename = basename($file);

			if(strpos($filename,"."))
			{
				$base = substr($filename,0,strpos($filename,"."));
				$type = substr($filename,strpos($filename,".")+1,strlen($filename));
			}
			else
			{
				$base = $filename;
				$type = "";
			}

			if(preg_match("/^".$baseexp."$/i",$base) && preg_match("/^".$typeexp."$/i",$type))
			{
				$matches[$i]=$file;
				$i++;
			}
		}

		return $matches;
	endif;
}
#---------------------------------------------------------------------------------------------------
# Returns all Files contained in given dir, including subdirs
function GetContents($dir,$files=array())
{
	//if(!($res=opendir($dir))): exit("folder $dir tidak wujud!!!");
	if(!($res=@opendir($dir))): exit(\Aplikasi\Kelas\Kitab\Peta2::folderPaparTidakWujud());
	else:
		while(($file=readdir($res))==TRUE)
		if($file!="." && $file!="..")
			if(is_dir("$dir/$file"))
				$files=GetContents("$dir/$file",$files);
			else array_push($files,"$dir/$file");

		closedir($res);
		return $files;
	endif;
}
# listfile2 - tamat
#---------------------------------------------------------------------------------------------------
