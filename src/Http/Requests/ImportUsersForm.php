<?php

namespace DavidBase\Http\Requests;


use App\User;
use Illuminate\Foundation\Http\FormRequest;
use PhpOffice\PhpSpreadsheet\Reader\Xls;

class ImportUsersForm extends FormRequest
{
    /**
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'excel_file' => 'required|file'
        ];
    }

    /**
     * @throws \PhpOffice\PhpSpreadsheet\Exception
     * @throws \PhpOffice\PhpSpreadsheet\Reader\Exception
     */
    public function persist()
    {
        $file = storage_path('app/'. $this->file('excel_file')->store('uploads/excel'));

        $reader = new Xls();

        $reader->setReadDataOnly(true);

        $spread_sheet = $reader->load($file);

        $sheet_data = $spread_sheet->getActiveSheet()->toArray();

        array_shift($sheet_data);

        foreach ($sheet_data as $row) {
            $name = $row[2];
            $email = $row[0];
            $password = is_null($row[1]) ? '123456' : $row[1];
            $this->storeUser($name, $email, bcrypt($password));
        }
    }

    /**
     * @param $name
     * @param $email
     * @param $password
     */
    protected function storeUser($name, $email, $password)
    {
        User::updateOrCreate(
            compact('email'),
            compact('name', 'password')
        );
    }
}