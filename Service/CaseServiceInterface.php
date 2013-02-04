<?php

namespace Service;

/**
 * Words case declination service interface
 */
interface CaseServiceInterface {
    
    /**
     * Decline for case a full name as:
     * [LastName FirstName]
     * 
     * @example $caseService->declineFullName('ru', 2, 'M', 'Дымба Харлампий');
     * @param string $lang
     * @param int $caseId
     * @param string $sex
     * @param string $fullName 
     * 
     * @return string $result declined full name
     */
    public function declineFullName($lang, $caseId, $sex, $fullName);
    
    /**
     * Decline word as last name
     * 
     * @param string $lang
     * @param int $caseId
     * @param string $sex
     * @param string $name
     * @return string
     */
    public function declineLastName($lang, $caseId, $sex, $name);
    
    
    /**
     * Decline word as first name
     * 
     * @param string $lang
     * @param int $caseId
     * @param string $sex
     * @param string $name
     * @return string
     */
    public function declineFirstName($lang, $caseId, $sex, $name);
    
    /**
     * Decline for case one word
     * 
     * @param string $type LangBase::TYPE_FIRSTNAME or LangBase::TYPE_LASTNAME
     * @param string $lang
     * @param int $caseId
     * @param string $sex
     * @param string $word
     * 
     * @return string 
     */
    public function declineWord($type, $lang, $caseId, $sex, $word);
}