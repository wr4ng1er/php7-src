--TEST--
Exceptions on improper access to static class properties
--FILE--
<?php
class C {
	static private $p = 0;
}

try {
	var_dump(C::$a);
} catch (EngineException $e) {
	echo "\nException: " . $e->getMessage() . " in " , $e->getFile() . " on line " . $e->getLine() . "\n";
}

try {
	var_dump(C::$p);
} catch (EngineException $e) {
	echo "\nException: " . $e->getMessage() . " in " , $e->getFile() . " on line " . $e->getLine() . "\n";
}

try {
	unset(C::$a);
} catch (EngineException $e) {
	echo "\nException: " . $e->getMessage() . " in " , $e->getFile() . " on line " . $e->getLine() . "\n";
}

var_dump(C::$a);
?>
--EXPECTF--
Exception: Access to undeclared static property: C::$a in %sexception_013.php on line 7

Exception: Cannot access private property C::$p in %sexception_013.php on line 13

Exception: Attempt to unset static property C::$a in %sexception_013.php on line 19

Fatal error: Access to undeclared static property: C::$a in %sexception_013.php on line 24
