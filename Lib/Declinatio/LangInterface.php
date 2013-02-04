<?php

namespace Lib\Declinatio;

interface LangInterface {
    
    /**
     * Decline for case one word
     * 
     * @param string $type
     * @param int $caseId
     * @param string $sex
     * @param string $word
     * 
     * @return string 
     */
    public function declineWord($type, $caseId, $sex, $word);
}


