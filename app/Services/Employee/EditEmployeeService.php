<?php

namespace App\Services\Employee;

class EditEmployeeService extends BaseService
{
    public function execute($params, $id)
    {
        $userID = $this->employeeRepository->find($id)->user_id;
        $paramsUserUpdate = [
            'full_name' => $params['full_name'],
            'address' => $params['address'],
            'phone_number' => $params['phone_number'],
            'email' => $params['email'],
        ];


        try {
            \DB::beginTransaction();
            $this->userRepository->update($paramsUserUpdate, $userID);
            $paramsEmployeeUpdate = [
                'birth' => \DateTime::createFromFormat("Y-m-d", $params["birth"]),
                'gender' => $params["gender"],
                'salary' => $params["salary"],
            ];
            $this->employeeRepository->update($paramsEmployeeUpdate, $id);
            \DB::commit();

        } catch (Exception $e) {
            \DB::rollback();
            return $e->getMessage();
        }

    }
}