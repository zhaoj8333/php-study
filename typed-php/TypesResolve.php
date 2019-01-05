<?php


class TypesResolve
{
    
    protected $var;

    public function __construct($var)
    {
        $this->var = $var;
    }

    public function isNumber() : bool
    {
        return is_integer($this->var) or is_float($this->var);
    }

    /**
     * [isNumber1 正则方式判断，字符数字也会判断为true]
     * @return boolean [description]
     */
    // public function isNumber1()
    // {
    //     if (preg_match("#^(-{0,1}[0-9]{1,})$#", $this->var)) {
    //         return true;
    //     }

    //     return false;
    // }

    public function isInteger()
    {
        return is_integer($this->var);
    }

    // public function isInteger1()
    // {
    //     if (!is_scalar($this->var) || is_bool($val)) {
    //         return false;
    //     }

    //     if (is_float($this->val + 0) && ($this->val + 0) > PHP_INT_MAX) {
    //         return false;
    //     }

    //     return is_float($val) ? false : preg_match("~/^((:?+|-)?[0-9]+)$~", $this->var);
    // }

    public function isBool() : bool
    {
        return is_bool($this->var);
    }

    public function isNull() : bool
    {
        return is_null($this->var);
    }

    public function isResource() : bool
    {
        return is_resource($this->var);
    }

    public function isArray() : bool
    {
        return is_array($this->var);
    }

    public function isString() : bool
    {
        return is_string($this->var);
    }

    public function isObject() : bool
    {
        return is_object($this->var) && !$this->isFunction();
    }

    public function isCallable($object = null) : bool
    {
        if (is_object($object)) {
            return is_callable([$object, $this->var]);
        }

        return is_callable($this->var);
    }

    public function isFunction() : bool
    {
        return is_callable($this->var) and is_object($this->var);
    }

    public function isExpression() : bool
    {
        $isNotFalse = @preg_match($this->var, "") !== false;
        $hasNoError = preg_last_error() === PREG_NO_ERROR;

        return $isNotFalse and $hasNoError;
    }

    public function getVarType() : string
    {
        $functions = [
            'isNumber'   => 'number',
            'isBool'       => 'boolean',
            'isNull'       => 'null',
            'isObject'     => 'object',
            'isFunction'   => 'function',
            'isExpression' => 'expression',
            'isString'     => 'string',
            'isResource'   => 'resource',
            'isArray'      => 'array',
        ];

        $result = 'unknown';

        foreach ($functions as $function => $type) {
            if ($this->$function($this->var)) {
                $result = $type;
                break;
            }
        }

        return $result;
    }
}


$type = new TypesResolve(new stdClass());

var_dump($type->getVarType());
// var_dump(gettype('|aaa|'));

// var_dump($type->isExpression());
// var_dump($type->isString());
