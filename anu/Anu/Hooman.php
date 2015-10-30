<?php

namespace Anu;

class Hooman
{
    /**
     * Hooman Name
     *
     * @var string
     */
    protected $name = '';

    /**
     * Organs
     *
     * @var array
     */
    protected $organs = [];

    /**
     * __construct
     *
     * @param string $name Hooman Name
     *
     * @return void
     */
    public function __construct($name)
    {
        dump('__constructing '.$name);

        $this->name = $name;

        $this->organs = $this->query($name);
    }

    public function query($name)
    {
        return [
            'hands' => 2,
            'feet' => 2,
            'eyes' => 2,
            'face' => 1,
            'neck' => 1,
            'anu' => 1,
        ];
    }


    /**
     * __destruct
     *
     * @return void
     */
    public function __destruct()
    {
        dump('__destructing '.$this->name);
    }

    /**
     * __isset
     *
     * @param  string $name
     *
     * @return bool
     */
    public function __isset($name)
    {
        dump('__isset called, searching organ '.$name);

        return isset($this->organs[$name]);
    }

    /**
     * __unset
     *
     * @param string $name
     *
     * @return void
     */
    public function __unset($name)
    {
        dump('__unset called, unsetting organ '.$name);

        unset($this->organs[$name]);
    }

    public function __get($name)
    {
        return (isset($this->organs[$name])) ? $this->organs[$name] : null;
    }

    public function __set($name, $value)
    {
        $this->organs[$name] = $value;
    }

    public function __sleep()
    {
        return ['name', 'organs'];
    }

    public function __wakeup()
    {
        $this->organs = $this->query($this->name) + [
            'hairs' => 1
        ];
    }

    public function __toString()
    {
        return json_encode($this->organs);
    }

    public function __call($name, $arguments)
    {
        dump($name, $arguments);
    }

    public static function __callStatic($name, $arguments)
    {
        dump($name, $arguments);
    }

    public static function model($name)
    {
        return new static($name);
    }
}
