<?php
include('../connections.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $idProduct = $_POST['id_product'];
    $checkQuery = $connection->prepare("SELECT COUNT(*) FROM transaksi_item WHERE ID_PRODUCT = :ID_PRODUCT");
    $checkQuery->bindParam(':ID_PRODUCT', $idProduct);
    $checkQuery->execute();
    $count = $checkQuery->fetchColumn();

    if ($count > 0) {

        $status = 'err_hapus';
        header('location: admin-product.php?status=' . $status);
        exit;
    } else {
        $query = $connection->prepare("DELETE FROM product WHERE ID_PRODUCT =:ID_PRODUCT");
        $query->bindParam(':ID_PRODUCT', $idProduct);

        if ($query->execute()) {
            $status = 'ok_hapus';
            header('location: admin-product.php?status=' . $status);
            exit;
        } else {
            $status = 'err_hapus';
            header('location: admin-product.php?status=' . $status);
            exit;
        }
    }
}
