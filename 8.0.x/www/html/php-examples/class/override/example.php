<?php

class BaseClass
{
    protected ?string $name;

    public function __construct(
        string $name
    )
    {
        $this->name = $name;
    }

    public function sayHallo(): void
    {
        echo "\n<br>" . __METHOD__ . "/Hello, {$this->name}!";
    }
    public function sayHalloToMany(
        ...$names
    ): void
    {
        $namesString = implode(', ', $names);
        echo "\n<br>" . __METHOD__ . "/Hello, [{$namesString}]!";
    }
}

class ChildClass
    extends BaseClass
{
    public function sayHallo(
        ?string $name = null
    ): void
    {
        $name ??= $this->name;
        echo "\n<br>" . __METHOD__ . "/Hello, {$name}!";
    }
}


class WrongChildClass
    extends BaseClass
{
    /**
     * @ERROR Fatal error: Declaration of WrongChildClass::sayHallo(string $name): void must be compatible with BaseClass::sayHallo()
     * Родительский метод не имеет параметров. Для совместимости с родительским методом, нужно пометить все аргументы, как необязательные
     */
/*
    public function sayHallo(
        string $name
    ): void
    {
        $name ??= $this->name;
        echo "\n<br>" . __METHOD__ . "/Hello, {$name}!";
    }
*/

    /**
     * @ERROR Fatal error: Declaration of WrongChildClass::sayHalloToMany(?string $mainName = null, ...$names): void must be compatible with BaseClass::sayHalloToMany(...$names): void
     * @TODO Разобраться как проделать подобный финт ушами
     */
/*
    public function sayHalloToMany(
        ?string $mainName=null,
                ...$names
    ): void
    {
        $namesString = implode(', ', $names);
        echo "\n<br>" . __METHOD__ . "/Hello, {$mainName}. Your friends is [{$namesString}]!";
    }
*/
}


$base = new BaseClass('Tom');
$base->sayHallo();
$base->sayHalloToMany('Bred', 'Pit', 'Oleg');

$child = new ChildClass('Tom');
$child->sayHallo();
$child->sayHallo('Maria');

/* expected:
BaseClass::sayHallo/Hello, Tom!
BaseClass::sayHalloToMany/Hello, [Bred, Pit, Oleg]!
ChildClass::sayHallo/Hello, Tom!
ChildClass::sayHallo/Hello, Maria!
*/