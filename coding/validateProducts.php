<?php

    function validateProduct($product)
    {
        $invalidProducts = array_filter($product, 'isInvalidProduct');

        return (count($invalidProducts) === 0);
    }

    function isInvalidProduct($rawProduct)
    {
        $requiredFields = ['price', 'name', 'description', 'type'];

        $fields = array_keys($rawProduct);
        $missedFields = array_diff($requiredFields, $fields);

        return (count($missedFields) > 0);
    }


$testProducts = [
    [
        'price' => 1,
        'name' => '1',
        'description' => '1',
        // 'type' => '1'
    ], [
        'price' => 2,
        'name' => '2',
        'description' => '2',
        'type' => '2'
    ], [
        'price' => 3,
        'name' => '3',
        'description' => '3',
        'type' => '3'
    ]
];


var_dump(validateProduct($testProducts));

