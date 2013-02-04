<?php
/**
 * For correct strings processing we need mbstring extension
 */
if (! extension_loaded('mbstring')) {
    throw new Exception('mbstring extension needed');
}
if (ini_get('mbstring.func_overload') < 6) {
    throw new Exception('php.ini option mbstring.func_overload should be 6 or 7. Current value: ' . ini_get('mbstring.func_overload'));
}
mb_internal_encoding('UTF-8');

define('ROOT_DIR', dirname(__FILE__));

spl_autoload_register(function ($class) {
    $class = trim($class, '\\');
    $class = strtr($class, array('\\' => DIRECTORY_SEPARATOR));
    require_once ROOT_DIR . '/' . $class . '.php';
});

function assertExpected($value, $expected, $caseNum) {
    $expr = ($value == $expected);
    if (! $expr) {
        throw new Exception('Test case: '
                . $caseNum . ' failed. Value: "'
                . $value . '". Expected: "' . $expected . '"');
    }
}

$config = new Lib\Config\ConfigPhp();

$service = new Service\CaseService($config);

$testCases = file_get_contents(ROOT_DIR . '/input.txt');
$testCases = explode("\n", $testCases);

$caseNum = 0;
foreach ($testCases as $testCase) {
    $case = explode('|', $testCase);
    if ($case[0] == '#') {
        continue;
    }
    $caseNum++;
    $sex = trim($case[0]);
    $fullName = trim($case[1]);
    for ($i = 2; ($i < count($case)) && ($i < 7); $i++) {
        $value = $service->declineFullName('ru', $i, $sex, $fullName);
        assertExpected($value, trim($case[$i]), $caseNum . '-' . $i);
        echo '+';
    }
    echo "OK\n";
}