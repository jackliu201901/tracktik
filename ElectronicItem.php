<?php
    /**
     * @class         Class ElectronicItem
     * @brief         ElectronicItem
     *
     * @author        jack.Liu
     * @copyright (C) tracktik.com
     * @version       1.0
     * @date          2019-12-14
     */
    class ElectronicItem
    {
         /**
          * item name
         * @constant string
         */
        const ELECTRONIC_ITEM_CONSOLE = 'console';
        const ELECTRONIC_ITEM_TELEVISION = 'television';
        const ELECTRONIC_ITEM_MICROWAVE = 'microwave';

        /**
         * item types array
         * @var array
         */
        private static  $types = array(
            self::ELECTRONIC_ITEM_CONSOLE,
            self::ELECTRONIC_ITEM_TELEVISION,
            self::ELECTRONIC_ITEM_MICROWAVE
        );

        /**
         * item maxExtras array
         * @var array
         */
        private static $maxExtras = array(
           self:: ELECTRONIC_ITEM_CONSOLE => 4,
           self:: ELECTRONIC_ITEM_MICROWAVE =>0
        );

        /**
         * @function  checkItemsByType
         * @param String $type
        *  @return Boolean
         * @brief check the item by type
         *
         * @author        jack.Liu
         * @version       1.0
         * @date          2019-12-14
         */
        public function checkItemsByType($type)
        {
            if (in_array($type, self::$types))
            {
                return true;
            }
            return false;
        }

        /**
         * @function  maxExtras
         * @param String $type
         * @param Integer $number
         * @return Boolean
         * @brief check the number of extras has more than the limit
         *
         * @author        jack.Liu
         * @version       1.0
         * @date          2019-12-14
         */
        function maxExtras($type, $number)
        {
            if (array_key_exists($type, self::$maxExtras))
            {
                if (self::$maxExtras[$type] < $number)
                {
                    return false;
                }
            }
            return true;
        }
    }
