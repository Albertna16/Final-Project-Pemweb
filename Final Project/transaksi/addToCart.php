<?php include("../connections.php");
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id =  $_POST['id'];
    $quantity = intval($_POST["quantity"]);
    $query = "SELECT * FROM product where ID_PRODUCT = :id";
    $stmt = $connection->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $productByCode = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $codProduct = strval($productByCode[0]["ID_PRODUCT"])."-".$productByCode[0]["NAME_PRODUCT"];

    $itemArray = array($codProduct => array(
        'name' => $productByCode[0]["NAME_PRODUCT"],
        'id' => $productByCode[0]["ID_PRODUCT"],
        'quantity' => $quantity,
        'price' => $productByCode[0]["PRICE_PRODUCT"],
        'image' => $productByCode[0]["GAMBAR_PRODUCT"]
    ));


    if (!empty($_SESSION["cart_item"])) {
        if (in_array($codProduct, array_keys($_SESSION["cart_item"]))) {
            foreach ($_SESSION["cart_item"] as $k => $v) {
                if ($codProduct == $k) {
                    if (empty($_SESSION["cart_item"][$k]["quantity"])) {
                        $_SESSION["cart_item"][$k]["quantity"] = 0;
                    }
                    $_SESSION["cart_item"][$k]["quantity"] += $quantity;
                }
            }
        } else {
            $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"], $itemArray);
        }
    } else {
        $_SESSION["cart_item"] = $itemArray;
    }
}
var_dump($_SESSION);
