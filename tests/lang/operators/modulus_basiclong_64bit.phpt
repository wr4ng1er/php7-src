--TEST--
Test % operator : 64bit long tests
--SKIPIF--
<?php
if (PHP_INT_SIZE != 8) die("skip this test is for 64bit platform only");
?>
--FILE--
<?php
 
define("MAX_64Bit", 9223372036854775807);
define("MAX_32Bit", 2147483647);
define("MIN_64Bit", -9223372036854775807 - 1);
define("MIN_32Bit", -2147483647 - 1);

$longVals = array(
    MAX_64Bit, MIN_64Bit, MAX_32Bit, MIN_32Bit, MAX_64Bit - MAX_32Bit, MIN_64Bit - MIN_32Bit,
    MAX_32Bit + 1, MIN_32Bit - 1, MAX_32Bit * 2, (MAX_32Bit * 2) + 1, (MAX_32Bit * 2) - 1, 
    MAX_64Bit -1, MAX_64Bit + 1, MIN_64Bit + 1, MIN_64Bit - 1
);

$otherVals = array(0, 1, -1, 7, 9, 65, -44, MAX_32Bit, MAX_64Bit);

error_reporting(E_ERROR);

foreach ($longVals as $longVal) {
   foreach($otherVals as $otherVal) {
	  echo "--- testing: $longVal % $otherVal ---\n";
	  try {
	    var_dump($longVal%$otherVal);
      } catch (Exception $e) {
        echo "Exception: " . $e->getMessage() . "\n";
      }
   }
}

foreach ($otherVals as $otherVal) {
   foreach($longVals as $longVal) {
	  echo "--- testing: $otherVal % $longVal ---\n";
	  try {
        var_dump($otherVal%$longVal);
      } catch (Exception $e) {
        echo "Exception: " . $e->getMessage() . "\n";
      }
   }
}
   
