<?php

namespace App\Service;

use Symfony\Component\HttpFoundation\StreamedResponse;

class CsvExportService
{
    public function streamCsv(string $filename, array $header, iterable $rows): StreamedResponse
    {
        $response = new StreamedResponse(function () use ($header, $rows) {
            $out = fopen('php://output', 'w');
            fwrite($out, "\xEF\xBB\xBF"); // BOM UTF-8 pour Excel
            fputcsv($out, $header, ';');
            foreach ($rows as $row) {
                fputcsv($out, $row, ';');
            }
            fclose($out);
        });
        $response->headers->set('Content-Type', 'text/csv; charset=utf-8');
        $response->headers->set('Content-Disposition', $response->headers->makeDisposition('attachment', $filename));
        return $response;
    }
}
