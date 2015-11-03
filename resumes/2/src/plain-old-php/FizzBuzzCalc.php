<?php

class FizzBuzzCalc {


    public function say($n)
    {
        return array_map([$this, 'fizzOrBuzz'], range(0, $n));
    }

    private function fizzOrBuzz($n)
    {
        if($n % 15 === 0){
            return 'FizzBuzz';
        }elseif ($n % 3 === 0) {
            return 'Fizz';
        }elseif($n % 5 === 0){
            return 'Buzz';
        }else{
            return $n;
        }
    }

}
?>
<pre>
　　　　 　(~)
　　　   γ´⌒｀ヽ
　　　 {i:i:i:i:i:i:i:i:}
　　　（´・ω・）
　　 　 (:::O┬O
　　◎-ヽJ┴◎　ｷｺｷｺ
</pre>
