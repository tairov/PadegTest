<?php

namespace Lib\Declinatio;

/**
 * Declinatio abstract lang module 
 */
abstract class LangBase implements LangInterface {
    
    const TYPE_FIRSTNAME = 'FN';
    const TYPE_LASTNAME = 'LN';
    
    protected $rules = null;
    protected $exceptions = null;
    
    public function __construct($config = null) {
        $this->rules = $config['rules'];
        $this->exceptions = $config['globalExceptions'];
    }
    
    /**
     * 
     * @param string $word
     * @return array
     */
    protected function explodeToCharsArray($word) {
        $len = strlen($word);
        $arr = array();
        for ($i = 0; $i < $len; $i++) {
            $arr[] = substr($word, $i, 1);
        }
        return $arr;
    }
    
    /**
     * 
     * @param array $charsArr
     * @param int $from
     * @param int $to
     * 
     * @return string
     */
    protected function implodeCharsArrayToString($charsArr, $from = 0, $to = null) {
        if (is_null($to)) {
            $to = count($charsArr) - 1;
        }
        $result = '';
        
        for ($i = $from; $i <= $to; $i++) {
            $result .= $charsArr[$i];
        }
        return $result;
    }
    
    /**
     * UTF8 safe ucfirst function
     * 
     * @param string $word
     * @return string 
     */
    protected function ucFirst($word) {
        return strtoupper(substr($word, 0, 1)) . substr($word, 1);
    }
}



