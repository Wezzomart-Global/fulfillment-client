<?php

declare(strict_types=1);

namespace AnatoliaFulfillment\Client\Tests\Feature;

use AnatoliaFulfillment\Client\Client;
use PHPUnit\Framework\TestCase;

final class OrderTest extends TestCase
{
    /**
     * @var Client
     */
    public $fulfillmentClient = null;

    protected function setUp(): void
    {
        $this->fulfillmentClient = new Client();
    }

    /**
     * @test
     * @covers \AnatoliaFulfillment\Client\Client::order()
     */
    public function create(): void
    {
        $response = $this->fulfillmentClient->order()->create(
            [
                "magento_order_id" => "123",
                "vendor_panel_order_id" => 131,
                "currency" => "EUR",
                "service" => "wezzomart",
                "irak_shipping_method" => "zmc",
                "customer" => [
                    "magento_id" => "2342352",
                    "first_name" => "Anatolia",
                    "last_name" => "express",
                    "email" => "anatoila@anatoliaexpress.com",
                    "phone" => "+..",
                    "gender" => "male",
                ],
                "delivery" => [
                    "country" => "ıraq",
                    "city" => "bağdat",
                    "district" => "xx",
                    "street_address" => "",
                    "street_address_2" => "",
                    "phone_number" => "",
                    "magento_address_id" => 2,
                ],
                "invoice" => [
                    "country" => "ıraq",
                    "city" => "bağdat",
                    "district" => "xx",
                    "street_address" => "",
                    "street_address_2" => "",
                    "phone_number" => "",
                    "magento_address_id" => 2,
                ],
                "cargo_company" => "Cargo Company",
                "products" => [
                    376 => [
                        "product_id" => "64e744b7c99033953102edc4",
                        "vendor_id" => "63951ae97deea4f40029b1",
                        "quantity" => 1,
                        "name" => "Product Name 2",
                        "barcode" => "643951ae97de9ea4f4002",
                        "price" => 100,
                        "shippment" => "mng",
                        "cargo_tracking_number" => "123456",
                    ],
                ],
                "payment" => [
                    "transaction_id" => "DXIPRPQ527",
                    "methods" => [
                        [
                            "name" => "fastpay",
                            "transaction_id" => "DXIPRPQ527",
                            "commission" => 2,
                            "net_for_wezzomart" => 198,
                            "total" => 200,
                        ],
                        [
                            "name" => "wallet",
                            "transaction_id" => "DXIPRPQ527",
                            "commission" => 0,
                            "net_for_wezzomart" => 900,
                            "total" => 900,
                        ],
                    ],
                    "cart_total" => 1000,
                    "shipping_total" => 100,
                    "total" => 1100,
                ],
            ]
        );

        $this->assertInstanceOf(\AnatoliaFulfillment\Client\Response\Order::class, $response);

        $this->assertArrayHasKey('status', $response->toArray());
    }
}
