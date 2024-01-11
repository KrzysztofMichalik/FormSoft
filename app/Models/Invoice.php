<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use JsonSerializable;

class Invoice extends Model implements JsonSerializable
{
    use HasFactory;

    public $timestamps = true;

    protected $table = 'invoices';

    protected $primaryKey = 'id';

    protected $casts = [
        'Net_amount' => 'float',
    ];

    public function getId(): int
    {
        return $this->{$this->getKeyName()};
    }

    public function getInvoiceNumber(): string
    {
        return $this->Invoice_number;
    }

    public function setInvoiceNumber(string $invoiceNumber): void
    {
        $this->Invoice_number = $invoiceNumber;
    }

    public function getNIPBuyer(): string
    {
        return $this->NIP_buyer;
    }

    public function setNIPBuyer(string $nipBuyer): void
    {
        $this->NIP_buyer = $nipBuyer;
    }

    public function getNIPSeller(): string
    {
        return $this->NIP_seller;
    }

    public function setNIPSeller(string $nipSeller): void
    {
        $this->NIP_seller = $nipSeller;
    }

    public function getProductName(): string
    {
        return $this->Product_name;
    }

    public function setProductName(string $productName): void
    {
        $this->Product_name = $productName;
    }

    public function getNetAmount(): float
    {
        return $this->Net_amount;
    }

    public function setNetAmount(float $netAmount): void
    {
        $this->Net_amount = $netAmount;
    }

    public function getCurrency(): string
    {
        return $this->Currency;
    }

    public function setCurrency(string $currency): void
    {
        $this->Currency = $currency;
    }

    public function getDateOfIssue(): string
    {
        return $this->Date_of_issue;
    }

    public function setDateOfIssue($dateOfIssue): void
    {
        $this->Date_of_issue = $dateOfIssue;
    }

    public function getDateOfEdit(): string
    {
        return $this->Date_of_edit;
    }

    public function setDateOfEdit($dateOfEdit): void
    {
        $this->Date_of_edit = $dateOfEdit;
    }

    public function jsonSerialize(): mixed
    {
        return [
            'id' => $this->getId(),
            'Invoice_number' => $this->getInvoiceNumber(),
            'NIP_buyer' => $this->getNIPBuyer(),
            'NIP_seller' => $this->getNIPSeller(),
            'Product_name' => $this->getProductName(),
            'Net_amount' => $this->getNetAmount(),
            'Currency' => $this->getCurrency(),
            'Date_of_issue' => $this->getDateOfIssue(),
            'Date_of_edit' => $this->getDateOfEdit(),
        ];
    }
}
