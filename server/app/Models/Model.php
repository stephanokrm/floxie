<?php

namespace Floxie\Models;

abstract class Model implements \JsonSerializable {

    protected $id;

    public function __get($name) {
        return $this->$name;
    }

    public function __set($name, $value) {
        $this->$name = $value;
    }

    public function jsonSerialize() {
        return get_object_vars($this);
    }

}
