<?php

function addList($listName){
  $xmlDoc = new DOMDocument();
  if(file_exists('database/list_flat_database.xml')){
    $xmlDoc->load('database/list_flat_database.xml');
    // get the outer list node
    $lists = $xmlDoc->getElementsByTagName('lists')[0];
    // create the inner list node
    $list = $xmlDoc->createElement("list");
    // create the inner list name node
    $name = $xmlDoc->createElement("name");
    // create text node for the name node
    $text = $xmlDoc->createTextNode($listName);
    // create the product list node for the inner list
    $products = $xmlDoc->createElement("products");
    // append text to the name node
    $name->appendChild( $text );
    // append the name node to the inner list
    $list->appendChild( $name );
    // append the item list node to the inner list
    $list->appendChild( $products );
    // append the inner list to the outer list
    $lists->appendChild( $list );
    // save changes
    $xmlDoc->save('database/list_flat_database.xml');
    return true;
  }else{
    return false;
  }
}

function removeList($listName){
  $xmlDoc = new DOMDocument();
  if(file_exists('database/list_flat_database.xml')){
    $xmlDoc->load('database/list_flat_database.xml');
    // get the root list node
    $lists = $xmlDoc->documentElement;
    // get the list of all existing inner lists
    $innerLists = $lists->getElementsByTagName('list');
    // find the target list name
    foreach( $innerLists as $list ){
      $name = $list->getElementsByTagName('name')->item(0);
      $text = $name->childNodes[0]->nodeValue;
      if($text == $listName){
        // remove the list
        $lists->removeChild( $list );
      }
    }
    // save changes
    $xmlDoc->save('database/list_flat_database.xml');
    return true;
  }else{
    return false;
  }
}

function addProductToList($listName, $productName, $productId){
  $xmlDoc = new DOMDocument();
  if(file_exists('database/list_flat_database.xml')){
    $xmlDoc->load('database/list_flat_database.xml');
    // get the root list node
    $lists = $xmlDoc->documentElement;
    // get the list of all existing inner lists
    $innerLists = $lists->getElementsByTagName('list');
    // find the target list name
    foreach( $innerLists as $list ){
      $name = $list->getElementsByTagName('name')->item(0);
      $text = $name->childNodes[0]->nodeValue;
      if($text == $listName){
        // get the products list node
        $productsList = $list->getElementsByTagName('products')->item(0);


        // create product node for the products list
        $productNode = $xmlDoc->createElement("product");

        // create product name node for the product node
        $productNameNode = $xmlDoc->createElement("productName");
        // create text for the product name node
        $productNameText = $xmlDoc->createTextNode($productName);
        // append productNameText to the productNameNode
        $productNameNode->appendChild( $productNameText );
        // append the productNameNode to the productNode
        $productNode->appendChild( $productNameNode );

        // create product Id node for the product node
        $productIdNode = $xmlDoc->createElement("productId");
        // create text for the product Id node
        $productIdText = $xmlDoc->createTextNode($productId);
        // append productIdText to the productIdNode
        $productIdNode->appendChild( $productIdText );
        // append the productIdNode to the productNode
        $productNode->appendChild( $productIdNode );

        // append the productNode to the product list
        $productsList->appendChild( $productNode );
      }
    }
    // save changes
    $xmlDoc->save('database/list_flat_database.xml');
    return true;
  }else{
    return false;
  }
}

function removeProductFromList($listName, $productName){
  $xmlDoc = new DOMDocument();
  if(file_exists('database/list_flat_database.xml')){
    $xmlDoc->load('database/list_flat_database.xml');
    // get the root list node
    $lists = $xmlDoc->documentElement;
    // get the list of all existing inner lists
    $innerLists = $lists->getElementsByTagName('list');
    // find the target list name
    foreach( $innerLists as $list ){
      $name = $list->getElementsByTagName('name')->item(0);
      $text = $name->childNodes[0]->nodeValue;
      if($text == $listName){
        // get the list products node
        $productsNode = $list->getElementsByTagName('products')->item(0);
        // get the list of existing products
        $productsList = $productsNode->getElementsByTagName('product');
        // find the target product name
        foreach( $productsList as $product ){
          $name = $product->getElementsByTagName('productName')->item(0);
          $text = $name->childNodes[0]->nodeValue;
          if($text == $productName){
            // remove the target product
            $productsNode->removeChild( $product );
          }
        }
      }
    }
    // save changes
    $xmlDoc->save('database/list_flat_database.xml');
    return true;
  }else{
    return false;
  }
}

?>
