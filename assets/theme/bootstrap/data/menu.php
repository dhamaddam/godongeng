<?php

$categories = array(
    array('id' => 1,  'parent' => 0, 'name' => 'Women Fashion'),
    array('id' => 2,  'parent' => 0, 'name' => 'Men Fashion'),
    //array('id' => 3,  'parent' => 0, 'name' => 'Electronics'),
    //array('id' => 4,  'parent' => 0, 'name' => 'Healt and Beauty'),
    //array('id' => 5,  'parent' => 0, 'name' => 'Home and Living'),
    array('id' => 6,  'parent' => 2, 'name' => 'Clothing'),
    array('id' => 7,  'parent' => 1, 'name' => 'Clothing'),
    array('id' => 8,  'parent' => 1, 'name' => 'Bags'),
    array('id' => 9,  'parent' => 1, 'name' => 'Shoes'),
    array('id' => 10, 'parent' => 1, 'name' => 'Accessories'),
    array('id' => 11, 'parent' => 5, 'name' => 'Kitchen'),
    array('id' => 12, 'parent' => 7, 'name' => 'Tops'),
    array('id' => 13, 'parent' => 6, 'name' => 'Dresses'),
    
    array('id' => 14, 'parent' => 8, 'name' => 'Clutches'),
    array('id' => 15, 'parent' => 8, 'name' => 'Luggage Bags'),
    array('id' => 16, 'parent' => 9, 'name' => 'Heels'),
    array('id' => 17, 'parent' => 9, 'name' => 'Boots'),
    array('id' => 18, 'parent' => 10, 'name' => 'Jewellery'),
    array('id' => 19, 'parent' => 10, 'name' => 'Watches'),
    array('id' => 20, 'parent' => 11, 'name' => 'Sharp Knife')
    
);

function categoriesToTree(&$categories) {

    $map = array(
        0 => array('subcategories' => array())
    );

    foreach ($categories as &$category) {
        $category['subcategories'] = array();
        $map[$category['id']] = &$category;
    }

    foreach ($categories as &$category) {
        $map[$category['parent']]['subcategories'][] = &$category;
    }
    

    

    return $map[0]['subcategories'];

}


$tree = categoriesToTree($categories);

$data['menu'] = $tree;
//echo "=== TREE ===\n";
//print_r ($tree);


$data['brand']= array("Nike","Reebok","Yonex", "Xiaomi", "Samsung", "Sony", "Sharp", "Panasonic", "Adidas");
?>