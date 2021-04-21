<?php

    class Don
    {
        /**
         * @var int
         */
        private $ID;

        /**
         * @var string|null
         */
        private $donName;

        /**
         *
         * @var string|null
         */
        private $donType;

        /**
         *
         * @var int
         */
        private $donneurID;

        function __construct(string $donName, string $donType, int $donneurID, ?int $ID = null) 
        {
            $this->ID= $ID;
            $this->donName = $donName;
            $this->donType = $donType;
            $this->donneurID = $donneurID;
        }

         /**
         * @return integer
         */
        public function getID():int
        {
            return $this->ID;
        }
        /**
         * @param integer $ID
         * @return Don
         */
        public function setID(int $ID):self
        {
            $this->ID = $ID;
            return $this;
        }

        /**
         *
         * @return string|null
         */
        public function getDonName():?string
        {
            return $this->donName;
        }

        /**
         *
         * @param string|null $donName
         * @return Don
         */
        public function setDonName(?string $donName):self
        {
            $this->donName = $donName;
            return $this;
        }

        /**
         *
         * @return string|null
         */


        public function getDonType():?string
        {
            return $this->donType;
        }
        /**
         *
         * @param string|null $donType
         * @return Don
         */
        public function setDonType(?string $donType):self
        {
            $this->donType = $donType;
            return $this;
        }

        /**
         *
         * @return integer
         */
        public function getDonneurID():int
        {
            return $this->donneurID;
        }
        /**
         *
         * @param int|null $donneurID
         * @return Don
         */
        public function setDonneurID(?int $donneurID):self
        {
            $this->donneurID = $donneurID;
            return $this;
        }


    }