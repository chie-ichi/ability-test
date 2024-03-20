<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Category;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\StreamedResponse;

class CsvDownloadController extends Controller
{
    public function downloadCsv(Request $request)
    {
        $contacts = Contact::with('category')->CategorySearch($request->category_id)->KeywordSearch($request->keyword)->GenderSearch($request->gender)->DateSearch($request->date)->get();

        $csvHeader = ['id', 'category_id', 'last_name', 'first_name', 'gender', 'email', 'tel', 'address', 'building',  'detail', 'created_at', 'updated_at'];

        $csvData = $contacts->map(function ($contact) {
            $contactArr = $contact->toArray();
            // first_name と last_name を入れ替える
            $tempLastName = $contactArr['last_name'];
            $contactArr['last_name'] = $contactArr['first_name'];
            $contactArr['first_name'] = $tempLastName;
            // 'category' 配列を除去する
            unset($contactArr['category']);
            return $contactArr;
        })->toArray();
        //dd($csvData);

        //filename
        $dateTime = date('Y-m-d-H-i-s');
        $fileName = "contact-{$dateTime}.csv";

        $response = new StreamedResponse(function () use ($csvHeader, $csvData) {
            $handle = fopen('php://output', 'w');
        
            // CSVヘッダーを書き込む
            foreach ($csvHeader as $key => $value) {
                $csvHeader[$key] = mb_convert_encoding($value, 'SJIS-win', 'UTF-8');
            }
            fputcsv($handle, $csvHeader);
        
            foreach ($csvData as $row) {
                // 各セルの値をShift-JISに変換する
                foreach ($row as $key => $value) {
                    $row[$key] = mb_convert_encoding($value, 'SJIS-win', 'UTF-8');
                }
                // CSVに書き込む
                fputcsv($handle, $row);
            }
        
            fclose($handle);
        }, 200, [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => "attachment; filename=\"{$fileName}\"",
        ]);

        return $response;
    }
}
