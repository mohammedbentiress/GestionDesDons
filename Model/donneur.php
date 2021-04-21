<?php

    class Donneur
    {
        /**
         * @var int
         */
        private $ID;

        /**
         * @var string|null
         */
        private $donneurName;

        /**
         *
         * @var string|null
         */
        private $teleNumber;



        function __construct(string $donneurName, string $teleNumber, ?int $ID = null) 
        {
            $this->ID= $ID;
            $this->donneurName = $donneurName;
            $this->teleNumber = $teleNumber;
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
        public function getDonneurName():?string
        {
            return $this->donneurName;
        }

        /**
         *
         * @param string $donneurName
         * @return Don
         */
        public function setDonneurName(string $donneurName):self
        {
            $this->donneurName = $donneurName;
            return $this;
        }

        /**
         *
         * @return string
         */


        public function getTeleNumber():string
        {
            return $this->teleNumber;
        }
        /**
         *
         * @param string $teleNumber
         * @return Don
         */
        public function setTeleNumber(string $teleNumber):self
        {
            $this->teleNumber = $teleNumber;
            return $this;
        }

    }