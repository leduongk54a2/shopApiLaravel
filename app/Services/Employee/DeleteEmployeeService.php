<?php

namespace App\Services\Employee;

class DeleteEmployeeService extends BaseService
{
    public function execute($ids)
    {
        foreach ($ids as $id) {
            try {
                $userId = $this->employeeRepository->find($id)->user_id;
                \DB::beginTransaction();
                $this->employeeRepository->delete($id);
                $this->userRepository->delete($userId);
                \DB::commit();

            } catch (\Exception $e) {
                \DB::rollback();
                return $e->getMessage();
            }
        }

    }
}