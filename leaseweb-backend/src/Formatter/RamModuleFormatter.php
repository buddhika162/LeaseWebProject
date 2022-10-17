<?php

namespace App\Formatter;


class RamModuleFormatter extends BaseFormatter
{

    /**
     * Format ram Module object to api comunication
     * @param $ramModule
     * @return array
     */
    public function formatObject($ramModule): array
    {
        $ramModuleArray['id'] = $ramModule->getId();
        $ramModuleArray['type'] = $ramModule->getType();
        $ramModuleArray['size'] = $ramModule->getsize();

        return $ramModuleArray;
    }

}