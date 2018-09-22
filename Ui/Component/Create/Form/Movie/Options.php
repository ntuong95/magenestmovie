<?php
/**
 * Created by PhpStorm.
 * User: tuong-linux
 * Date: 22/09/2018
 * Time: 11:26
 */
namespace Magenest\Movie\Ui\Component\Create\Form\Movie;

use Magento\Framework\Data\OptionSourceInterface;
use Magenest\Movie\Model\ResourceModel\Director\CollectionFactory as DirectorCollectionFactory;
use Magento\Framework\App\RequestInterface;

class Options implements OptionSourceInterface{
    protected $directorCollectionFactory;

    protected $request;

    public function __construct(
        DirectorCollectionFactory $directorCollectionFactory,
        RequestInterface $request
    ) {
        $this->directorCollectionFactory = $directorCollectionFactory;
        $this->request = $request;
    }

    public function toOptionArray()
    {
        $array = [];
        $collection = $this->directorCollectionFactory->create();
        foreach ($collection as $director) {
            $array[] = ['value' => $director->getId(), 'label' => $director->getName()];
        }
        return $array;
    }
}