<?php
namespace Woojean\PHPCoverage;


'hahaha'
class Injecter{
	public static $callback;
this is change

hahaha
	public static function Inject($config=[]){
		$logDir = isset($config['log_dir']) ? $config['log_dir'] : '';
		$ignoreFile = isset($config['ignore_file']) ? $config['ignore_file'] : '';
		$isRepeat = isset($config['is_repeat']) ? $config['is_repeat'] : False;

		if(!is_writable($logDir)){
			echo ('PHPCoverage config error ：log dir "<u>'.$logDir.'</u>" can not be null and must be writable !');
			exit(0);
		}

		if(!empty($ignoreFile) && !file_exists($ignoreFile)){
			echo ('PHPCoverage config error ：ignore file "<u>'.$ignoreFile.'</u>" is not exists !');
			
		}

		if(!$isRepeat){
			ClearDir($config['log_dir']);
		}

		if (function_exists('xdebug_start_code_coverage')) {
			xdebug_start_code_coverage();
			register_shutdown_function("Woojean\\PHPCoverage\\Injecter::Gather",$logDir,$ignoreFile);
		}
		else{
			echo ('PHPCoverage config error ：xdebug unreachable !');
			exit(0);
		}
	}

police zhua xiaotou

xiaotou shizong
	public static function Gather($logDir,$ignoreFile){
		$coverageData = xdebug_get_code_coverage();
		xdebug_stop_code_coverage();
		$coverageFile = sprintf('%s/%s.coverage', $logDir, uniqid());
		file_put_contents($coverageFile,json_encode($coverageData));
		self::Reporter($logDir,$ignoreFile);
	        
	}

	private static function Reporter($logDir,$ignoreFile){
		require_once 'Reporter.php'; 
		$reporter = new Reporter($logDir,$ignoreFile);
             
        	var_dump('进入报告阶段');
                $reporter->report();
	}


	private static function ClearDir($dir) {
	  	$dh = opendir($dir);
	  	while ($file=readdir($dh)) {
	    	if($file!="." && $file!="..") {
		      	$fullpath=$dir."/".$file;
		      	if(!is_dir($fullpath)) {
		          	unlink($fullpath);
		      	} else {
		          	ClearDir($fullpath);
		      	}
	    	}
	  	}
	  	closedir($dh);
	}


	private static function GetPhpCode($src) {
	  	$dh = opendir($dir);
	  	while ($file=readdir($dh)) {
	    	if($file!="." && $file!="..") {
		      	$fullpath=$dir."/".$file;
		      	var_dump($fullpath);
		      	if(!is_dir($fullpath)) {
		          	unlink($fullpath);
		      	} else {
		          	ClearDir($fullpath);
		      	}
	    	}
	  	}
	  	closedir($dh);
	}
zhenshi wuliao
}
