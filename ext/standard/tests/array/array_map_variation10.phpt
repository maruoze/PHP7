--TEST--
Test array_map() function : usage variations - anonymous callback function
--FILE--
<?php
/* Prototype  : array array_map  ( callback $callback  , array $arr1  [, array $...  ] )
 * Description: Applies the callback to the elements of the given arrays 
 * Source code: ext/standard/array.c
 */

/*
 * Test array_map() by passing anoymous callback function with following variations
 */

echo "*** Testing array_map() : anonymous callback function ***\n";

$array1 = array(1, 2, 3);
$array2 = array(3, 4, 5);

echo "-- anonymous function with all parameters and body --\n";
var_dump( array_map( create_function('$a, $b', 'return array($a, $b);'), $array1, $array2));

echo "-- anonymous function with two parameters and passing one array --\n";
var_dump( array_map( create_function('$a, $b', 'return array($a, $b);'), $array1));

echo "-- anonymous function with NULL parameter --\n";
var_dump( array_map( create_function(NULL, 'return NULL;'), $array1));

echo "-- anonymous function with NULL body --\n";
var_dump( array_map( create_function('$a', NULL), $array1));

echo "-- passing NULL as 'arr1' --\n";
var_dump( array_map( create_function('$a', 'return array($a);'), NULL));

echo "Done";
?>
--EXPECTF--
*** Testing array_map() : anonymous callback function ***
-- anonymous function with all parameters and body --
array(3) {
  [0]=>
  array(2) {
    [0]=>
    int(1)
    [1]=>
    int(3)
  }
  [1]=>
  array(2) {
    [0]=>
    int(2)
    [1]=>
    int(4)
  }
  [2]=>
  array(2) {
    [0]=>
    int(3)
    [1]=>
    int(5)
  }
}
-- anonymous function with two parameters and passing one array --

Warning: Missing argument 2 for __lambda_func() in %s(20) : runtime-created function on line %d

Notice: Undefined variable: b in %s(20) : runtime-created function on line %d

Warning: Missing argument 2 for __lambda_func() in %s(20) : runtime-created function on line %d

Notice: Undefined variable: b in %s(20) : runtime-created function on line %d

Warning: Missing argument 2 for __lambda_func() in %s(20) : runtime-created function on line %d

Notice: Undefined variable: b in %s(20) : runtime-created function on line %d
array(3) {
  [0]=>
  array(2) {
    [0]=>
    int(1)
    [1]=>
    NULL
  }
  [1]=>
  array(2) {
    [0]=>
    int(2)
    [1]=>
    NULL
  }
  [2]=>
  array(2) {
    [0]=>
    int(3)
    [1]=>
    NULL
  }
}
-- anonymous function with NULL parameter --
array(3) {
  [0]=>
  NULL
  [1]=>
  NULL
  [2]=>
  NULL
}
-- anonymous function with NULL body --
array(3) {
  [0]=>
  NULL
  [1]=>
  NULL
  [2]=>
  NULL
}
-- passing NULL as 'arr1' --

Warning: array_map(): Argument #2 should be an array in %s on line %d
NULL
Done
