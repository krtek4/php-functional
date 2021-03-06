<?php
namespace Monad\Either;

use Common;
use FantasyLand;

class Left implements Either
{
    use Common\PointedTrait;
    use Common\ValueOfTrait;

    const of = 'Monad\Either\Left::of';

    /**
     * @inheritdoc
     */
    public function ap(FantasyLand\Apply $b)
    {
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function map(callable $transformation)
    {
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function bind(callable $transformation)
    {
        // Don't do anything
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function either(callable $left, callable $right)
    {
        return call_user_func($left, $this->value);
    }
}
