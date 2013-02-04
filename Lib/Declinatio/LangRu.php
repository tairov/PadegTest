<?php

namespace Lib\Declinatio;

/**
 * Russian language declination processor 
 */
class LangRu extends LangBase {
    
    /**
     * Decline for case one word
     * 
     * @param string $type LangBase::TYPE_FIRSTNAME or LangBase::TYPE_LASTNAME
     * @param int $caseId
     * @param string $sex
     * @param string $word
     * 
     * @return string 
     */
    public function declineWord($type, $caseId, $sex, $word) {
        $result = $word;
        $wordLen = strlen($word);
        $lowerWord = strtolower($word);
        
        if ($caseId == 1) {
            return $result;
        }
        
        if (isset($this->exceptions[$sex . $type][$lowerWord])) {
            $cases = $this->exceptions[$sex . $type][$lowerWord];
            if (is_string($cases) && ($cases == '*') || ($cases[$caseId] == '*')) {
                return $result;
            } else {
                // переводим в верхний регистр первый символ
                return $this->ucFirst($cases[$caseId]);
            }
        }
        
        $rules = $this->rules[$sex][$type];
        if (empty($rules)) {
            throw new LangException('Have no enough rules for processing case.');
        }
        $chars = $this->explodeToCharsArray($lowerWord);
        $chars = array_reverse($chars);
        $last[1] = $chars[0];
        $last[2] = ($wordLen > 1) ? $chars[1] . $last[1] : $last[1];
        $last[3] = ($wordLen > 2) ? $chars[2] . $last[2] : $last[2];
        
        /**
         * Loop through rules array
         */
        foreach ($rules as $num => $rule) {
            /**
             * Get rule's info 
             */
            list($suffix, $ending, $exceptions) = array($rule['suffix'], $rule['ending'], $rule['exceptions']);
            
            /**
             * Process exceptions separately 
             */
            if (!empty($exceptions) && isset($exceptions[$lowerWord])) {
                $cases = $exceptions[$lowerWord];
                if (is_string($cases) && $cases == '*') {
                    break;
                }
                $case = $cases[$caseId];
                if ($case == '*') {
                    break;
                }
                $result = $this->ucFirst($case);
                break;
            }
            
            // ex.: 2 => array('ий,ой' => array(2 => 'ого', 3 => 'ому', 4 => 'ого', 5 => 'им', 6 => 'ом'))
            foreach ($ending as $charCnt => $currentEndings) {
                //                           ий,ой    => [2 => 'ого', ...]
                //                           б,г,д    => [2 => '+а', ..., 5 => '+ом']
                foreach ($currentEndings as $variants => $cases) {
                    if (false !== strpos($variants, $last[$charCnt])) {
                        if (!empty($suffix)) { // правила 11,17,18
                            if (false === strpos($suffix, $chars[$charCnt])) { // если пред. символ не совпадет
                                continue;
                            }
                        }
                        if ($cases == '*') { // не склоняется
                            break 3;
                        }
                        $replacementChars = $this->explodeToCharsArray($cases[$caseId]);
                        if ($replacementChars[0] == '+') {
                            $newEnding = $this->implodeCharsArrayToString($replacementChars, 1);
                        } else {
                            $newEnding = $cases[$caseId];
                            if ($newEnding == '*') {
                                break 3;
                            }
                            $result = substr($result, 0, $wordLen - $charCnt);
                        }
                        $result .= $newEnding;
                        break 3;
                    }
                }
            }
        }
        
        return $result;
    }
}