<?php

namespace App\Parser\Method;


class Base
{
    const METHOD = '';

    public function __call($method, $arguments)
    {
        if (count($arguments) < 1) {
            throw new \Exception('Указано неверное число аргументов');
        }

        if (!in_array($prefix = substr($method, 0, 3), ['get', 'set'])) {
            throw new \Exception('Указано неверное название метода');
        }

        if (!property_exists($this, $property = lcfirst(substr($method, 3)))) {
            throw new \Exception('Нет такого поля');
        }


       if( $prefix === 'get'){
           return $this->$property;
       }
       elseif($prefix === 'set'){
           $this->$property = is_array($arguments[0]) ? implode(',', $arguments[0]) : (string) $arguments[0];
           return $this;
       }
    }

    public function getProperties()
    {
        return get_object_vars($this);
    }


}