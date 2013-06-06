<?php

class CodeParser{

	//Create pattern
	public function createPattern($pattern){
		$spacable = '(),';
		foreach(str_split($spacable) as $s){
			$pattern = preg_replace("/\\$s/", "\s*\\$s\s*", $pattern);
		}
		$pattern = preg_replace('/\$/', '\w+', $pattern);
		$pattern = preg_replace('/\s+/', '\s+', $pattern);
		return '/\n.*'.$pattern.'/';
	}

	//find
	protected function find($pattern, $subject){
		$matches = array();
		preg_match($pattern, $subject, &$matches, PREG_OFFSET_CAPTURE);
		return $matches[0];
	}

	//get section
	protected function getSection($begin, $subject){
		$i = $begin;
		for(;$subject{$i}!=='{' && $i<strlen($subject); ++$i);
		$count = 0;
		do{
			$c = $subject{$i};
			if($c==='{'){
				++$count;
			}
			if($c==='}'){
				--$count;
			}
			$i++;
		}while($count>0 && $i<strlen($subject));
		return substr($subject, $begin, $i-$begin);
	}

	//get
	public function get($beginText, $code){
		$pattern = $this->createPattern($beginText);
		$begin   = $this->find($pattern, $code);
		if(!$begin){
			//error
			echo "No find section: $beginText";
		}
		return getSection($begin, $code);
	}

}


