<?php
declare(strict_types=1);

namespace CertificationPractice\CountriesTime\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Framework\App\Helper\Context;
use Psr\Log\LoggerInterface;

class Logger extends AbstractHelper
{
    /**
     * @var LoggerInterface
     */
    protected $logger;

    /**
     * @param Context $context
     * @param LoggerInterface $logger
     */
    public function __construct(
        Context         $context,
        LoggerInterface $logger
    ) {
        parent::__construct($context);
        $this->logger = $logger;
    }

    /**
     * @param $currenttime
     * @return void
     */
    public function logAction($currenttime)
    {
        $this->logger->info(
            __('Current Time'),
            ['json' => $currenttime]
        );
    }
}
