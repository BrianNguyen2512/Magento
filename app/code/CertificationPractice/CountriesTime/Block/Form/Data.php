<?php
declare(strict_types=1);

namespace CertificationPractice\CountriesTime\Block\Form;

use Magento\Directory\Model\CountryFactory;
use Magento\Framework\Stdlib\DateTime\TimezoneInterface;
use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use Magento\Framework\Locale\ListsInterface;

class Data extends Template
{
    /**
     * @var TimezoneInterface
     */
    protected TimezoneInterface $timezone;

    /**
     * @var CountryFactory
     */
    protected $countryFactory;

    /**
     * @var array
     */
    protected $countryCode;

    /**
     * @var ListsInterface
     */
    protected $lists;

    /**
     * @param Context $context
     * @param TimezoneInterface $timezone
     * @param CountryFactory $countryFactory
     * @param ListsInterface $lists
     * @param array $countryCode
     * @param array $data
     */
    public function __construct(
        Template\Context $context,
        TimezoneInterface $timezone,
        CountryFactory $countryFactory,
        ListsInterface $lists,
        array $countryCode = [],
        array $data = []
    ) {
        $this->timezone = $timezone;
        $this->countryFactory = $countryFactory;
        $this->countryCode = $countryCode;
        $this->lists = $lists;
        parent::__construct($context, $data);
    }

    public function getCountryCode()
    {
        $date = new \DateTime("now", new \DateTimeZone('America/New_York'));
        return $this->lists->getOptionTimezones();
    }
}
