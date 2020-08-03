<?php
if (!file_exists(__DIR__ . $rbscript)){
	header("HTTP/1.1 404 not such file or directory");
	echo "not such file or directory : ",$rbscript;
}else{
	$template = file_get_contents("runtime.trb");
	$trbplaceholder = "|FILENAME|";
	$rbbasepath = substr($rbscript,1);
	$rbcode = str_replace($trbplaceholder,$rbbasepath,$template);
	$filename = bin2hex(random_bytes(8)) . ".temp.rb";
	file_put_contents(__DIR__ . "\\" . $filename,$rbcode);
	ob_start();
	system("ubuntu1804 run /home/kori/.rbenv/shims/ruby ./".$filename,$retcode);
	$comrets = ob_get_clean();
	unlink($filename);
	if ($retcode == 0){
		$comrets = str_replace(array("\r\n", "\r", "\n"), "\n", $comrets);
		$spcomret = explode("\n\n", $comrets);
		$spcomret2 = [
			explode("\n",$spcomret[0]),
			explode("\n",$spcomret[1])
		];
		foreach ($spcomret2[0] as $headervalue){
			header($headervalue);
		}
		foreach ($spcomret2[1] as $bodyvalue){
			echo $bodyvalue;
		}
		//*/
	}else{
		header("HTTP/1.1 500 Ruby Script Error");
		header("Content-Type: text/plain");
		echo "PHP-Runtime:Ruby Error\n",$comrets;
	}
}
