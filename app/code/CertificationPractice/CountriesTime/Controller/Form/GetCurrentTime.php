<?php
declare(strict_types=1);

namespace CertificationPractice\CountriesTime\Controller\Form;

use CertificationPractice\CountriesTime\Helper\Logger;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\App\Action\HttpPostActionInterface;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\Stdlib\DateTime\TimezoneInterface;
use Magento\Framework\Controller\Result\JsonFactory;

class GetCurrentTime implements HttpPostActionInterface, HttpGetActionInterface
{
    /**
     * @var ResultFactory
     */
    protected $resultFactory;

    /**
     * @var RequestInterface
     */
    protected $request;

    /**
     * @var TimezoneInterface
     */
    protected $timezone;

    /**
     * @var Logger
     */
    protected $logger;

    /**
     * @var JsonFactory
     */
    protected $jsonFactory;

    /**
     * @param ResultFactory $resultFactory
     * @param RequestInterface $request
     * @param TimezoneInterface $timezone
     * @param JsonFactory $jsonFactory
     * @param Logger $logger
     */
    public function __construct(
        ResultFactory     $resultFactory,
        RequestInterface  $request,
        TimezoneInterface $timezone,
        JsonFactory $jsonFactory,
        Logger $logger
    ) {
        $this->resultFactory = $resultFactory;
        $this->request = $request;
        $this->timezone = $timezone;
        $this->jsonFactory = $jsonFactory;
        $this->logger = $logger;
    }

    /**
     * @ingeritdoc
     */
    public function execute()
    {
        $resultJson = $this->jsonFactory->create();
        $params = $this->request->getParams();
        $date = new \DateTime("now", new \DateTimeZone($params['data']));
        $this->logger->logAction($date);
        return $resultJson->setData(['current_time' => $date->format('Y-m-d H:i:s')]);
    }
}
