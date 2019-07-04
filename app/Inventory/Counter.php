<?php

namespace App\Inventory;

use App\Repositories\TransactionRepository;

class Counter
{
	protected $repository;

	public function __construct( TransactionRepository $repository ) {
		$this->repository = $repository;
	}

	/**
	 * @return int
	 */
	public function countTotalQuantity() {
		// todo return an integer representing the amount of items (quantity) left from the Repository.
		
		$data = $this->repository->get();

		$quantity = $data->sum('quantity');
		return $quantity;
	}

	/**
	 * @param int $quantity
	 *
	 * @return double
	 */
	public function calculateCostPrice( $quantity = 10 ) {
		// todo return an double representing the cost price for $quantity.
		$data = $this->repository->get();

		$items = $data->sum('quantity');
		$tvalue = 0;
		foreach ($data as $dat) {
			$value = $dat['quantity']*$dat['unit_cost_price'];
			$tvalue += $value;
		}

		$costprice = ($tvalue/$items)*$quantity;

		return $costprice;
	}

	/**
	 * @return double
	 */
	public function calculateTotalValue() {
		// todo return an double representing the value of all transactions.
		$data = $this->repository->get();
		$tvalue = 0;
		foreach ($data as $dat) {
			$value = $dat['quantity']*$dat['unit_cost_price'];
			$tvalue += $value;
		}

		
		return $tvalue;
	}
}