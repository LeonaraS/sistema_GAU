<?php


    namespace Source\Controllers;

    class DOM
    {
        const ROOT_PATH =__DIR__ . '/../../' ; # root path
        const TEMP_PATH =__DIR__ . '/../../views/components/' ; # components path
        const SECT_PATH =__DIR__ . '/../../views/sections/' ; # Sections path

        public static function section (array $_sections)
        {
            foreach ($_sections as $_section)
            {
                if (file_exists ( self::SECT_PATH . "$_section.php" ))
                {
                    include_once self::SECT_PATH . "$_section.php" ;
                }
            }
        }

        public static function components (string $_templateName)
        {
            if (file_exists (self::TEMP_PATH . "$_templateName.php"))
            {
                include_once self::TEMP_PATH . "$_templateName.php" ;
            }
        }
    }

