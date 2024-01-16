<?php

namespace BicicletasMilan\Helpdesk\Model\Ticket\Grid;

class Status implements \Magento\Framework\Option\ArrayInterface
{
	public function toOptionArray()
	{
		return \BicicletasMilan\Helpdesk\Model\Ticket::getStatusesOptionArray();
	}
}