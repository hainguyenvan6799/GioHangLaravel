<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class testController extends Controller
{
    //
    public function test(){
    	$storedItem = ['qty' => 0, 'price'=>0, 'item'=>''];
    	$items = ['6'=>[ 'qty'=>5, 'price'=>100, 'item'=>'A'], '7'=>['qty'=>15,'price'=>17, 'item'=>'B']];
    	if($items)
    	{
    		if(array_key_exists('6', $items))
    		{
    			$storedItem = ($items['6']);
    			$storedItem['qty'] += 1;
    			var_dump($storedItem);
    			echo '<br>';
    		}
    	}
    	$items['6'] = $storedItem;
    	var_dump($items);
    	echo '<br>';

    }

    public function testJs(){
        return view('test.testJavascript');
    }
}