?>
===DONE===
--EXPECT--
--- testing: 9223372036854775807 % 0 ---
Exception: Division by zero
--- testing: 9223372036854775807 % 1 ---
int(0)
--- testing: 9223372036854775807 % -1 ---
int(0)
--- testing: 9223372036854775807 % 7 ---
int(0)
--- testing: 9223372036854775807 % 9 ---
int(7)
--- testing: 9223372036854775807 % 65 ---
int(7)
--- testing: 9223372036854775807 % -44 ---
int(7)
--- testing: 9223372036854775807 % 2147483647 ---
int(1)
--- testing: 9223372036854775807 % 9223372036854775807 ---
int(0)
--- testing: -9223372036854775808 % 0 ---
Exception: Division by zero
--- testing: -9223372036854775808 % 1 ---
int(0)
--- testing: -9223372036854775808 % -1 ---
int(0)
--- testing: -9223372036854775808 % 7 ---
int(-1)
--- testing: -9223372036854775808 % 9 ---
int(-8)
--- testing: -9223372036854775808 % 65 ---
int(-8)
--- testing: -9223372036854775808 % -44 ---
int(-8)
--- testing: -9223372036854775808 % 2147483647 ---
int(-2)
--- testing: -9223372036854775808 % 9223372036854775807 ---
int(-1)
--- testing: 2147483647 % 0 ---
Exception: Division by zero
--- testing: 2147483647 % 1 ---
int(0)
--- testing: 2147483647 % -1 ---
int(0)
--- testing: 2147483647 % 7 ---
int(1)
--- testing: 2147483647 % 9 ---
int(1)
--- testing: 2147483647 % 65 ---
int(62)
--- testing: 2147483647 % -44 ---
int(23)
--- testing: 2147483647 % 2147483647 ---
int(0)
--- testing: 2147483647 % 9223372036854775807 ---
int(2147483647)
--- testing: -2147483648 % 0 ---
Exception: Division by zero
--- testing: -2147483648 % 1 ---
int(0)
--- testing: -2147483648 % -1 ---
int(0)
--- testing: -2147483648 % 7 ---
int(-2)
--- testing: -2147483648 % 9 ---
int(-2)
--- testing: -2147483648 % 65 ---
int(-63)
--- testing: -2147483648 % -44 ---
int(-24)
--- testing: -2147483648 % 2147483647 ---
int(-1)
--- testing: -2147483648 % 9223372036854775807 ---
int(-2147483648)
--- testing: 9223372034707292160 % 0 ---
Exception: Division by zero
--- testing: 9223372034707292160 % 1 ---
int(0)
--- testing: 9223372034707292160 % -1 ---
int(0)
--- testing: 9223372034707292160 % 7 ---
int(6)
--- testing: 9223372034707292160 % 9 ---
int(6)
--- testing: 9223372034707292160 % 65 ---
int(10)
--- testing: 9223372034707292160 % -44 ---
int(28)
--- testing: 9223372034707292160 % 2147483647 ---
int(1)
--- testing: 9223372034707292160 % 9223372036854775807 ---
int(9223372034707292160)
--- testing: -9223372034707292160 % 0 ---
Exception: Division by zero
--- testing: -9223372034707292160 % 1 ---
int(0)
--- testing: -9223372034707292160 % -1 ---
int(0)
--- testing: -9223372034707292160 % 7 ---
int(-6)
--- testing: -9223372034707292160 % 9 ---
int(-6)
--- testing: -9223372034707292160 % 65 ---
int(-10)
--- testing: -9223372034707292160 % -44 ---
int(-28)
--- testing: -9223372034707292160 % 2147483647 ---
int(-1)
--- testing: -9223372034707292160 % 9223372036854775807 ---
int(-9223372034707292160)
--- testing: 2147483648 % 0 ---
Exception: Division by zero
--- testing: 2147483648 % 1 ---
int(0)
--- testing: 2147483648 % -1 ---
int(0)
--- testing: 2147483648 % 7 ---
int(2)
--- testing: 2147483648 % 9 ---
int(2)
--- testing: 2147483648 % 65 ---
int(63)
--- testing: 2147483648 % -44 ---
int(24)
--- testing: 2147483648 % 2147483647 ---
int(1)
--- testing: 2147483648 % 9223372036854775807 ---
int(2147483648)
--- testing: -2147483649 % 0 ---
Exception: Division by zero
--- testing: -2147483649 % 1 ---
int(0)
--- testing: -2147483649 % -1 ---
int(0)
--- testing: -2147483649 % 7 ---
int(-3)
--- testing: -2147483649 % 9 ---
int(-3)
--- testing: -2147483649 % 65 ---
int(-64)
--- testing: -2147483649 % -44 ---
int(-25)
--- testing: -2147483649 % 2147483647 ---
int(-2)
--- testing: -2147483649 % 9223372036854775807 ---
int(-2147483649)
--- testing: 4294967294 % 0 ---
Exception: Division by zero
--- testing: 4294967294 % 1 ---
int(0)
--- testing: 4294967294 % -1 ---
int(0)
--- testing: 4294967294 % 7 ---
int(2)
--- testing: 4294967294 % 9 ---
int(2)
--- testing: 4294967294 % 65 ---
int(59)
--- testing: 4294967294 % -44 ---
int(2)
--- testing: 4294967294 % 2147483647 ---
int(0)
--- testing: 4294967294 % 9223372036854775807 ---
int(4294967294)
--- testing: 4294967295 % 0 ---
Exception: Division by zero
--- testing: 4294967295 % 1 ---
int(0)
--- testing: 4294967295 % -1 ---
int(0)
--- testing: 4294967295 % 7 ---
int(3)
--- testing: 4294967295 % 9 ---
int(3)
--- testing: 4294967295 % 65 ---
int(60)
--- testing: 4294967295 % -44 ---
int(3)
--- testing: 4294967295 % 2147483647 ---
int(1)
--- testing: 4294967295 % 9223372036854775807 ---
int(4294967295)
--- testing: 4294967293 % 0 ---
Exception: Division by zero
--- testing: 4294967293 % 1 ---
int(0)
--- testing: 4294967293 % -1 ---
int(0)
--- testing: 4294967293 % 7 ---
int(1)
--- testing: 4294967293 % 9 ---
int(1)
--- testing: 4294967293 % 65 ---
int(58)
--- testing: 4294967293 % -44 ---
int(1)
--- testing: 4294967293 % 2147483647 ---
int(2147483646)
--- testing: 4294967293 % 9223372036854775807 ---
int(4294967293)
--- testing: 9223372036854775806 % 0 ---
Exception: Division by zero
--- testing: 9223372036854775806 % 1 ---
int(0)
--- testing: 9223372036854775806 % -1 ---
int(0)
--- testing: 9223372036854775806 % 7 ---
int(6)
--- testing: 9223372036854775806 % 9 ---
int(6)
--- testing: 9223372036854775806 % 65 ---
int(6)
--- testing: 9223372036854775806 % -44 ---
int(6)
--- testing: 9223372036854775806 % 2147483647 ---
int(0)
--- testing: 9223372036854775806 % 9223372036854775807 ---
int(9223372036854775806)
--- testing: 9.2233720368548E+18 % 0 ---
Exception: Division by zero
--- testing: 9.2233720368548E+18 % 1 ---
int(0)
--- testing: 9.2233720368548E+18 % -1 ---
int(0)
--- testing: 9.2233720368548E+18 % 7 ---
int(-1)
--- testing: 9.2233720368548E+18 % 9 ---
int(-8)
--- testing: 9.2233720368548E+18 % 65 ---
int(-8)
--- testing: 9.2233720368548E+18 % -44 ---
int(-8)
--- testing: 9.2233720368548E+18 % 2147483647 ---
int(-2)
--- testing: 9.2233720368548E+18 % 9223372036854775807 ---
int(-1)
--- testing: -9223372036854775807 % 0 ---
Exception: Division by zero
--- testing: -9223372036854775807 % 1 ---
int(0)
--- testing: -9223372036854775807 % -1 ---
int(0)
--- testing: -9223372036854775807 % 7 ---
int(0)
--- testing: -9223372036854775807 % 9 ---
int(-7)
--- testing: -9223372036854775807 % 65 ---
int(-7)
--- testing: -9223372036854775807 % -44 ---
int(-7)
--- testing: -9223372036854775807 % 2147483647 ---
int(-1)
--- testing: -9223372036854775807 % 9223372036854775807 ---
int(0)
--- testing: -9.2233720368548E+18 % 0 ---
Exception: Division by zero
--- testing: -9.2233720368548E+18 % 1 ---
int(0)
--- testing: -9.2233720368548E+18 % -1 ---
int(0)
--- testing: -9.2233720368548E+18 % 7 ---
int(-1)
--- testing: -9.2233720368548E+18 % 9 ---
int(-8)
--- testing: -9.2233720368548E+18 % 65 ---
int(-8)
--- testing: -9.2233720368548E+18 % -44 ---
int(-8)
--- testing: -9.2233720368548E+18 % 2147483647 ---
int(-2)
--- testing: -9.2233720368548E+18 % 9223372036854775807 ---
int(-1)
--- testing: 0 % 9223372036854775807 ---
int(0)
--- testing: 0 % -9223372036854775808 ---
int(0)
--- testing: 0 % 2147483647 ---
int(0)
--- testing: 0 % -2147483648 ---
int(0)
--- testing: 0 % 9223372034707292160 ---
int(0)
--- testing: 0 % -9223372034707292160 ---
int(0)
--- testing: 0 % 2147483648 ---
int(0)
--- testing: 0 % -2147483649 ---
int(0)
--- testing: 0 % 4294967294 ---
int(0)
--- testing: 0 % 4294967295 ---
int(0)
--- testing: 0 % 4294967293 ---
int(0)
--- testing: 0 % 9223372036854775806 ---
int(0)
--- testing: 0 % 9.2233720368548E+18 ---
int(0)
--- testing: 0 % -9223372036854775807 ---
int(0)
--- testing: 0 % -9.2233720368548E+18 ---
int(0)
--- testing: 1 % 9223372036854775807 ---
int(1)
--- testing: 1 % -9223372036854775808 ---
int(1)
--- testing: 1 % 2147483647 ---
int(1)
--- testing: 1 % -2147483648 ---
int(1)
--- testing: 1 % 9223372034707292160 ---
int(1)
--- testing: 1 % -9223372034707292160 ---
int(1)
--- testing: 1 % 2147483648 ---
int(1)
--- testing: 1 % -2147483649 ---
int(1)
--- testing: 1 % 4294967294 ---
int(1)
--- testing: 1 % 4294967295 ---
int(1)
--- testing: 1 % 4294967293 ---
int(1)
--- testing: 1 % 9223372036854775806 ---
int(1)
--- testing: 1 % 9.2233720368548E+18 ---
int(1)
--- testing: 1 % -9223372036854775807 ---
int(1)
--- testing: 1 % -9.2233720368548E+18 ---
int(1)
--- testing: -1 % 9223372036854775807 ---
int(-1)
--- testing: -1 % -9223372036854775808 ---
int(-1)
--- testing: -1 % 2147483647 ---
int(-1)
--- testing: -1 % -2147483648 ---
int(-1)
--- testing: -1 % 9223372034707292160 ---
int(-1)
--- testing: -1 % -9223372034707292160 ---
int(-1)
--- testing: -1 % 2147483648 ---
int(-1)
--- testing: -1 % -2147483649 ---
int(-1)
--- testing: -1 % 4294967294 ---
int(-1)
--- testing: -1 % 4294967295 ---
int(-1)
--- testing: -1 % 4294967293 ---
int(-1)
--- testing: -1 % 9223372036854775806 ---
int(-1)
--- testing: -1 % 9.2233720368548E+18 ---
int(-1)
--- testing: -1 % -9223372036854775807 ---
int(-1)
--- testing: -1 % -9.2233720368548E+18 ---
int(-1)
--- testing: 7 % 9223372036854775807 ---
int(7)
--- testing: 7 % -9223372036854775808 ---
int(7)
--- testing: 7 % 2147483647 ---
int(7)
--- testing: 7 % -2147483648 ---
int(7)
--- testing: 7 % 9223372034707292160 ---
int(7)
--- testing: 7 % -9223372034707292160 ---
int(7)
--- testing: 7 % 2147483648 ---
int(7)
--- testing: 7 % -2147483649 ---
int(7)
--- testing: 7 % 4294967294 ---
int(7)
--- testing: 7 % 4294967295 ---
int(7)
--- testing: 7 % 4294967293 ---
int(7)
--- testing: 7 % 9223372036854775806 ---
int(7)
--- testing: 7 % 9.2233720368548E+18 ---
int(7)
--- testing: 7 % -9223372036854775807 ---
int(7)
--- testing: 7 % -9.2233720368548E+18 ---
int(7)
--- testing: 9 % 9223372036854775807 ---
int(9)
--- testing: 9 % -9223372036854775808 ---
int(9)
--- testing: 9 % 2147483647 ---
int(9)
--- testing: 9 % -2147483648 ---
int(9)
--- testing: 9 % 9223372034707292160 ---
int(9)
--- testing: 9 % -9223372034707292160 ---
int(9)
--- testing: 9 % 2147483648 ---
int(9)
--- testing: 9 % -2147483649 ---
int(9)
--- testing: 9 % 4294967294 ---
int(9)
--- testing: 9 % 4294967295 ---
int(9)
--- testing: 9 % 4294967293 ---
int(9)
--- testing: 9 % 9223372036854775806 ---
int(9)
--- testing: 9 % 9.2233720368548E+18 ---
int(9)
--- testing: 9 % -9223372036854775807 ---
int(9)
--- testing: 9 % -9.2233720368548E+18 ---
int(9)
--- testing: 65 % 9223372036854775807 ---
int(65)
--- testing: 65 % -9223372036854775808 ---
int(65)
--- testing: 65 % 2147483647 ---
int(65)
--- testing: 65 % -2147483648 ---
int(65)
--- testing: 65 % 9223372034707292160 ---
int(65)
--- testing: 65 % -9223372034707292160 ---
int(65)
--- testing: 65 % 2147483648 ---
int(65)
--- testing: 65 % -2147483649 ---
int(65)
--- testing: 65 % 4294967294 ---
int(65)
--- testing: 65 % 4294967295 ---
int(65)
--- testing: 65 % 4294967293 ---
int(65)
--- testing: 65 % 9223372036854775806 ---
int(65)
--- testing: 65 % 9.2233720368548E+18 ---
int(65)
--- testing: 65 % -9223372036854775807 ---
int(65)
--- testing: 65 % -9.2233720368548E+18 ---
int(65)
--- testing: -44 % 9223372036854775807 ---
int(-44)
--- testing: -44 % -9223372036854775808 ---
int(-44)
--- testing: -44 % 2147483647 ---
int(-44)
--- testing: -44 % -2147483648 ---
int(-44)
--- testing: -44 % 9223372034707292160 ---
int(-44)
--- testing: -44 % -9223372034707292160 ---
int(-44)
--- testing: -44 % 2147483648 ---
int(-44)
--- testing: -44 % -2147483649 ---
int(-44)
--- testing: -44 % 4294967294 ---
int(-44)
--- testing: -44 % 4294967295 ---
int(-44)
--- testing: -44 % 4294967293 ---
int(-44)
--- testing: -44 % 9223372036854775806 ---
int(-44)
--- testing: -44 % 9.2233720368548E+18 ---
int(-44)
--- testing: -44 % -9223372036854775807 ---
int(-44)
--- testing: -44 % -9.2233720368548E+18 ---
int(-44)
--- testing: 2147483647 % 9223372036854775807 ---
int(2147483647)
--- testing: 2147483647 % -9223372036854775808 ---
int(2147483647)
--- testing: 2147483647 % 2147483647 ---
int(0)
--- testing: 2147483647 % -2147483648 ---
int(2147483647)
--- testing: 2147483647 % 9223372034707292160 ---
int(2147483647)
--- testing: 2147483647 % -9223372034707292160 ---
int(2147483647)
--- testing: 2147483647 % 2147483648 ---
int(2147483647)
--- testing: 2147483647 % -2147483649 ---
int(2147483647)
--- testing: 2147483647 % 4294967294 ---
int(2147483647)
--- testing: 2147483647 % 4294967295 ---
int(2147483647)
--- testing: 2147483647 % 4294967293 ---
int(2147483647)
--- testing: 2147483647 % 9223372036854775806 ---
int(2147483647)
--- testing: 2147483647 % 9.2233720368548E+18 ---
int(2147483647)
--- testing: 2147483647 % -9223372036854775807 ---
int(2147483647)
--- testing: 2147483647 % -9.2233720368548E+18 ---
int(2147483647)
--- testing: 9223372036854775807 % 9223372036854775807 ---
int(0)
--- testing: 9223372036854775807 % -9223372036854775808 ---
int(9223372036854775807)
--- testing: 9223372036854775807 % 2147483647 ---
int(1)
--- testing: 9223372036854775807 % -2147483648 ---
int(2147483647)
--- testing: 9223372036854775807 % 9223372034707292160 ---
int(2147483647)
--- testing: 9223372036854775807 % -9223372034707292160 ---
int(2147483647)
--- testing: 9223372036854775807 % 2147483648 ---
int(2147483647)
--- testing: 9223372036854775807 % -2147483649 ---
int(1)
--- testing: 9223372036854775807 % 4294967294 ---
int(1)
--- testing: 9223372036854775807 % 4294967295 ---
int(2147483647)
--- testing: 9223372036854775807 % 4294967293 ---
int(2147483650)
--- testing: 9223372036854775807 % 9223372036854775806 ---
int(1)
--- testing: 9223372036854775807 % 9.2233720368548E+18 ---
int(9223372036854775807)
--- testing: 9223372036854775807 % -9223372036854775807 ---
int(0)
--- testing: 9223372036854775807 % -9.2233720368548E+18 ---
int(9223372036854775807)
===DONE===
