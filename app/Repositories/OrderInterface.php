<?php 

namespace App\Repositories;

interface OrderInterface
{
    public function getPaginate();

    public function find($id);

    public function save($model , array $data);

    public function updateOrderStatus(array $data);

    public function getUnpaidOrder($id);
}