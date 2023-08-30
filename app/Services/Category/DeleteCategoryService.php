<?php

namespace App\Services\Category;

class DeleteCategoryService extends BaseService
{
    public function execute($ids)
    {
        try {
            \DB::beginTransaction();
            foreach ($ids as $id) {
                $this->categoryRepository->delete($id);
            }
            \DB::commit();

        } catch (\Exception $e) {
            \DB::rollback();
            return $e->getMessage();
        }


    }
}