<?php

namespace App\VO;

class InvoiceViewData
{
    protected int $id;

    protected string $invoiceNumber;

    protected string $nipBuyer;

    protected string $nipSeller;

    protected string $productName;

    protected float $netAmount;

    protected string $currency;

    protected string $issueDate;

    protected string $editDate;

    private function __construct(
        int $id,
        string $invoiceNumber,
        string $nipBuyer,
        string $nipSeller,
        string $productName,
        float $netAmount,
        string $currency,
        string $issueDate,
        string $editDate
    ) {
        $this->id = $id;
        $this->invoiceNumber = $invoiceNumber;
        $this->nipBuyer = $nipBuyer;
        $this->nipSeller = $nipSeller;
        $this->productName = $productName;
        $this->netAmount = $netAmount;
        $this->currency = $currency;
        $this->issueDate = $issueDate;
        $this->editDate = $editDate;
    }

    public static function create(
        int $id,
        string $invoiceNumber,
        string $nipBuyer,
        string $nipSeller,
        string $productName,
        float $netAmount,
        string $currency,
        string $issueDate,
        string $editDate
    ): InvoiceViewData {
        return new self($id, $invoiceNumber, $nipBuyer, $nipSeller, $productName, $netAmount, $currency, $issueDate, $editDate);
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getInvoiceNumber(): string
    {
        return $this->invoiceNumber;
    }

    public function getNIPBuyer(): string
    {
        return $this->nipBuyer;
    }

    public function getNIPSeller(): string
    {
        return $this->nipSeller;
    }

    public function getProductName(): string
    {
        return $this->productName;
    }

    public function getNetAmount(): float
    {
        return $this->netAmount;
    }

    public function getCurrency(): string
    {
        return $this->currency;
    }

    public function getIssueDate(): string
    {
        return $this->issueDate;
    }

    public function getEditDate(): string
    {
        return $this->editDate;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->getId(),
            'invoice_number' => $this->getInvoiceNumber(),
            'nip_buyer' => $this->getNIPBuyer(),
            'nip_seller' => $this->getNIPSeller(),
            'product_name' => $this->getProductName(),
            'net_amount' => $this->getNetAmount(),
            'currency' => $this->getCurrency(),
            'issue_date' => $this->getIssueDate(),
            'edit_date' => $this->getEditDate()
        ];
    }
}
