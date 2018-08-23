<?php

namespace Davidpiesse\NovaPhpinfo;


class PhpInfo{

    public $filter = Filter::All;

    public function __construct($filter = Filter::All)
    {
        $this->filter = $filter;
    }

    public static function get($filter = Filter::All){
        return (new self($filter))->toCollection();
    }

    //for populating a dropdown
    public function filters(){
        return Filter::list();
    }

    //for getting data
    public function toCollection(){
        ob_start();

        phpinfo($this->filter);
        
		$phpinfo = ['phpinfo' => collect()];
		
		if(preg_match_all('#(?:<h2>(?:<a name=".*?">)?(.*?)(?:</a>)?</h2>)|(?:<tr(?: class=".*?")?><t[hd](?: class=".*?")?>(.*?)\s*</t[hd]>(?:<t[hd](?: class=".*?")?>(.*?)\s*</t[hd]>(?:<t[hd](?: class=".*?")?>(.*?)\s*</t[hd]>)?)?</tr>)#s', ob_get_clean(), $matches, PREG_SET_ORDER)){
            
            collect($matches)->each(function($match) use (&$phpinfo){
                if(strlen($match[1])){
                    $phpinfo[$match[1]] = collect();

                }elseif(isset($match[3])){
                    $keys1 = array_keys($phpinfo);

                    $phpinfo[end($keys1)][$match[2]] = isset($match[4]) ? collect([$match[3], $match[4]]) : $match[3];
                }else{
                    $keys1 = array_keys($phpinfo);

                    $phpinfo[end($keys1)][] = $match[2];      
                }
            });
        }
        
        return collect($phpinfo);
    }

    public function html(){
        $data = $this->toCollection();

        $html = "";

        if(! empty($data)){
            foreach($data as $name => $section) {
                $html .= "<h3>$name</h3>\n<table>\n";
                foreach($section as $key => $val){
                        if(is_a($val, 'Illuminate\Support\Collection')){
                            $html .= "<tr><td>$key</td><td>$val[0]</td><td>$val[1]</td></tr>\n";
                        }elseif(is_array($val)){
                            $html .= "<tr><td>$key</td><td>$val[0]</td><td>$val[1]</td></tr>\n";
                        }elseif(is_string($key)){
                            $html .= "<tr><td>$key</td><td>$val</td></tr>\n";
                        }else{
                            $html .= "<tr><td>$val</td></tr>\n";
                    }
                }
            }
            $html .= "</table>\n";
        }else{
            $html .= "<h3>Sorry, the phpinfo() function is not accessable. Perhaps, it is disabled <a href='http://php.net/manual/en/function.phpinfo.php'>See the documentation.</a></h3>";
        }

        return $html;
    }
}