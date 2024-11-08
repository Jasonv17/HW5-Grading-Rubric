<?php
require_once 'gradingRubricInput.php'; 

function assertEqual($expected, $actual, $message = '') {
    if ($expected === $actual) {
        echo "[PASS] $message\n";
    } else {
        echo "[FAIL] $message\n";
        echo "  Expected: " . json_encode($expected) . "\n";
        echo "  Actual: " . json_encode($actual) . "\n";
    }
}

?>
