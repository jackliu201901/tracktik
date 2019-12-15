<?php
/**
 * @class         Class ElectronicItems
 * @brief         ElectronicItems
 *
 * @author        jack.Liu
 * @copyright (C) tracktik.com
 * @version       1.0
 * @date          2019-12-14
 */
    require ("ElectronicItem.php");

    class ElectronicItems extends ElectronicItem
    {
        /**
         * items array
         * @array
         */
        private $items = array();

        /**
         * @function  __construct
         * @brief  get this->items;
         *
         * @author        jack.Liu
         * @version       1.0
         * @date          2019-12-14
         */
        public function __construct(array $items)
        {
            $this->items = $items;
        }

        /**
         * @function  cutNoUseItem
         * @brief  cut no use item
         *
         * @author        jack.Liu
         * @version       1.0
         * @date          2019-12-14
         */
        public function cutNoUseItem()
        {
            foreach ($this->items as $key => $item)
            {
                if(parent::checkItemsByType($item['type']) == false)
                {
                    unset($this->items[$key]);
                }
            }
        }

        /**
         * @function  checkMaxExtras
         * @brief  check Max Extras
         *
         * @author        jack.Liu
         * @version       1.0
         * @date          2019-12-14
         */
        public function checkMaxExtras()
        {
            foreach ($this->items as $item) {

                $number = 0;
                if (array_key_exists('remote_controllers', $item))
                    $number = $item['remote_controllers'];

                if (array_key_exists('wired_controllers', $item))
                    $number +=  $item['wired_controllers'];

                if (parent::maxExtras($item['type'], $number) == false)
                {
                    exit("Sorry, the number of extras of " . $item['type']. " that cost " . $item['price'] . " has more than the limit !");
                }
            }
        }

        /**
         * @function  getSortedItems
         * @param String $key
         * @return array
         * @brief  get Sorted Items by one key
         *
         * @author        jack.Liu
         * @version       1.0
         * @date          2019-12-14
         */
        public function getSortedItems($key)
        {
           array_multisort(array_column($this->items, $key), SORT_ASC, $this->items);
           return $this->items;
        }

        /**
         * @function  getSumPrice
         * @return Integer
         * @brief  >output the total pricing
         *
         * @author        jack.Liu
         * @version       1.0
         * @date          2019-12-14
         */
        public function getSumPrice()
        {
            $sumPrice = 0;
            foreach ($this->items as $item) {
                $sumPrice += $item['price'];
            }
            return $sumPrice;
        }

        /**
         * @function  getItemPrice
         * @param String $type
         * @return Integer
         * @brief  get one Item Price
         *
         * @author        jack.Liu
         * @version       1.0
         * @date          2019-12-14
         */
        public function getItemPrice($type)
        {
            foreach ($this->items as $item) {
                if ($item['type'] == $type)
                    return $item['price'];
            }
            return false;
        }
    }
