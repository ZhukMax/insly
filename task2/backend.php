<?php
require_once 'Models/Policy.php';
require_once 'Exceptions/PolicyException.php';

try {
    $policy = new Policy($_POST);
    $output = $policy->toJson();
} catch (PolicyException $e) {
    $output = $e->getMessage();
}

exit($output);
