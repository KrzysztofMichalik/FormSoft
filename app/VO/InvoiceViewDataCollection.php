<?php

declare(strict_types=1);

namespace App\VO;

class InvoiceViewDataCollection
{
    private function __construct(
        protected array $data
    ){
     //
    }

    public static function fromArray(array $inputData): InvoiceViewDataCollection
    {
        $data = [];

        foreach ($inputData as $inputDatum) {
            if ($inputDatum instanceof InvoiceViewData) {
                $data[] = $inputDatum;
            }
        }

        return new self($data);
    }

    public function getDataArrays(): array
    {
        $data = [];

        foreach ($this->data as $datum) {
            $data[] = $datum->toArray();
        }

        return $data;
    }
}
