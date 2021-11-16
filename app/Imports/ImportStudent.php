<?php

namespace App\Imports;

use App\Student;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\WithBatchInserts;

class ImportStudent implements ToModel,WithHeadingRow,WithValidation, WithBatchInserts
{
    /**
    * @param Collection $collection
    */
    // public function collection(Collection $collection)

    public function rules(): array
    {
        return [
            'ho_ten' => 'required',
            'msv' => 'required|unique:students,code',
            'email' => 'nullable|unique:students,email',
            'so_trung_tuyen' => 'required',
            'ngay_sinh'=>'nullable|date_format:"d/m/Y"',

        ];

    }

    public function customValidationMessages()
    {
        return [
            'ho_ten.required'=>'Tên sinh viên không được bỏ trống',
            'msv.required'=>'Mã sinh viên không được bỏ trống',
            'msv.unique'=>'Mã sinh viên đã tồn tại',
            'email.unique'=>'Email đã tồn tại',
            'so_trung_tuyen.required'=>'Mã số giấy xét tuyển là bắt buộc',
            'ngay_sinh.date_format'=>'Ngày sinh có dạng dd/mm/YYYY',

        ];
    }

    public function model(array $row)
    {
         return new Student([
            'name' => $row['ho_ten'],
            'code' => $row['msv'],
            'email' => $row['email'],
            'license_id' => $row['so_trung_tuyen'],
            'password' => bcrypt($row['so_trung_tuyen']),
            'dob' => $row['ngay_sinh'],
           	'gender' => $row['gioi_tinh'],
            'cccd' => $row['cccd'],
             'major_code' => $row['ma_nhom_nganh'],
             'folk' => $row['dan_toc'],
             'phone' => $row['sdt'],

        ]);
    }
    public function batchSize(): int
    {
        return 300;
    }
}
