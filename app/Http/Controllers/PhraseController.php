<?php

namespace App\Http\Controllers;
use App\Http\Requests\phraserequest;
use Illuminate\Http\Request;

class PhraseController extends Controller
{
     
    public function analyse(phraserequest $request)
    {
        
        $string = $request->phrase;
        $string = str_split($string); //split string to array of chars
        $string_chars =[];
        foreach ($string as  $value) {// remove what not alphabetical 
            if(preg_match('/[a-zA-Z]/', $value))
            {
                $string_chars []=$value;
            }
        }
        $chars_count = array_count_values($string_chars); //count how many times char repeated in array
        $data = [];
        foreach ($chars_count as $key => $value) {
            $data[$key] = $this->getBeforeAndAfter($key,$string_chars);
            if($value >= 2 )
            {
                $data[$key] .= "    max-distance: 10 chars";
            }
        }
        return view('grid',['chars' => $chars_count , 'data' => $data]);
        // dd( $data);
    }

    private function getBeforeAndAfter($char,$array)
    {
        $count = count($array);
        $data  ;
        $before = []; // what chars is before
        $after = []; // what chars is after
        for ( $i=0; $i<$count; $i++ ) {
            if($char == $array[$i])
            {
                if($i != 0)//first char
                {
                    if(!in_array($array[$i-1], $before))
                    {
                        $before[]=$array[$i-1] ;
                    }
                }
                if($i != $count-1)//last char
                {
                    if(!in_array($array[$i+1], $after))
                    {
                        $after[]=$array[$i+1] ;
                    }
                }
            }
            
        }
            $a = count( $after)  ? implode(', ', $after) : "none" ;
            $b = count( $before)  ? implode(', ', $before) : "none" ;
            $data  = " before : " . $a . "    after : "  . $b ;
        return $data ;
    }
}
