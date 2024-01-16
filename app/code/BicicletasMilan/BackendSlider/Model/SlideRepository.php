<?php

namespace BicicletasMilan\BackendSlider\Model;

use Magento\Framework\Api\DataObjectHelper;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Reflection\DataObjectProcessor;


class SlideRepository implements \BicicletasMilan\BackendSlider\Api\SlideRepositoryInterface
{
    /**
    * @var \BicicletasMilan\BackendSlider\Model\ResourceModel\Slide
    */
    protected $resource;

    /**
    * @var \BicicletasMilan\BackendSlider\Model\SlideFactory
    */
    protected $slideFactory;

    /**
    * @var \BicicletasMilan\BackendSlider\Model\ResourceModel\Slide\CollectionFactory
    */
    protected $slideCollectionFactory;

    /**
    * @var \Magento\Framework\Api\SearchResultsInterface
    */
    protected $searchResultsFactory;

    /**
    * @var \Magento\Framework\Api\DataObjectHelper
    */
    protected $dataObjectHelper;

    /**
    * @var \Magento\Framework\Reflection\DataObjectProcessor
    */
    protected $dataObjectProcessor;

    /**
    * @var \BicicletasMilan\BackendSlider\Api\Data\SlideInterfaceFactory
    */
    protected $dataSlideFactory;

    /**
    * @param ResourceModel\Slide $resource
    * @param SlideFactory $slideFactory
    * @param ResourceModel\Slide\CollectionFactory $slideCollectionFactory
    * @param \Magento\Framework\Api\SearchResultsInterface $searchResultsFactory
    * @param DataObjectHelper $dataObjectHelper
    * @param DataObjectProcessor $dataObjectProcessor
    * @param \BicicletasMilan\BackendSlider\Api\Data\SlideInterfaceFactory $dataSlideFactory
    */
    public function __construct(
        \BicicletasMilan\BackendSlider\Model\ResourceModel\Slide $resource,
        \BicicletasMilan\BackendSlider\Model\SlideFactory $slideFactory,
        \BicicletasMilan\BackendSlider\Model\ResourceModel\Slide\CollectionFactory $slideCollectionFactory,
        \Magento\Framework\Api\SearchResultsInterface $searchResultsFactory,
        \Magento\Framework\Api\DataObjectHelper $dataObjectHelper,
        \Magento\Framework\Reflection\DataObjectProcessor $dataObjectProcessor,
        \BicicletasMilan\BackendSlider\Api\Data\SlideInterfaceFactory $dataSlideFactory
    )
    {
        $this->resource = $resource;
        $this->slideFactory = $slideFactory;
        $this->slideCollectionFactory = $slideCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        $this->dataObjectProcessor = $dataObjectProcessor;
        $this->dataSlideFactory = $dataSlideFactory;
    }

    /**
    * Retrieve slide entity.
    *
    * @api
    * @param int $slideId
    * @return \BicicletasMilan\BackendSlider\Api\Data\SlideInterface
    * @throws \Magento\Framework\Exception\NoSuchEntityException If slide with the specified ID does not exist.
    * @throws \Magento\Framework\Exception\LocalizedException
    */
    public function getById($slideId)
    {
        $slide = $this->slideFactory->create();
        $this->resource->load($slide, $slideId);
        if (!$slide->getId()) {
            throw new NoSuchEntityException(__('Slide with id %1 does not exist.', $slideId));
        }

        return $slide;
    }    

    /**
    * Save slide.
    *
    * @param \BicicletasMilan\BackendSlider\Api\Data\SlideInterface $slide
    * @return \BicicletasMilan\BackendSlider\Api\Data\SlideInterface
    * @throws \Magento\Framework\Exception\LocalizedException
    */
    public function save(\BicicletasMilan\BackendSlider\Api\Data\SlideInterface $slide)
    {
        try {
            $this->resource->save($slide);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__($exception->getMessage()));
        }
 
        return $slide;
    }

 /**
    * Retrieve slides matching the specified criteria.
    *
    * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
    * @return \Magento\Framework\Api\SearchResultsInterface
    * @throws \Magento\Framework\Exception\LocalizedException
    */
    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria)
    {
        
        $this->searchResultsFactory->setSearchCriteria($searchCriteria);
        $collection = $this->slideCollectionFactory->create();

        foreach ($searchCriteria->getFilterGroups() as $filterGroup) {
            foreach ($filterGroup->getFilters() as $filter) {
                $condition = $filter->getConditionType() ?: 'eq';
                $collection->addFieldToFilter($filter->getField(),[$condition => $filter->getValue()]);
            }
        }

        $this->searchResultsFactory->setTotalCount($collection->getSize());
        $sortOrders = $searchCriteria->getSortOrders();

        if ($sortOrders) {
            foreach ($sortOrders as $sortOrder) {
                $collection->addOrder($sortOrder->getField(),(strtoupper($sortOrder->getDirection()) === 'ASC') ? 'ASC' : 'DESC');
            }
        }

        $collection->setCurPage($searchCriteria->getCurrentPage());
        $collection->setPageSize($searchCriteria->getPageSize());
        $slides = [];

        
        foreach ($collection as $slideModel) {
            $slideData = $this->dataSlideFactory->create();
            $this->dataObjectHelper->populateWithArray(
                $slideData,
                $slideModel->getData(),
                '\BicicletasMilan\BackendSlider\Api\Data\SlideInterface'
            );

            $slides[] = $this->dataObjectProcessor->buildOutputDataArray($slideData,'\BicicletasMilan\BackendSlider\Api\Data\SlideInterface');
        }

        $this->searchResultsFactory->setItems($slides);
        return $this->searchResultsFactory;                
    }

    /**
    * Delete Slide
    *
    * @param \BicicletasMilan\BackendSlider\Api\Data\SlideInterface $slide
    * @return bool
    * @throws CouldNotDeleteException
    */
    public function delete(\BicicletasMilan\BackendSlider\Api\Data\SlideInterface $slide)
    {
        try {
            $this->resource->delete($slide);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__($exception->getMessage()));
        }

        return true;
    }
    
    /**
    * Delete slide by ID.
    *
    * @param int $slideId
    * @return bool true on success

    * @throws \Magento\Framework\Exception\NoSuchEntityException
    * @throws \Magento\Framework\Exception\LocalizedException
    */
    public function deleteById($slideId)
    {
        return $this->delete($this->getById($slideId));
    }
}