<?php
// Given a string of round, curly, and square open and closing brackets, return whether the brackets are balanced (well-formed).
// For example, given the string "([])[]({})", you should return true.
// Given the string "([)]" or "((()", you should return false.
function isBalanced(string $s): bool{
    $string_length = strlen($s);
    if ($string_length <= 1) return false;
    $stack = new SplStack();

    for ($i = 0; $i < $string_length; $i ++){

        if ($s[$i] === '[' || $s[$i] === '{' || $s[$i] === '(' ){
            $stack->push($s[$i]);
            continue;
        }

        if(!$stack->isEmpty()){
            $last = $stack->top();
            if(($last === '(' && $s[$i] === ')') || ($last === '[' && $s[$i] === ']') || ($last === '{' && $s[$i] === '}')){
                $stack->pop();
            }
        }
        
    }

    return $stack->isEmpty();
}

echo isBalanced('([)]');
echo isBalanced('((()');
echo isBalanced('([])[]({})');
exit;
