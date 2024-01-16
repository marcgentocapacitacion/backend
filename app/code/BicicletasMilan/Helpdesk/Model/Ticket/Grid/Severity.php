<?php

namespace BicicletasMilan\Helpdesk\Model\Ticket\Grid;

class Severity implements \Magento\Framework\Option\ArrayInterface
{
	public function toOptionArray()
	{
		return \BicicletasMilan\Helpdesk\Model\Ticket::getSeveritiesOptionArray();
	}
}