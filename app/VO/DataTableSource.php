<?php

namespace App\VO;

class DataTableSource
{
    private function __construct(
        protected InvoiceViewDataCollection $data,
        protected int $recordsTotal
    ){
     //
    }

    public static function create(InvoiceViewDataCollection $data, int $recordsTotal): DataTableSource
    {
        return new self($data, $recordsTotal);
    }

    public function getData(): InvoiceViewDataCollection
    {
        return $this->data;
    }

    public function getRecordsTotal(): int
    {
        return $this->recordsTotal;
    }
}
