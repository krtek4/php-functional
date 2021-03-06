<?php
namespace Monad\Maybe;

use Common;
use Monad;
use Functor;
use FantasyLand;
use Applicative;

class Just implements Maybe
{
    use Common\PointedTrait;

    const of = 'Monad\Maybe\Just::of';

    /**
     * @inheritdoc
     */
    public function ap(FantasyLand\Apply $applicative)
    {
        return $applicative->map($this->value);
    }

    /**
     * @inheritdoc
     */
    public function map(callable $transformation)
    {
        return self::of($this->bind($transformation));
    }

    /**
     * @inheritdoc
     */
    public function bind(callable $transformation)
    {
        return call_user_func($transformation, $this->value);
    }

    /**
     * @inheritdoc
     */
    public function orElse(callable $fn)
    {
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function extract()
    {
        return $this->value;
    }
}
