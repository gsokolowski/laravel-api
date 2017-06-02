<?php
namespace Acme\Transformers;

/*
 * Class Transformer
 * @package Acme\Transformers
 Make it generic abstract class Transformer so other extended subclasses will have structure to extend from
 */


abstract class Transformer {

    public function transformCollection(array $items) {

        // array_map() function sends each value of an array $lessons->toArray() to function transform()
        // It then walks through the elements in the array $lessons->toArray() .
        // For each element, it calls your function transform()
        // with the element's value, and your callback function
        // needs to return the new value to use for the element.
        // call a method transform() on array_map
        return array_map( [$this, 'transform'], $items);
    }

    // every subclass will offer transform method then you need to add definition of this method to abstract class
    // so extended class will be forced to implement it
    public abstract function transform($item);


}