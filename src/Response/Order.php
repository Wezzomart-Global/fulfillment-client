<?php

namespace AnatoliaFulfillment\Client\Response;

class Order
{
    public ?string $magentoOrderId = null;
    public ?int $vendorPanelOrderId = null;
    public ?float $totalPrice = null;
    public ?string $irakShippingMethod = null;
    public ?string $orderDate = null;
    public ?int $status = null;
    public ?int $companyId = null;
    public ?float $shippingTotal = null;
    public ?string $currency = null;
    public ?string $updatedAt = null;
    public ?string $createdAt = null;
    public ?int $id = null;


    public function __construct(array $data)
    {
        foreach ($data as $key => $value) {
            $this->fill($key, $value);
        }
    }

    public function fill(string $key, $value)
    {
        $arrayKey = str($key)->camel()->__toString();
        $this->{$arrayKey} = $value;
    }

    public function toArray(): array
    {
        return [
            'magento_order_id' => $this->magentoOrderId,
            'vendor_panel_order_id' => $this->vendorPanelOrderId,
            'total_price' => $this->totalPrice,
            'irak_shipping_method' => $this->irakShippingMethod,
            'order_date' => $this->orderDate,
            'status' => $this->status,
            'company_id' => $this->companyId,
            'shipping_total' => $this->shippingTotal,
            'currency' => $this->currency,
            'updated_at' => $this->updatedAt,
            'created_at' => $this->createdAt,
            'id' => $this->id,
        ];
    }
}
