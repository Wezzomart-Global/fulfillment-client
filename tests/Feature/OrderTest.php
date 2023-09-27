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
        $this->fulfillmentClient = new Client(
            accessToken: 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiZWZlOTMxYTVjZGFjN2U4NDY1ZWM5YzNiNjNkNjU2YWFmNjdjNTQzODhiNTZhMDM2YjkxZTVmOGIwMWE3YWUyNWE4MGRjNWE3ODA0MGRlNzAiLCJpYXQiOjE2OTU4MTg5MzMuMTUwNTE3LCJuYmYiOjE2OTU4MTg5MzMuMTUwNTE5LCJleHAiOjE3Mjc0NDEzMzMuMTQ3NTk1LCJzdWIiOiIxIiwic2NvcGVzIjpbXX0.QIpP3q2735uzP8hK0V7YeBRejcc-NLNZ07jrNiT11xR0sNvTMDBNu40_ySG2UpKr2b_uc9LBygE0m9aChGAvBtRyd9VO0V3b5lUcSNmeCbQMOM-QKsJ3lgLZLAypzhFUgJL2yW-nyBAdN643QhtahObZk7aqakSfeSG2SVT1G2SJzsCKEWi-aKgxCzLW4yc0rYhd5ib69FpP15_-68vlfXS3xyqS2PMBhs6QrpDNXTlgDvwSTfdf0B2T0m3AExjrV-ywlCq2eeDAc80a_jsanNMCiNztkfeW6qySdsKT84-cHOvpVcF6HFqGkqna-_BB6tsWUIKaTGOyXfQ4857Ie7vMMjTnNds2F7JuF12PPbXmdsMc1xG-qMf-qMefSjL8JBn_vp3ZcTpMQRBXGKgR97i9Gnz8np6Raejh11uqzvuryW1WJzqzeWcBG6vgNsoJZ7sbOIPq0wdSmiyoYcfU5T-ygY67dLDrBk_XIPcuI2LAvMfBiZ5h_kcXy536Sp_yck8jgH08a1jZp-jDQeA8kKo4J_oh9S00ciVtCSd4Tku0Fp4IXrf_qLG5iKGpGRv_76U-oRR1J36Dc_ZqLpwe-2G-sO7R2Cf5QrTMzFOgqULJ25ek2DimrXQbyIorVqYns_rq00aYHmwCK024iHFrRzfTKvI_FGr0ulD0Ra34jLE'
        );
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
