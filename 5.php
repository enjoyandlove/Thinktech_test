<?php

interface FruitContainer {
	public function addFruit($fruit);
	public function getFruitCount();
	public function getRemainingSpace();
}

interface Strainer {
	public function extractJuice($apple);
}

abstract class Fruit {
  protected $color;
	protected $volume;
	
	public function getColor() {
		return $this->color;
	}

	public function setColor($color) {
		$this->color = $color;
	}

	public function getVolume() {
		return $this->volume;
	}

	public function setVolume($volume) {
		$this->volume = $volume;
	}
}

class Apple extends Fruit {
	protected $isWormy;

	public function getIsWormy() {
		return $this->isWormy;
	}

	public function setIsWormy($isWormy) {
		$this->isWormy = $isWormy;
	}
}

class FruitContainerImp implements FruitContainer {
	protected $capacity;
	protected $fruits;

	public function addFruit($fruit) {
		array_push($this->fruits, $fruit);
	}

	public function getFruitCount() {
		return sizeof($this->fruits);
	}

	public function getRemainingSpace() {
		$total = array_reduce($this->fruits, function($res, $val) { return $res + $val->getVolume(); }, 0);
		return $this->capacity - $total;
	}

	public function getCapacity() {
		return $this->capacity;
	}

	public function setCapacity($capacity) {
		$this->capacity = $capacity;
	}

	public function getFruits() {
		return $this->fruits;
	}

	public function setFruits($fruits) {
		$this->fruits = $fruits;
	}
}

class StrainerImp implements Strainer {
	protected $juice;
	protected $juiceCount;

	public function extractJuice($apple) {
		$this->juice = $this->juice + ($apple->getIsWormy() ? 0 : $apple->getVolume());
		$this->juiceCount += $apple->getIsWormy() ? 0 : 1;
	}

	public function getJuice() {
		return $this->juice;
	}

	public function setJuice($juice) {
		$this->juice = $juice;
	}

	public function getJuiceCount() {
		return $this->juiceCount;
	}

	public function setJuiceCount($juiceCount) {
		$this->fruits = $juiceCount;
	}
}

$fruitcontainer = new FruitContainerImp();
$fruitcontainer->setCapacity(1000);

echo "Total FruitContainer Capacity: " . 1000;
echo "<br>";

$fruitcontainer->setFruits([]);
$strainerimp = new StrainerImp();
$strainerimp->setJuice(0);
$strainerimp->setJuiceCount(0);

$colors = ["red", "green", "blue"];
for($i=0; $i<100; $i++) {
	$apple = new Apple();
	$apple->setColor($colors[rand(0,2)]);
	$apple->setVolume(rand(1, 10));
	$apple->setIsWormy(rand(0, 1));

	echo "Color: " . $apple->getColor() . ", Volume: " . $apple->getVolume() . ", isWormy: " . $apple->getIsWormy();
	echo "<br>";

	$fruitcontainer->addFruit($apple);
	$strainerimp->extractJuice($apple);
	print_r($fruitcontainer->getRemainingSpace());
	echo "<br>";
	print_r($strainerimp->getJuice());
	echo "<br>";
	print_r($strainerimp->getJuiceCount());
	echo "<br>";
}

print_r("All actions have been completed");
?>