<?php

namespace Sam\Rtb\Command\Concrete\Hybrid;

use Sam\Rtb\Hybrid\HelpersAwareTrait;
use Sam\Rtb\Command\Helper\Hybrid\HybridRtbCommandHelperAwareTrait;

/**
 * Class GoToLot
 * @package Sam\Rtb\Command\Concrete\Hybrid
 */
class GoToLot extends \Sam\Rtb\Command\Concrete\Base\GoToLot
{
    use HelpersAwareTrait;
    use HybridRtbCommandHelperAwareTrait;

    /**
     * @return static
     */
    public static function new(): static
    {
        return parent::_new(self::class);
    }

    /**
     */
    public function execute(): void
    {
        parent::execute();
        $this->getTimeoutHelper()->updateLotEndDate($this->getRtbCurrent(), $this->detectModifierUserId());
        $this->getResponseHelper()->applyAdditionalInfo($this);
    }
}