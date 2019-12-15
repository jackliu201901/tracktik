<?php
    require ("ElectronicItems.php");

    $items = array(
        array(
            'type' => 'console',
            'price' => 1000,
            'number' => 1,
            'remote_controllers' =>2,
            'wired_controllers' =>2
        ),
        array(
            'type' =>'televi11sion',
            'price' => 4000,
            'number' => 1,
            'remote_controllers' =>2
        ),
        array(
            'type' =>'television',
            'price' => 2000,
            'number' => 1,
            'remote_controllers' =>1
        ),
        array(
            'type' =>'microwave',
            'price' => 500.5,
            'number' => 1
        )
    );

    $electItems = new ElectronicItems($items);

    $electItems->cutNoUseItem();

    $electItems->checkMaxExtras();

    $new_item = $electItems->getSortedItems('price');

    $sumPrice = $electItems-> getSumPrice();

    $itemPrice = $electItems-> getItemPrice('console');

    print("<p>Sort the items by price: ");
    foreach ($new_item as $item) {
        print "<ul> item:";
        foreach($item as $key=>$value)
        print "<li>" . $key ." = ". $value ."</li>";
        print "</ul>";
    }
    print "</p>";

    print "<p>output the total pricing: " . $sumPrice . "</p>";

    if ($itemPrice)
    {
        print "<p>The price of the console and its controllers: " . $itemPrice . "</p>";
    }
    else
    {
        print "<p>The type of item is wrong! </p>";
    }

?>
