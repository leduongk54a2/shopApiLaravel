<?php

namespace App\Services\Supplier;

class DeleteSupplierService extends BaseService
{
    public function execute($ids)
    {
        try {
            \DB::beginTransaction();
            foreach ($ids as $id) {
                $this->supplierRepository->delete($id);
            }
            \DB::commit();

        } catch (\Exception $e) {
            \DB::rollback();
            return $e->getMessage();
        }


    }
}
